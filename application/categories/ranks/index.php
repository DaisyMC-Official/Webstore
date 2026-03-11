<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaisyMC | Welcome</title>
    <link rel="stylesheet" href="/include/css/store-base.css">
    <link rel="stylesheet" href="/include/css/FlowerParticles.css">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/components/particles/GetPartices.php'; ?>
    <div class="container">

        <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/components/topbar/GetTopbar.php'; ?>


        <header class="server-header">
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/components/header/GetHeader.php'; ?>
        </header>

        <div class="body">
            <div class="left-column">
                <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/components/categories/GetCategories.php'; ?>

                <div class="top-customer">
                    <h3 class="top-title">TOP CUSTOMER</h3>
                    <div class="top-player">
                        <img src="https://mc-heads.net/body/ItzRepsac_" class="top-skin">
                        <div class="top-info">
                            <strong>ItzRepsac_</strong>
                            <span>Paid the most this week.</span>
                        </div>
                    </div>
                </div>
                <div class="community-goal">
                    <h3 class="goal-title">COMMUNITY GOAL</h3>
                    <div class="goal-percent">77% completed</div>
                    <div class="goal-bar">
                        <div class="goal-progress" style="width:77%"></div>
                    </div>
                </div>
            </div>
            <main class="content">
                <div class="welcome-card">
                    <h2>Ranks</h2>
                    <div class="rank-store">
                        <div class="rank-card">
                            <img src="https://i.postimg.cc/PJzcvMvV/orchidrank150.png" class="rank-icon">
                            <h3>Orchid Rank</h3>
                            <div class="rank-price"
                                data-usd="11.99"
                                data-gbp="8.95"
                                data-eur="10.35"
                                data-aud="17.02"
                                data-cad="16.27"
                                data-brl="62.89"
                                data-dkk="77.36"
                                data-nok="115.42"
                                data-nzd="20.27"
                                data-pln="44.30"
                                data-sek="110.37">
                            </div>
                            <div class="rank-actions">
                                <button class="info-btn">!</button>
                                <button class="cart-btn" data-name="orchid-rank" data-price="11.99">+ Add to Cart</button>
                            </div>
                        </div>
                        <div class="rank-card">
                            <img src="https://i.postimg.cc/SK2vf4zZ/blossomrank150.png" class="rank-icon">
                            <h3>Blossom Rank</h3>
                            <div class="rank-price"
                                data-usd="29.99"
                                data-gbp="22.40"
                                data-eur="25.90"
                                data-aud="42.58"
                                data-cad="40.72"
                                data-brl="157.34"
                                data-dkk="193.52"
                                data-nok="288.74"
                                data-nzd="50.71"
                                data-pln="110.83"
                                data-sek="276.09">
                            </div>
                            <div class="rank-actions">
                                <button class="info-btn">!</button>
                                <button class="cart-btn">+ Add to Cart</button>
                            </div>
                        </div>
                        <div class="rank-card">
                            <img src="https://i.postimg.cc/SNd3yDh6/cloudrank150.png" class="rank-icon">
                            <h3>Cloud Rank</h3>
                            <div class="rank-price"
                                data-usd="89.99"
                                data-gbp="67.23"
                                data-eur="77.73"
                                data-aud="127.78"
                                data-cad="122.20"
                                data-brl="472.14"
                                data-dkk="580.71"
                                data-nok="866.45"
                                data-nzd="152.18"
                                data-pln="332.59"
                                data-sek="828.49">
                            </div>
                            <div class="rank-actions">
                                <button class="info-btn">!</button>
                                <button class="cart-btn">+ Add to Cart</button>
                            </div>
                        </div>
                        <div class="rank-card">
                            <img src="https://i.postimg.cc/HLqPSNQh/daisyrank150.png" class="rank-icon">
                            <h3>Daisy Rank</h3>
                            <div class="rank-price"
                                data-usd="179.99"
                                data-gbp="134.47"
                                data-eur="155.47"
                                data-aud="255.59"
                                data-cad="244.42"
                                data-brl="944.36"
                                data-dkk="1161.51"
                                data-nok="1733.01"
                                data-nzd="304.39"
                                data-pln="665.24"
                                data-sek="1657.09">
                            </div>
                            <div class="rank-actions">
                                <button class="info-btn">!</button>
                                <button class="cart-btn">+ Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>

    </div>

    <footer class="site-footer">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/components/footer/GetFooter.php'; ?>
    </footer>

    <div id="copy-popup">IP Copied to Clipboard!</div>

    <!-- Login Modal -->
    <div id="login-modal" class="login-modal">

        <div class="login-box">

            <button class="login-close" id="login-close">✕</button>

            <h2>Login</h2>
            <p class="login-sub">Enter your username to start shopping.</p>

            <div class="username-field">

                <img src="https://mc-heads.net/head/Steve" class="username-head" id="login-head">

                <input id="login-username" type="text" placeholder="Please enter your username to continue">

            </div>

            <p class="bedrock-note">
                Add <strong>.</strong> before your username to log in as a bedrock player.
            </p>

            <button class="login-button" id="login-submit">Login</button>

        </div>

    </div>

    <!-- Basket Sidebar -->
    <div id="basket-sidebar" class="basket-sidebar">

        <div class="basket-sidebar-header">
            <h3 id="sidebar-username">Basket</h3>
            <button id="logout-btn">Logout</button>
        </div>

        <div class="basket-sidebar-content">
            <ul id="cart-items-list">
                <!-- Items will be injected here -->
            </ul>
            <div class="cart-total">
                Total: $<span id="cart-total">0.00</span>
            </div>
            <button id="checkout-btn">Checkout</button>
        </div>

    </div>

    <div id="basket-overlay" class="basket-overlay"></div>

    <script src="/include/JS/currency.js"></script>
    <script src="/include/JS/playercount.js"></script>
    <script src="/include/JS/store.js"></script>
    <script src="/include/JS/copyip.js"></script>
    <script src="/include/JS/cart.js"></script>
    <script src="/include/JS/AnimateFlowers.js"></script>
</body>

</html>