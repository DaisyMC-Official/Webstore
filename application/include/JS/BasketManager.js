const BasketPHP = {
    apiUrl: (typeof window.BASE_URL !== 'undefined' ? window.BASE_URL : '') + '/include/Basket/basket.php',
    csrfToken: document.documentElement.dataset.basketCsrf || '',

    async request(payload) {
        try {
            const formData = new FormData();
            const protectedActions = ['add', 'remove', 'clear'];

            if (protectedActions.includes(payload.action)) {
                payload.csrf_token = this.csrfToken;
            }

            Object.entries(payload).forEach(([key, value]) => {
                if (value !== undefined && value !== null) {
                    formData.append(key, value);
                }
            });

            const response = await fetch(this.apiUrl, {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            });

            return await response.json();
        } catch (error) {
            console.error('Basket request failed:', error);
            return { success: false, error: 'Network error' };
        }
    },

    checkSession() {
        return this.request({ action: 'check' });
    },

    login(username) {
        return this.request({ action: 'login', username });
    },

    logout() {
        return this.request({ action: 'logout' });
    },

    addRank(rankId) {
        return this.request({ action: 'add', type: 'rank', rank_id: rankId });
    },

    addItem(name, price, type = 'rank') {
        return this.request({ action: 'add', type, name, price });
    },

    removeItem(itemId) {
        return this.request({ action: 'remove', item_id: itemId });
    },

    getBasket() {
        return this.request({ action: 'get' });
    },

    clearBasket() {
        return this.request({ action: 'clear' });
    },

    updateBasketUI(count) {
        const basketItemsEl = document.getElementById('basket-items');

        if (basketItemsEl) {
            basketItemsEl.textContent = count + ' items';
        }
    },

    setCsrfToken(token) {
        if (typeof token === 'string' && token !== '') {
            this.csrfToken = token;
        }
    }
};

function openLoginModal() {
    const modal = document.getElementById('login-modal');

    if (modal) {
        modal.classList.add('active');
    }
}
