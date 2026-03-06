<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Minecraft Store Layout</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="store-container">

        <div class="store-layout">

            <!-- Header -->
            <header class="header">

                <button class="menu-toggle" onclick="toggleMenu()">☰</button>

                <a href="/" class="back-button">← back to main site</a>

                <div class="header-actions">
                    <button>Giftcard</button>
                    <button>EUR</button>
                    <button class="cart">Cart (2)</button>
                </div>

                <!-- Mobile navigation -->
                <nav class="mobile-nav">
                    <a href="#">🏠 Home</a>
                    <a href="#">⭐ Ranks</a>
                    <a href="#">📦 Crates</a>
                </nav>

            </header>


            <!-- Sidebar -->
            <aside class="sidebar">
                <h3>Start Shopping</h3>
                <nav>
                    <a class="active" href="#">
                        <div class ="head-container">
                            <img src="https://mc-heads.net/head/879e54cbe87867d14b2fbdf3f1870894352048dfecd962846dea893b2154c85/40"> alt="Shop Head">
                        </div>
                        <div class="text-container">
                            <span class="icon">Home</span>
                        </div>
                    </a>
                    <a href="#">
                        <div class ="head-container">
                            <img src="https://mc-heads.net/head/990553ec1e5a65f540a46f96492c0809c57b8860086e55b056601a8b60117662/40"> alt="Shop Head">
                        </div>
                        <div class="text-container">
                            <span class="icon">Ranks</span>
                        </div>
                    </a>
                    <a href="#">
                        <div class ="head-container">
                            <img src="https://mc-heads.net/head/4611da08ca09f44268af0881e83703e5db9fa1a27192a3f9d55b8c70b7ece76e/40"> alt="Shop Head">
                        </div>
                        <div class="text-container">
                            <span class="icon">Crates</span>
                        </div>
                    </a>
                </nav>
            </aside>

            <aside class="customers">
                <div class="customer">
                    <div class="avatar-container">
                        <img class="custom-avatar" src="https://mc-heads.net/body/ItzRepsac_/80" alt="Customer 1">
                    </div>
                    <div class="name-container">
                        <h3>Top Customer</h3>
                        <p> ItzRepsac_ </p>
                    </div>
                </div>
            </aside>

            <!-- Content -->
            <main class="content">
                <h2>Ranks</h2>
                <div class="packages">
                    <div class="package">

                        <div class="package-image">
                            <img src="https://i.postimg.cc/G37c7QNT/minecraft-title.png" alt="VIP Rank">
                        </div>

                        <div class="package-body">
                            <h3>VIP</h3>
                            <p>Basic perks and commands</p>
                            <div class="price">€4.99</div>
                            <button>Purchase</button>
                        </div>

                    </div>
                    <div class="package">

                        <div class="package-image">
                            <img src="https://i.postimg.cc/G37c7QNT/minecraft-title.png" alt="VIP Rank">
                        </div>

                        <div class="package-body">
                            <h3>VIP</h3>
                            <p>Basic perks and commands</p>
                            <div class="price">€4.99</div>
                            <button>Purchase</button>
                        </div>

                    </div>
                    <div class="package">

                        <div class="package-image">
                            <img src="https://i.postimg.cc/G37c7QNT/minecraft-title.png" alt="VIP Rank">
                        </div>

                        <div class="package-body">
                            <h3>VIP</h3>
                            <p>Basic perks and commands</p>
                            <div class="price">€4.99</div>
                            <button>Purchase</button>
                        </div>

                    </div>



                </div>
            </main>

            <!-- Footer -->
            <footer class="footer">
                <div>
                    <h4>About</h4>
                    <p>Minecraft server store.</p>
                </div>
                <div>
                    <h4>Links</h4>
                    <p>Terms</p>
                    <p>Privacy</p>
                </div>
                <div>
                    <h4>Contact</h4>
                    <button>Discord</button>
                </div>
            </footer>
        </div>
    </div>

    <script>
        function toggleMenu() {
            document.querySelector(".mobile-nav")
                .classList.toggle("open");
        }
    </script>

</body>

</html>