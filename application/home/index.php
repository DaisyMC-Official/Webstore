<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/Basket/BasketSession.php';
BasketSession::start();
$baseUrl = '';
$GLOBALS['base_url'] = $baseUrl;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DaisyMC | Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/include/css/store-base.css">
    <link rel="stylesheet" href="<?php echo $baseUrl; ?>/include/css/FlowerParticles.css">
</head>

<body>
    <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/particles/GetPartices.php'; ?>
    <div class="container">

        <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/topbar/GetTopbar.php'; ?>

        <header class="server-header">
            <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/header/GetHeader.php'; ?>
        </header>

        <div class="body">
            <div class="left-column">
                <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/categories/GetCategories.php'; ?>
                <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/customer-goal/GetCustomerAndGoal.php'; ?>
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
        <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/footer/GetFooter.php'; ?>
    </footer>

    <div id="copy-popup">IP Copied to Clipboard!</div>

    <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/toast/GetToast.php'; ?>

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
            <div class="basket-sidebar-title">
                <i class="fa-solid fa-basket-shopping"></i>
                <h3 id="sidebar-username">Basket</h3>
            </div>
            <div class="basket-sidebar-actions">
                <button id="logout-btn">Logout</button>
                <button id="sidebar-close-btn" class="sidebar-close-btn" aria-label="Close basket">✕</button>
            </div>
        </div>

        <div class="basket-sidebar-content">
            <ul id="cart-items-list">
                <!-- Items will be injected here -->
            </ul>
            <div class="basket-footer">
                <div class="cart-total">
                    <span class="cart-total-label">Total</span>
                    <span class="cart-total-amount"><span id="cart-total">£0.00</span></span>
                </div>
                <button id="checkout-btn">Checkout →</button>
            </div>
        </div>

    </div>

    <div id="basket-overlay" class="basket-overlay"></div>

    <script>window.BASE_URL = '<?php echo addslashes($baseUrl); ?>';</script>
    <script src="<?php echo $baseUrl; ?>/include/JS/currency.js"></script>
    <script src="<?php echo $baseUrl; ?>/include/JS/playercount.js"></script>
    <script src="<?php echo $baseUrl; ?>/include/JS/store.js"></script>
    <script src="<?php echo $baseUrl; ?>/include/JS/BasketManager.js"></script>
    <script src="<?php echo $baseUrl; ?>/include/JS/AnimateToast.js"></script>
    <script src="<?php echo $baseUrl; ?>/include/JS/copyip.js"></script>
    <script src="<?php echo $baseUrl; ?>/include/JS/cart.js"></script>
    <script src="<?php echo $baseUrl; ?>/include/JS/AnimateFlowers.js"></script>
    <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/mobile-nav/GetMobileNav.php'; ?>
</body>

</html>