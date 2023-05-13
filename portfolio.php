<?php
$title = "Portfolio";
require('header.php');
?>

<style>
    html,
    body {
        position: relative;
        height: 100%;
        overflow: hidden;
    }

    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    swiper-container {
        width: 100%;
        height: 92vh;
        display: flex;
        align-items: center;
    }

    swiper-slide {
        margin-top: 30px;
        height: 600px;
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    swiper-slide img {
        display: block;
        width: 100%;
        height: 600px;
        object-fit: cover;
    }

</style>

</head>

<body>

    <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30"
        slides-per-view="3">
        <swiper-slide>
            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
        </swiper-slide>
        <swiper-slide>
            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
        </swiper-slide>
        <swiper-slide>
            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
        </swiper-slide>
        <swiper-slide>
            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
        </swiper-slide>

    </swiper-container>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>

</body>

</html>