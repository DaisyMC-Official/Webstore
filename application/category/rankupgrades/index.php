<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DaisyMC | Welcome</title>
    <link rel="stylesheet" href="/include/css/upgraderank.css">
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
                    <h2>Rank Upgrades</h2>
                    <div class="rank-store">
                        <div class="rank-card">
                            <img src="https://i.postimg.cc/SK2vf4zZ/blossomrank150.png" class="rank-icon">
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
                                <button class="cart-btn">+ Add to Card</button>
                            </div>
                        </div>
                        <div class="rank-card">
                            <img src="https://i.postimg.cc/SNd3yDh6/cloudrank150.png" class="rank-icon">
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
                                <button class="cart-btn">+ Add to Cart</button>
                            </div>
                        </div>
                        <div class="rank-card">
                            <img src="https://i.postimg.cc/HLqPSNQh/daisyrank150.png" class="rank-icon">
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
                                <button class="cart-btn">+ Add to Card</button>
                            </div>
                        </div>
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