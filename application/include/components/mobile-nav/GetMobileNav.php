<?php ob_start(); ?>
<link rel="stylesheet" href="/include/css/mobile-nav.css">

<!-- Mobile bottom navigation bar (hidden on desktop via CSS) -->
<nav class="mobile-nav" id="mobile-nav" role="navigation" aria-label="Mobile navigation">
    <a href="/home/" class="mobile-nav-item" id="mobile-nav-home">
        <i class="fa-solid fa-house"></i>
        <span>Home</span>
    </a>
    <button type="button" class="mobile-nav-item" id="mobile-nav-shop-btn">
        <i class="fa-solid fa-store"></i>
        <span>Shop</span>
    </button>
    <button type="button" class="mobile-nav-item" id="mobile-nav-basket-btn">
        <div class="mobile-nav-icon-wrap">
            <i class="fa-solid fa-basket-shopping"></i>
            <span class="mobile-nav-badge" id="mobile-nav-badge">0</span>
        </div>
        <span>Basket</span>
    </button>
    <button type="button" class="mobile-nav-item" id="mobile-nav-currency-btn">
        <i class="fa-solid fa-coins"></i>
        <span id="mobile-nav-currency-text">GBP</span>
    </button>
</nav>

<!-- Shared overlay for all mobile sheets -->
<div class="mobile-sheet-overlay" id="mobile-sheet-overlay"></div>

<!-- Shop / Categories bottom sheet -->
<div class="mobile-bottom-sheet mobile-shop-sheet" id="mobile-shop-sheet">
    <div class="mobile-sheet-handle"></div>
    <div class="mobile-sheet-header">
        <span class="mobile-sheet-title">Shop</span>
        <button type="button" class="mobile-sheet-close" id="mobile-shop-close">✕</button>
    </div>
    <div class="mobile-shop-categories" id="mobile-shop-categories"></div>
</div>

<!-- Currency bottom sheet -->
<div class="mobile-bottom-sheet mobile-currency-sheet" id="mobile-currency-sheet">
    <div class="mobile-sheet-handle"></div>
    <div class="mobile-sheet-header">
        <span class="mobile-sheet-title">Currency</span>
        <button type="button" class="mobile-sheet-close" id="mobile-currency-close">✕</button>
    </div>
    <div class="mobile-currency-grid" id="mobile-currency-grid">
        <button data-code="AUD">AUD</button>
        <button data-code="BRL">BRL</button>
        <button data-code="CAD">CAD</button>
        <button data-code="DKK">DKK</button>
        <button data-code="EUR">EUR</button>
        <button data-code="NOK">NOK</button>
        <button data-code="NZD">NZD</button>
        <button data-code="PLN">PLN</button>
        <button data-code="GBP">GBP</button>
        <button data-code="SEK">SEK</button>
        <button data-code="USD">USD</button>
    </div>
</div>

<script>
(function () {
    var overlay     = document.getElementById('mobile-sheet-overlay');
    var shopSheet   = document.getElementById('mobile-shop-sheet');
    var currSheet   = document.getElementById('mobile-currency-sheet');
    var shopBtn     = document.getElementById('mobile-nav-shop-btn');
    var shopClose   = document.getElementById('mobile-shop-close');
    var currBtn     = document.getElementById('mobile-nav-currency-btn');
    var currClose   = document.getElementById('mobile-currency-close');
    var basketBtn   = document.getElementById('mobile-nav-basket-btn');
    var currLabel   = document.getElementById('mobile-nav-currency-text');

    var activeSheet = null;

    function openSheet(sheet) {
        if (activeSheet) closeSheet(activeSheet);
        sheet.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
        activeSheet = sheet;
    }

    function closeSheet(sheet) {
        if (!sheet) return;
        sheet.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = '';
        activeSheet = null;
    }

    if (overlay) overlay.addEventListener('click', function () { closeSheet(activeSheet); });

    // --- Shop sheet ---
    function populateShop() {
        var source = document.querySelector('#category-dropdown-content .category');
        var dest   = document.getElementById('mobile-shop-categories');
        if (source && dest && dest.children.length === 0) {
            dest.innerHTML = source.outerHTML;
        }
    }

    if (shopBtn) shopBtn.addEventListener('click', function () {
        populateShop();
        openSheet(shopSheet);
    });
    if (shopClose) shopClose.addEventListener('click', function () { closeSheet(shopSheet); });

    // --- Currency sheet ---
    function syncCurrencyActive(code) {
        document.querySelectorAll('#mobile-currency-grid button').forEach(function (btn) {
            btn.classList.toggle('currency-active', btn.dataset.code === code);
        });
        if (currLabel) currLabel.textContent = code;
    }

    document.querySelectorAll('#mobile-currency-grid button').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var code = btn.dataset.code;
            localStorage.setItem('currency', code);
            syncCurrencyActive(code);
            if (typeof window.updateCurrency === 'function') {
                window.updateCurrency(code);
            }
            closeSheet(currSheet);
        });
    });

    if (currBtn) currBtn.addEventListener('click', function () { openSheet(currSheet); });
    if (currClose) currClose.addEventListener('click', function () { closeSheet(currSheet); });

    // --- Basket button ---
    if (basketBtn) {
        basketBtn.addEventListener('click', function () {
            var topbarBasket = document.querySelector('.basket');
            if (topbarBasket) {
                topbarBasket.click();
            } else {
                var savedUser   = localStorage.getItem('daisymc_user');
                var sidebar     = document.getElementById('basket-sidebar');
                var bOverlay    = document.getElementById('basket-overlay');
                var loginModal  = document.getElementById('login-modal');
                if (!savedUser && loginModal) {
                    loginModal.classList.add('active');
                } else if (savedUser && sidebar) {
                    sidebar.classList.add('active');
                    if (bOverlay) bOverlay.classList.add('active');
                }
            }
        });
    }

    // --- Init ---
    var saved = localStorage.getItem('currency') || 'GBP';
    syncCurrencyActive(saved);
})();
</script>
<?php return ob_get_clean(); ?>
