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
                    <h2> Welcome to the DaisyMC Store</h2>
                    <p>
                        Here you can purchase ranks, keys, and cosmetics to use on our server. Purchasing items also helps to support server upkeep, hosting, and development.<br><br>
                        Ranks, keys, and cosmetics can also be earned for free through in-game events, giveaways, and community activities. All purchases are processed automatically. If you run into any issues with your order, please reach out to staff and we'll get it sorted.<br><br>
                        ✿ Thank you for supporting DaisyMC! ✿<br><br>
                        Feel free to contact us on Discord by opening a ticket: <a href="https://discord.gg/Shub57r8wz" target="_blank" rel="noopener noreferrer">discord.gg/daisymc</a>
                    </p>
                    <div class="payment-banner">
                        <img src="https://i.ibb.co/SwZ2723/paymentmethds.png" class="payment-methods">
                        <span>+ over 45 more payment methods available.</span>
                    </div>
                </div>
                <div class="info-cards">
                    <div class="info-card refund">
                        <h3>REFUND POLICY</h3>
                        <p>
                            All payments are non-refundable. Attempting a chargeback will result in permanent ban on our server.
                        </p>
                    </div>
                    <div class="info-card privacy">
                        <h3>PRIVACY POLICY</h3>
                        <p>
                            All information that is required on this website is not shared with any other third parties and is stored securely.
                        </p>
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