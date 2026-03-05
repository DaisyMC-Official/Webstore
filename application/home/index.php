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

                <div class="logo">MyServer Store</div>

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
                    <a class="active" href="#">🏠 Home</a>
                    <a href="#">⭐ Ranks</a>
                    <a href="#">📦 Crates</a>
                </nav>
            </aside>

            <!-- Content -->
            <main class="content">
                <h2>Ranks</h2>
                <div class="packages">
                    <div class="package">

                        <div class="package-image"
                            style="background-image:url('rank-vip.png')">
                        </div>

                        <div class="package-body">
                            <h3>VIP</h3>
                            <p>Basic perks and commands</p>
                            <div class="price">€4.99</div>
                            <button>Purchase</button>
                        </div>

                    </div>
                    <div class="package">

                        <div class="package-image"
                            style="background-image:url('rank-vip.png')">
                        </div>

                        <div class="package-body">
                            <h3>VIP</h3>
                            <p>Basic perks and commands</p>
                            <div class="price">€4.99</div>
                            <button>Purchase</button>
                        </div>

                    </div>
                    <div class="package">

                        <div class="package-image"
                            style="background-image:url('rank-vip.png')">
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