<?php ob_start(); ?>
<link rel="stylesheet" href="/include/components/topbar/TopbarStyle.css">
<div class="topbar">

    <div class="topbar-left">
        <a href="/home/" class="back-button">↩ back to main site</a>
    </div>

    <div class="topbar-right">

        <div class="currency-wrapper">
            <button class="currency" id="currency-button">GBP</button>

            <div class="currency-menu" id="currency-menu">
                <div class="currency-grid">
                    <button>AUD</button>
                    <button>BRL</button>
                    <button>CAD</button>
                    <button>DKK</button>
                    <button>EUR</button>
                    <button>NOK</button>
                    <button>NZD</button>
                    <button>PLN</button>
                    <button>GBP</button>
                    <button>SEK</button>
                    <button>USD</button>
                </div>
            </div>
        </div>

        <div class="basket">
            <div class="basket-text">
                <strong id="basket-name">Guest's Basket</strong><br>
                <span id="basket-items">click to login</span>
            </div>

            <div class="basket-avatar">
                <img src="https://mc-heads.net/body/Steve2/left" class="basket-player" id="basket-skin">
            </div>
        </div>

    </div>

</div>
<?php return ob_get_clean(); ?>
