document.addEventListener('DOMContentLoaded', function () {
    const list = document.getElementById('cart-items-list');
    const totalEl = document.getElementById('cart-total');
    const checkoutBtn = document.getElementById('checkout-btn');
    const basketItemsEl = document.getElementById('basket-items');
    const guestCart = JSON.parse(localStorage.getItem('daisymc_cart')) || [];

    function isLoggedIn() {
        return Boolean(localStorage.getItem('daisymc_user'));
    }

    async function ensureBasketSession() {
        if (!isLoggedIn() || typeof BasketPHP === 'undefined') {
            return false;
        }

        const savedUser = localStorage.getItem('daisymc_user');
        const sessionState = await BasketPHP.checkSession();

        if (sessionState.logged_in) {
            if (sessionState.csrf_token) {
                BasketPHP.setCsrfToken(sessionState.csrf_token);
            }

            return true;
        }

        const loginResult = await BasketPHP.login(savedUser);

        if (loginResult.success && loginResult.csrf_token) {
            BasketPHP.setCsrfToken(loginResult.csrf_token);
        }

        return Boolean(loginResult.success);
    }

    function updateBasketCount(count) {
        if (basketItemsEl) {
            basketItemsEl.textContent = count + ' items';
        }
    }

    function renderGuestCart() {
        if (!list || !totalEl) {
            return;
        }

        list.innerHTML = '';

        let total = 0;

        guestCart.forEach((item, index) => {
            const li = document.createElement('li');

            li.innerHTML = `
                <span class="cart-item-name">${item.name}</span>
                <span class="cart-item-price">$${Number(item.price).toFixed(2)}</span>
                <button class="remove-item-btn" data-index="${index}">X</button>
            `;

            list.appendChild(li);
            total += Number(item.price);
        });

        totalEl.textContent = total.toFixed(2);
        updateBasketCount(guestCart.length);

        document.querySelectorAll('.remove-item-btn').forEach((button) => {
            button.addEventListener('click', function (event) {
                const index = Number(event.currentTarget.dataset.index);
                guestCart.splice(index, 1);
                localStorage.setItem('daisymc_cart', JSON.stringify(guestCart));
                renderGuestCart();
            });
        });
    }

    async function renderSessionCart() {
        if (!list || !totalEl || typeof BasketPHP === 'undefined') {
            return;
        }

        const response = await BasketPHP.getBasket();
        const basket = response.basket || [];

        list.innerHTML = '';

        basket.forEach((item) => {
            const li = document.createElement('li');

            li.innerHTML = `
                <span class="cart-item-name">${item.name}</span>
                <span class="cart-item-price">$${Number(item.price).toFixed(2)}</span>
                <button class="remove-item-btn" data-id="${item.id}">X</button>
            `;

            list.appendChild(li);
        });

        totalEl.textContent = Number(response.total || 0).toFixed(2);
        updateBasketCount(Number(response.count || 0));

        document.querySelectorAll('.remove-item-btn').forEach((button) => {
            button.addEventListener('click', async function (event) {
                const itemId = event.currentTarget.dataset.id;
                const result = await BasketPHP.removeItem(itemId);

                if (result.success) {
                    await renderSessionCart();
                }
            });
        });
    }

    async function addRankToCart(button) {
        const rankId = Number(button.dataset.rankId || 0);

        if (!rankId || typeof BasketPHP === 'undefined') {
            return;
        }

        var sessionOk = await BasketPHP.checkSession();
        if (!sessionOk || sessionOk.logged_in !== true) {
            localStorage.removeItem('daisymc_user');
            if (typeof openLoginModal === 'function') openLoginModal();
            return;
        }
        if (sessionOk.csrf_token) {
            BasketPHP.setCsrfToken(sessionOk.csrf_token);
        }

        const hasSession = await ensureBasketSession();

        if (!hasSession) {
            if (typeof showToast === 'function') showToast('Please log in to add items to your basket.', 6000, true);
            else alert('Please log in to add items to your basket.');
            return;
        }

        const result = await BasketPHP.addRank(rankId);

        if (!result.success) {
            if (typeof showToast === 'function') showToast(result.error || 'Unable to add this rank right now.', 6000, true);
            else alert(result.error || 'Unable to add this rank right now.');
            return;
        }

        if (typeof showToast === 'function') {
            const name = result.item && result.item.name ? result.item.name : 'Rank';
            showToast(`${name} added to basket!`);
        }
        button.classList.add('added');
        button.textContent = 'Added';

        setTimeout(() => {
            button.classList.remove('added');
            button.textContent = '+ Add to Cart';
        }, 1200);

        await renderSessionCart();
    }

    document.querySelectorAll('.cart-btn').forEach((button) => {
        button.addEventListener('click', async function (event) {
            event.preventDefault();
            event.stopPropagation();

            if (typeof BasketPHP === 'undefined') {
                if (typeof openLoginModal === 'function') openLoginModal();
                return;
            }

            var sessionOk = await BasketPHP.checkSession();
            if (!sessionOk || sessionOk.logged_in !== true) {
                localStorage.removeItem('daisymc_user');
                if (typeof openLoginModal === 'function') openLoginModal();
                return;
            }
            if (sessionOk.csrf_token) {
                BasketPHP.setCsrfToken(sessionOk.csrf_token);
            }

            if (this.dataset.rankId) {
                await addRankToCart(this);
                return;
            }

            const name = this.dataset.name;
            const price = Number(this.dataset.price || 0);
            const type = this.dataset.type || 'rank';

            if (!name || price <= 0) {
                return;
            }

            const hasSession = await ensureBasketSession();
            if (!hasSession) {
                if (typeof showToast === 'function') showToast('Please log in to add items to your basket.', 6000, true);
                else alert('Please log in to add items to your basket.');
                return;
            }

            const result = await BasketPHP.addItem(name, price, type);

            if (result.success) {
                if (typeof showToast === 'function') {
                    showToast(name ? `${name} added to basket!` : 'Added to basket!');
                }
                await renderSessionCart();
            } else if (typeof showToast === 'function') {
                showToast(result.error || 'Unable to add this item.', 6000, true);
            } else if (result.error) {
                alert(result.error);
            }
        });
    });

    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', async function () {
            if (isLoggedIn() && typeof BasketPHP !== 'undefined') {
                const response = await BasketPHP.getBasket();
                const basket = response.basket || [];

                if (basket.length === 0) {
                    if (typeof showToast === 'function') showToast('Your cart is empty!', 6000, true);
                    else alert('Your cart is empty!');
                    return;
                }

                if (typeof showToast === 'function') {
                    showToast(`Checking out ${basket.length} items, total $${Number(response.total || 0).toFixed(2)}`);
                } else {
                    alert(`Checking out ${basket.length} items, total $${Number(response.total || 0).toFixed(2)}`);
                }
                await BasketPHP.clearBasket();
                await renderSessionCart();
                return;
            }

            if (guestCart.length === 0) {
                if (typeof showToast === 'function') showToast('Your cart is empty!', 6000, true);
                else alert('Your cart is empty!');
                return;
            }

            const total = guestCart.reduce((sum, item) => sum + Number(item.price), 0);
            if (typeof showToast === 'function') {
                showToast(`Checking out ${guestCart.length} items, total $${total.toFixed(2)}`);
            } else {
                alert(`Checking out ${guestCart.length} items, total $${total.toFixed(2)}`);
            }
            guestCart.length = 0;
            localStorage.setItem('daisymc_cart', JSON.stringify(guestCart));
            renderGuestCart();
        });
    }

    if (isLoggedIn() && typeof BasketPHP !== 'undefined') {
        renderSessionCart();
    } else {
        renderGuestCart();
    }
});
