document.addEventListener('DOMContentLoaded', function () {
    const basket = document.querySelector('.basket');
    const modal = document.getElementById('login-modal');
    const closeBtn = document.getElementById('login-close');
    const sidebar = document.getElementById('basket-sidebar');
    const overlay = document.getElementById('basket-overlay');
    const logoutBtn = document.getElementById('logout-btn');
    const sidebarUsername = document.getElementById('sidebar-username');
    const usernameInput = document.getElementById('login-username');
    const loginBtn = document.getElementById('login-submit');
    const loginHead = document.getElementById('login-head');
    const basketName = document.getElementById('basket-name');
    const basketItems = document.getElementById('basket-items');
    const basketSkin = document.getElementById('basket-skin');

    if (!basket || !modal || !closeBtn || !overlay || !usernameInput || !loginBtn || !loginHead || !basketName || !basketItems || !basketSkin) {
        return;
    }

    let skinTimer;

    function getSavedUser() {
        return localStorage.getItem('daisymc_user');
    }

    function updateBasket(username, count = null) {
        basketName.textContent = username + "'s Basket";
        basketSkin.src = 'https://mc-heads.net/body/' + username + '/left';

        if (count !== null) {
            basketItems.textContent = count + ' items';
            return;
        }

        const cart = JSON.parse(localStorage.getItem('daisymc_cart')) || [];
        basketItems.textContent = cart.length + ' items';
    }

    function openSidebar(username) {
        if (!sidebar || !sidebarUsername) {
            return;
        }

        sidebar.classList.add('active');
        overlay.classList.add('active');
        sidebarUsername.textContent = username + "'s Basket";
    }

    basket.addEventListener('click', function () {
        const savedUser = getSavedUser();

        if (!savedUser) {
            modal.classList.add('active');
            return;
        }

        openSidebar(savedUser);
    });

    closeBtn.addEventListener('click', function () {
        modal.classList.remove('active');
    });

    modal.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.classList.remove('active');
        }
    });

    usernameInput.addEventListener('input', function () {
        clearTimeout(skinTimer);

        skinTimer = setTimeout(function () {
            const username = usernameInput.value.trim();
            loginHead.src = username === '' ? 'https://mc-heads.net/head/Steve' : 'https://mc-heads.net/head/' + username;
        }, 200);
    });

    usernameInput.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            loginBtn.click();
        }
    });

    loginBtn.addEventListener('click', async function () {
        const username = usernameInput.value.trim();

        if (username === '') {
            const loginBox = document.querySelector('.login-box');

            if (loginBox) {
                loginBox.classList.add('shake');
                setTimeout(function () {
                    loginBox.classList.remove('shake');
                }, 350);
            }

            usernameInput.focus();
            return;
        }

        localStorage.setItem('daisymc_user', username);

        if (typeof BasketPHP !== 'undefined') {
            const result = await BasketPHP.login(username);
            if (result.csrf_token) {
                BasketPHP.setCsrfToken(result.csrf_token);
            }
            updateBasket(username, Number(result.basket_count || 0));
        } else {
            updateBasket(username);
        }

        modal.classList.remove('active');
    });

    overlay.addEventListener('click', function () {
        if (sidebar) {
            sidebar.classList.remove('active');
        }

        overlay.classList.remove('active');
    });

    if (logoutBtn) {
        logoutBtn.addEventListener('click', async function () {
            localStorage.removeItem('daisymc_user');

            if (typeof BasketPHP !== 'undefined') {
                await BasketPHP.logout();
            }

            basketName.textContent = "Guest's Basket";
            basketItems.textContent = 'click to login';
            basketSkin.src = 'https://mc-heads.net/body/Steve2/left';

            if (sidebar) {
                sidebar.classList.remove('active');
            }

            overlay.classList.remove('active');
        });
    }

    const savedUser = getSavedUser();

    if (savedUser) {
        if (typeof BasketPHP !== 'undefined') {
            BasketPHP.checkSession().then(async function (result) {
                if (result.logged_in) {
                    if (result.csrf_token) {
                        BasketPHP.setCsrfToken(result.csrf_token);
                    }
                    updateBasket(savedUser, Number(result.count || 0));
                } else {
                    const loginResult = await BasketPHP.login(savedUser);

                    if (loginResult.success) {
                        if (loginResult.csrf_token) {
                            BasketPHP.setCsrfToken(loginResult.csrf_token);
                        }

                        updateBasket(savedUser, Number(loginResult.basket_count || 0));
                    } else {
                        localStorage.removeItem('daisymc_user');
                        basketName.textContent = "Guest's Basket";
                        basketItems.textContent = 'click to login';
                        basketSkin.src = 'https://mc-heads.net/body/Steve2/left';
                    }
                }
            });
        } else {
            updateBasket(savedUser);
        }
    }
});
