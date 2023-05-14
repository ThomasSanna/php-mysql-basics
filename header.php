<?php session_start();
include 'userinfo.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($titrepage)) echo $titrepage; else echo "Page sans titre"; ?>
    </title>
    <link rel="stylesheet" href="./styles/<?php echo basename($_SERVER['PHP_SELF'], ".php") ?>.css">
    <link rel="stylesheet" href="./styles/reset/reset.css">
    <link rel="stylesheet" href="./styles/header.css">
</head>

<body>
    <script defer src="./scripts/loading.js"></script>
    <!-- loader screen -->
    <div class="loader_container">
        <img class="loader" src="./fonts/logoOPLoadingScreen.png" alt="Loading Image">
    </div>
    <header>
        <nav class="headercontainer">
            <ul class='headergauche'>
                <li><a class="headlien hdlgauche" href="index.php">Accueil</a></li>
                <li><a class="headlien hdlgauche" href="profil.php">Profil</a></li>
                <li><a class="headlien hdlgauche" href="portfolio.php">Portfolio</a></li>
                <?php if (isset($_SESSION['username'])){
                    $userInfo = getUserInfo();
                    if ($userInfo['admin'] == 1){
                        echo "<li><a onclick='formactivated()' class='headlien hdlgauche'>Add</a></li>";
                   }
                } 
                ?>
                    
            </ul>
                <form class="form-add-invisible" action="action.php" method="POST" enctype="multipart/form-data">
                    <h1 class="form-add-title">Ajouter Image</h1>
                    <input required class="inp-text-add" type="text" name="title" placeholder="Title">
                    <input class="inp-text-add" type="text" name="description" placeholder="Description">
                    <input required class="inp-file-add" type="file" name="image" placeholder="Image">
                    <button class="inp-button-add" type="submit" name="portfolio-submit">Submit</button>
                </form>

            <ul class="headerdroite">

                <!-- recupere la photo de profil sql de l'utilisateur connecté et l'affiche  -->
                <?php 
                if (isset($_SESSION['username'])) {
                    $userInfo = getUserInfo();
                    $headerprofilepicture = $userInfo['profilepicture'];
                }
                ?>
                <?php
                    if (isset($_SESSION['username'])) {
                        echo "<a href='profil.php' class='headerprofilepicture'><img class='headerimage' src='$headerprofilepicture' alt=''></a>";
                    }
                ?>

                <?php if (isset($_SESSION['username'])): ?>
                    <li><a class="headlien hdldroit" href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a class="headlien hdldroit" href="login.php">Se Connecter</a></li>
                <?php endif ?>
            </ul>
        </nav>

        <script src="./scripts/formadd.js" defer></script>
    </header>