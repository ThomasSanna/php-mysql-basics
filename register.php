<?php $titrepage = "S'inscrire"; ?>
<?php require 'header.php' ?>


<?php if (isset($_SESSION['username'])): ?>
    <p>You are already logged in as
        <?php echo $_SESSION['username'] ?>
    </p>
<?php else: ?>
    <main>
        <form action="action.php" method="POST">
            <h1>Inscription</h1>
            <label>Pseudo</label>
            <input required type="text" name="username" placeholder="Entrez votre pseudo.">
            <label>E-Mail</label>
            <input required type="text" name="email" placeholder="Entrez votre e-mail.">
            <label>Mot de passe</label>
            <input required type="password" name="password" placeholder="Entrez votre mot de passe.">
            <input type="submit" name="register-submit" value="S'inscrire">
            <h4>Déjà inscris ? <a href="login.php">Se connecter.</a></h4>
        </form>
    </main>
<?php endif ?>
</body>

</html>