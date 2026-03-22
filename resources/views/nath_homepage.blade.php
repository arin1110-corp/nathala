<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NATHALA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&family=Playfair+Display:wght@500;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #fff;
            color: #111
        }

        :root {
            --pink: #e8a0b7;
            --purple: #b76e79;
            --gradient: linear-gradient(135deg, #f8e8ec, #e9c6ff);
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            width: 100%;
            top: 0;
            padding: 18px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 9999;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-family: 'Playfair Display';
            font-size: 24px;
            letter-spacing: 2px
        }

        .menu {
            display: flex
        }

        .menu a {
            margin-left: 25px;
            text-decoration: none;
            color: #111;
            font-size: 13px;
            position: relative
        }

        .menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--pink);
            transition: .3s
        }

        .menu a:hover::after {
            width: 100%
        }

        .menu-toggle {
            display: none
        }

        /* HERO */
        .hero {
            margin-top: 80px;
            height: 90vh;
            position: relative;
            overflow: hidden
        }

        .slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: 1s
        }

        .slide.active {
            opacity: 1
        }

        .hero-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6))
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            text-align: center
        }

        .hero-content h1 {
            font-family: 'Playfair Display';
            font-size: 50px
        }

        .btn {
            padding: 12px 30px;
            border: none;
            background: var(--gradient);
            border-radius: 30px;
            cursor: pointer
        }

        /* SECTION */
        .section {
            padding: 70px 40px
        }

        .section h2 {
            text-align: center;
            font-family: 'Playfair Display';
            margin-bottom: 30px
        }

        /* PRODUCTS */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px
        }

        .card {
            overflow: hidden;
            border-radius: 12px;
        }

        .card img {
            width: 100%;
            transition: .4s;
        }

        .card:hover img {
            transform: scale(1.05);
        }

        /* CATEGORY */
        .category-wrapper {
            overflow: hidden
        }

        .category-slider {
            display: flex;
            gap: 20px;
            transition: .5s;
        }

        .category {
            min-width: 220px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            text-align: center;
            padding: 15px;
            position: relative;
            overflow: hidden;
        }

        .category img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            transition: .4s;
        }

        /* HOVER PREMIUM */
        .category::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(232, 160, 183, 0.3), rgba(183, 110, 121, 0.2));
            opacity: 0;
            transition: .4s;
        }

        .category:hover::after {
            opacity: 1
        }

        .category:hover img {
            transform: scale(1.08);
        }

        .slider-btn {
            margin-top: 20px;
            text-align: center;
        }

        .slider-btn button {
            padding: 8px 15px;
            border: none;
            background: var(--pink);
            color: #fff;
            cursor: pointer;
            margin: 0 5px;
        }

        /* HIGHLIGHT */
        .highlight {
            margin: 50px 0;
            padding: 30px 20px;
            text-align: center;
            background: #fff;
        }

        .highlight-content {
            max-width: 600px;
            margin: auto;
        }

        .highlight h2 {
            font-family: 'Playfair Display';
            font-size: 32px;
            margin: 15px 0;
            letter-spacing: 1px;
        }

        .highlight p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
        }

        /* garis elegan */
        .line {
            display: block;
            width: 400px;
            height: 2px;
            margin: 15px auto;
            background: linear-gradient(90deg, transparent, #e8a0b7, transparent);
        }

        .footer {
            position: relative;
            background: linear-gradient(135deg, #fff1f5, #f8e8ec, #f3dbe3);
            color: #444;
            padding: 60px 40px 20px;
        }

        /* garis atas elegan */
        .footer::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            top: 0;
            left: 0;
            background: linear-gradient(90deg, transparent, #e8a0b7, transparent);
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        /* BRAND */
        .footer-col h3 {
            font-family: 'Playfair Display';
            color: #222;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        /* TITLE */
        .footer-col h4 {
            color: #b76e79;
            margin-bottom: 15px;
            font-size: 14px;
            letter-spacing: 1px;
        }

        /* TEXT */
        .footer-col p {
            font-size: 13px;
            line-height: 1.6;
            color: #666;
        }

        /* LINK */
        .footer-col a {
            display: block;
            color: #666;
            font-size: 13px;
            margin-bottom: 8px;
            text-decoration: none;
            transition: .3s;
        }

        /* HOVER */
        .footer-col a:hover {
            color: #e8a0b7;
            transform: translateX(3px);
        }

        /* BOTTOM */
        .footer-bottom {
            text-align: center;
            font-size: 12px;
            color: #777;
            border-top: 1px solid rgba(183, 110, 121, 0.2);
            padding-top: 15px;
        }

        /* RESPONSIVE */
        @media(max-width:768px) {
            .menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 65px;
                right: 0;
                background: #fff;
                width: 200px
            }

            .menu.active {
                display: flex
            }

            .menu-toggle {
                display: block
            }

            .hero-content h1 {
                font-size: 30px
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">NATHALA</div>
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
        <div class="menu" id="menu">
            <a href="#">HOME</a>
            <a href="#">SHOP</a>
            <a href="#">COLLECTION</a>
            <a href="#">CONTACT</a>
        </div>
    </div>

    <!-- HERO -->
    <section class="hero">
        @php
            $slides = [
                'https://images.unsplash.com/photo-1490481651871-ab68de25d43d',
                'https://images.unsplash.com/photo-1512436991641-6745cdb1723f',
            ];
        @endphp

        @foreach ($slides as $i => $slide)
            <div class="slide {{ $i == 0 ? 'active' : '' }}" style="background-image:url('{{ $slide }}')"></div>
        @endforeach

        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>NATHALA</h1>
            <p>Elegant Fashion with a Touch of Pink</p>
        </div>
    </section>

    <!-- NEW ARRIVAL -->
    <section class="section">
        <h2>NEW ARRIVAL</h2>

        @php
            $products = [
                'https://images.unsplash.com/photo-1512436991641-6745cdb1723f',
                'https://images.unsplash.com/photo-1490481651871-ab68de25d43d',
                'https://images.unsplash.com/photo-1490481651871-ab68de25d43d',
            ];
        @endphp

        <div class="grid">
            @foreach ($products as $p)
                <div class="card">
                    <img src="{{ $p }}">
                </div>
            @endforeach
        </div>
    </section>

    <!-- KATEGORI -->
    <section class="section">
        <h2>KATEGORI</h2>

        @php
            $categories = [
                ['img' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d', 'name' => 'Tas'],
                ['img' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d', 'name' => 'Heels'],
                ['img' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f', 'name' => 'Dress'],
                ['img' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d', 'name' => 'Fashion'],
                ['img' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c', 'name' => 'Outerwear'],
                ['img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab', 'name' => 'Casual'],
                ['img' => 'https://images.unsplash.com/photo-1489987707025-afc232f7ea0f', 'name' => 'Formal'],
                ['img' => 'https://images.unsplash.com/photo-1519741497674-611481863552', 'name' => 'Accessories'],
                ['img' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d', 'name' => 'Beauty'],
                ['img' => 'https://images.unsplash.com/photo-1516826957135-700dedea698c', 'name' => 'Shoes'],
            ];
        @endphp

        <div class="category-wrapper">
            <div class="category-slider" id="slider">
                @foreach ($categories as $c)
                    <div class="category">
                        <img src="{{ $c['img'] }}">
                        <p>{{ $c['name'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="slider-btn">
            <button onclick="slideLeft()">◀</button>
            <button onclick="slideRight()">▶</button>
        </div>
    </section>

    <section class="highlight">
        <div class="highlight-content">
            <span class="line"></span>
            <h2>Timeless Elegance</h2>
            <p>Refined fashion curated with subtle femininity and modern grace</p>
            <span class="line"></span>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">

            <!-- BRAND -->
            <div class="footer-col">
                <h3>NATHALA</h3>
                <p>Elegant fashion with a soft touch of pink, crafted for modern women.</p>
            </div>

            <!-- MENU -->
            <div class="footer-col">
                <h4>Menu</h4>
                <a href="#">Home</a>
                <a href="#">Shop</a>
                <a href="#">Collection</a>
                <a href="#">Contact</a>
            </div>

            <!-- SOSIAL MEDIA -->
            <div class="footer-col">
                <h4>Follow Us</h4>
                <a href="#">Instagram</a>
                <a href="#">TikTok</a>
                <a href="#">Facebook</a>
            </div>

            <!-- MARKETPLACE -->
            <div class="footer-col">
                <h4>Marketplace</h4>
                <a href="#">Shopee</a>
                <a href="#">Tokopedia</a>
                <a href="#">WhatsApp</a>
            </div>

        </div>

        <!-- BOTTOM -->
        <div class="footer-bottom">
            © <span> {{ date('Y') }}</span> NATHALA — Built by ARIN | v<span> {{ config('app.version') }}</span>
        </div>
    </footer>

    <script>
        // HERO AUTO
        let slides = document.querySelectorAll('.slide');
        let index = 0;
        setInterval(() => {
            slides[index].classList.remove('active');
            index = (index + 1) % slides.length;
            slides[index].classList.add('active');
        }, 4000);

        function toggleMenu() {
            document.getElementById('menu').classList.toggle('active');
        }

        // CATEGORY AUTO SLIDE
        let scrollX = 0;

        function getCardWidth() {
            return document.querySelector('.category').offsetWidth + 20;
        }

        function getMaxScroll() {
            let slider = document.getElementById('slider');
            let wrapper = document.querySelector('.category-wrapper');
            return slider.scrollWidth - wrapper.offsetWidth;
        }

        function slideRight() {
            scrollX += getCardWidth();
            if (scrollX > getMaxScroll()) scrollX = 0;
            document.getElementById('slider').style.transform = `translateX(-${scrollX}px)`;
        }

        function slideLeft() {
            scrollX -= getCardWidth();
            if (scrollX < 0) scrollX = getMaxScroll();
            document.getElementById('slider').style.transform = `translateX(-${scrollX}px)`;
        }

        // AUTO RUN
        setInterval(slideRight, 3000);
    </script>

</body>

</html>
