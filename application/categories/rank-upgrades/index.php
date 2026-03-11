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
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/include/components/footer/GetFooter.php'; ?>
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

</body>

</html>