<?php $titrepage = "Se Connecter"; ?>
<?php require 'header.php' ?>


<?php if(isset($_SESSION['username'])): ?>
    <p>You are already logged in as <?php echo $_SESSION['username'] ?></p>
<?php else: ?>
    <main>
        <form action="action.php" method="POST">
            <h1>Connexion</h1>
            <label>E-Mail</label>
            <input required type="text" name="email" placeholder="Entrez votre e-mail.">
            <label>Mot de passe</label>
            <input required type="password" name="password" placeholder="Entrez votre mot de passe.">
            <input name="login-submit" type="submit" value="Se connecter">
            <h4><a href="register.php">S'inscrire</a></h4>
        </form>
    </main>
<?php endif ?>
</body>
</html>