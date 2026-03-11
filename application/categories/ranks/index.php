<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/Basket/BasketSession.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/Models/Rank.php';

BasketSession::start();
$baseUrl = '';
$GLOBALS['base_url'] = $baseUrl;

$rankModel = new Rank();
$ranks = $rankModel->getRanksByCategory(1);
$basketCsrfToken = BasketSession::getCsrfToken();
?>

<!DOCTYPE html>
<html lang="en" data-basket-csrf="<?php echo htmlspecialchars($basketCsrfToken, ENT_QUOTES, 'UTF-8'); ?>">

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
                    <h2>Ranks</h2>
                    <div class="rank-store">
                        <?php foreach ($ranks as $rank): ?>
                            <div class="rank-card">
                                <img src="<?php echo htmlspecialchars($rank['image_url'], ENT_QUOTES, 'UTF-8'); ?>" class="rank-icon" alt="<?php echo htmlspecialchars($rank['name'], ENT_QUOTES, 'UTF-8'); ?>">
                                <h3><?php echo htmlspecialchars($rank['name'], ENT_QUOTES, 'UTF-8'); ?> Rank</h3>
                                <div class="rank-price"
                                    data-gbp="<?php echo number_format($rank['price'], 2, '.', ''); ?>">
                                </div>
                                <div class="rank-actions">
                                    <?php echo basket_render_add_button($rank['name'], $rank['price'], '+ Add to Cart', $rank['id']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
            <h3 id="sidebar-username">Basket</h3>
            <button id="logout-btn">Logout</button>
        </div>

        <div class="basket-sidebar-content">
            <ul id="cart-items-list">
                <!-- Items will be injected here -->
            </ul>
            <div class="cart-total">
                Total: £<span id="cart-total">0.00</span>
            </div>
            <button id="checkout-btn">Checkout</button>
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
</body>

</html>