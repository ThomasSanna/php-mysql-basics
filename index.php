<?php
$titrepage = "Accueil";
?>

<?php include "header.php" ?>

<div>
    <h1>
        <?php if (isset($_SESSION['username'])): ?>
            Bienvenue <?php echo $_SESSION['username'] ?>
        <?php else: ?>
            Bienvenue
        <?php endif ?>
    </h1>
</div>

</body>
</html>