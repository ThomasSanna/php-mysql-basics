<?php
$titrepage = "Portfolio";
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
        
        <?php
        include('portfolioinfo.php');
        $count = getCountId();

        for ($i = 1; $i <= $count[0]; $i++) {
            $image = getImageInfo($i);
            echo '<swiper-slide>
            <a target="_blank" href="./' . $image['image'] . '" class="cardfocus">
                <h1 class="title">' . $image['title'] . '</h1>
                <p class="description">' . $image['description'] . '</p>
            </a>
            <img class="imagecard" src="' . $image['image'] . '" />
            </swiper-slide>';
        }
        ?>

    </swiper-container>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
    <script>
        let imagecard = document.querySelectorAll('.imagecard');
        let cardfocus = document.querySelectorAll('.cardfocus');

        for (let i = 0; i < imagecard.length; i++) {
            imagecard[i].addEventListener('mouseover', () => {
                cardfocus[i].style.display = "flex";
            })
            imagecard[i].addEventListener('mouseout', () => {
                cardfocus[i].style.display = "none";
            })
            cardfocus[i].addEventListener('mouseover', () => {
                cardfocus[i].style.display = "flex";
            })
            cardfocus[i].addEventListener('mouseout', () => {
                cardfocus[i].style.display = "none";
            })
        }
    </script>
</body>

</html>