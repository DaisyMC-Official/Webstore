<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaisyMC | Welcome</title>
    <link rel="stylesheet" href="/include/css/home.css">
</head>

<body>

    <div class="container">

        <div class="topbar">

            <div class="topbar-left">
                <a href="/home/" class="back-button">↩ back to main site</a>
            </div>

            <div class="topbar-right">

                <div class="currency-wrapper">
                    <button class="currency" id="currency-button">$ USD</button>

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


        <header class="server-header">

            <div class="server-left">
                <img src="https://i.postimg.cc/cH0Rd9jv/Daisy-MCLogo270.png" class="server-logo">
            </div>

            <div class="server-center" id="copy-ip">

                <div class="play-button">▶︎</div>

                <div class="server-info">
                    <div class="server-ip">play.daisymc.net</div>
                    <div class="server-players">
                        <span class="player-number" id="player-count"></span> players online
                    </div>
                </div>

            </div>

            <div class="server-right">

                <div class="server-icons">
                    <a href="https://discord.gg/Shub57r8wz" class="icon-square" target="_blank" rel="noopener noreferrer">
                        <img src="https://i.postimg.cc/wMWDJCqn/icons8-discord-new-64.png" class="discord-logo">
                    </a>
                    <a href="https://wiki.daisymc.net/" class="icon-square" target="_blank" rel="noopener noreferrer">
                        <img src="https://i.postimg.cc/C1sGMZ9W/icons8-world-64.png" class="website-logo">
                    </a>
                </div>

                <div class="server-buttons">
                    <a href="https://discord.gg/Shub57r8wz" class="pill-button" target="_blank" rel="noopener noreferrer">join</a>
                    <a href="https://wiki.daisymc.net/" class="pill-button" target="_blank" rel="noopener noreferrer">view</a>
                </div>

            </div>

        </header>

        <div class="body">
            <div class="left-column">
                <?php include '/application/include/Components/GetCategories.php'; ?>

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
        <div class="footer-inner">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>
                    <strong>DaisyMC</strong> is a Minecraft Java Edition server with a<br> welcoming community. This is the only official store for<br> the server.
                </p>
            </div>
            <div class="footer-column">
                <h3>Links</h3>
                <ul class="footer-links">
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>
                    If you have any questions, concerns or want to contact<br>us, you can do this on our discord.
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p><strong>All rights reserved. 2026 © DaisyMC</strong><br>We're not affiliated with or endorsed by Mojang, AB.</br></p>
        </div>
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

</body>

</html>