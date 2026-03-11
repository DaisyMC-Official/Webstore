<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/Basket/BasketSession.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/include/Models/Rank.php';
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

                <div class="customer-goal-row">
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
            </div>
            <main class="content">
                <div class="welcome-card">
                    <h2>Rank Upgrades</h2>
                    <div class="rank-store">
                        <div class="rank-card">
                            <img src="<?php echo htmlspecialchars(Rank::imagePathForName('blossom'), ENT_QUOTES, 'UTF-8'); ?>" class="rank-icon" alt="Blossom">
                            <h3>Orchid -> Blossom</h3>
                            <div class="rank-price"
                                data-usd="17.99"
                                data-gbp="13.39"
                                data-eur="15.49"
                                data-aud="25.44"
                                data-cad="24.43"
                                data-brl="93.68"
                                data-dkk="115.76"
                                data-nok="172.93"
                                data-nzd="30.35"
                                data-pln="66.05"
                                data-sek="164.97">
                            </div>
                            <div class="rank-actions">
                                <button class="info-btn">!</button>
                                <?php if (BasketSession::isLoggedIn()): ?>
                                    <button class="cart-btn" data-name="Orchid -> Blossom" data-price="17.99" data-type="upgrade">+ Add to Cart</button>
                                <?php else: ?>
                                    <button class="cart-btn" data-name="Orchid -> Blossom" data-price="17.99" data-type="upgrade" onclick="openLoginModal()">+ Add to Cart</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="rank-card">
                            <img src="<?php echo htmlspecialchars(Rank::imagePathForName('cloud'), ENT_QUOTES, 'UTF-8'); ?>" class="rank-icon" alt="Cloud">
                            <h3>Blossom -> Cloud</h3>
                            <div class="rank-price"
                                data-usd="60.00"
                                data-gbp="44.67"
                                data-eur="51.68"
                                data-aud="84.87"
                                data-cad="81.49"
                                data-brl="312.47"
                                data-dkk="386.13"
                                data-nok="576.83"
                                data-nzd="101.23"
                                data-pln="220.34"
                                data-sek="550.27">
                            </div>
                            <div class="rank-actions">
                                <button class="info-btn">!</button>
                                <?php if (BasketSession::isLoggedIn()): ?>
                                    <button class="cart-btn" data-name="Blossom -> Cloud" data-price="60.00" data-type="upgrade">+ Add to Cart</button>
                                <?php else: ?>
                                    <button class="cart-btn" data-name="Blossom -> Cloud" data-price="60.00" data-type="upgrade" onclick="openLoginModal()">+ Add to Cart</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="rank-card">
                            <img src="<?php echo htmlspecialchars(Rank::imagePathForName('daisy'), ENT_QUOTES, 'UTF-8'); ?>" class="rank-icon" alt="Daisy">
                            <h3>Cloud -> Daisy</h3>
                            <div class="rank-price"
                                data-usd="90.00"
                                data-gbp="67.01"
                                data-eur="77.52"
                                data-aud="127.30"
                                data-cad="122.24"
                                data-brl="468.71"
                                data-dkk="579.19"
                                data-nok="865.24"
                                data-nzd="151.85"
                                data-pln="330.51"
                                data-sek="825.40">
                            </div>
                            <div class="rank-actions">
                                <button class="info-btn">!</button>
                                <?php if (BasketSession::isLoggedIn()): ?>
                                    <button class="cart-btn" data-name="Cloud -> Daisy" data-price="90.00" data-type="upgrade">+ Add to Cart</button>
                                <?php else: ?>
                                    <button class="cart-btn" data-name="Cloud -> Daisy" data-price="90.00" data-type="upgrade" onclick="openLoginModal()">+ Add to Cart</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>

    </div>

    <footer class="site-footer">
        <?php echo include $_SERVER['DOCUMENT_ROOT'] . '/include/components/footer/GetFooter.php'; ?>
    </footer>

    <script src="/include/JS/currency.js"></script>
    <script src="/include/JS/playercount.js"></script>
    <script src="/include/JS/AnimateFlowers.js"></script>
    <script>
        document.getElementById("copy-ip").addEventListener("click", function() {
            navigator.clipboard.writeText("play.daisymc.net");

            const popup = document.getElementById("copy-popup");

            popup.classList.add("show");

            setTimeout(function() {
                popup.classList.remove("show");
            }, 2000);
        });
    </script>

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
                Total: $<span id="cart-total">0.00</span>
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