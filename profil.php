<?php $titrepage = "Profil"; ?>
<?php require_once 'header.php'; ?>
<?php
if (isset($_SESSION['username'])) {
    $userInfo = getUserInfo();
    $usernamesearch = $userInfo['username'];
    $emailsearch = $userInfo['email'];
    $biographiesearch = $userInfo['biographie'];
    $profilepicturesearch = $userInfo['profilepicture'];}
?>


<?php if (isset($_SESSION['username'])): ?>
    <div class="profilchange">
        <form class="formpro" action="action.php" method="POST" enctype="multipart/form-data">

            <h1>Modifiez votre profil</h1>
            <?php
            echo "<div class='contourprofilepic'>
                    <img class='profileimage' src='$profilepicturesearch' alt=''>
                    <label for='ppfile' class='textonhover'>
                        Changer de photo
                    </label>
                    <input onchange='displayImage(this)' type='file' id='ppfile' name='ppfile' accept='image/png, image/jpeg'>
                </div>
                ";

            ?>

            <div class='champs'>
                <label for="username">Pseudo</label>
                <input required type="text" name="username" value="<?php echo $usernamesearch; ?>">
            </div>

            <div class="champs">
                <label for="biographie">Biographie</label>
                <?php
                echo "<textarea rows='3' cols='60' name='biographie' placeholder='Biographie en bonnet du forme...' type='textarea'>$biographiesearch</textarea>";
                ?>
            </div>

            <div class='champs'>
                <label for="email">Email</label>
                <input required type="email" name="email" id="email" value="<?php echo $emailsearch; ?>">
            </div>
            <input type="submit" name="update-submit" value="Modifier">

        </form>
    </div>
<?php else: ?>
    <?php header('Location: login.php'); ?>
<?php endif ?>

<script defer>
    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.querySelector('.profileimage').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>