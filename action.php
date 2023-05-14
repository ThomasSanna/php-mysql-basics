<?php session_start(); ?>
<?php include 'userinfo.php'; ?>

<?php

if (isset($_POST['register-submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');

    $query = $dp->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
    $query->execute([
        'username' => $username,
        'email' => $email,
    ]);

    $user = $query->fetch();

    if ($user) {
        echo 'Username or email already exists';
    } else {
        $hashed_password = password_hash($password, PASSWORD_ARGON2ID);
        $query = $dp->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
        $query->execute([
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password
        ]);
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');

    }
}

if (isset($_POST['login-submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');

    $query = $dp->prepare('SELECT * FROM users WHERE email = :email');
    $query->execute([
        'email' => $email,
    ]);

    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
    } else {
        echo 'Wrong email or password';
    }
}
?>



<?php

function verifUsernameExist($username)
{
    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');
    $query = $dp->prepare('SELECT * FROM users WHERE username = :username');
    $query->execute([
        ':username' => $username,
    ]);
    $newuser = $query->fetch();
    return $newuser;
}
function verifEmailExist($email)
{
    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');
    $query = $dp->prepare('SELECT * FROM users WHERE email = :email');
    $query->execute([
        ':email' => $email,
    ]);
    $newuser = $query->fetch();
    return $newuser;
}

function setNewUsername($username, $id)
{
    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');
    $query = $dp->prepare('UPDATE users SET username = :username WHERE id = :id');
    $query->execute([
        ':username' => $username,
        ':id' => $id,
    ]);
    $newuser = $query->fetch();
    return $newuser;
}

function setNewEmail($email, $id)
{
    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');
    $query = $dp->prepare('UPDATE users SET email = :email WHERE id = :id');
    $query->execute([
        ':email' => $email,
        ':id' => $id,
    ]);
    $newuser = $query->fetch();
    return $newuser;
}

function setNewBiographie($biographie, $id)
{
    $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');
    $query = $dp->prepare('UPDATE users SET biographie = :biographie WHERE id = :id');
    $query->execute([
        ':biographie' => $biographie,
        ':id' => $id,
    ]);
    $newuser = $query->fetch();
    return $newuser;
}

if(isset($_POST['update-submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $biographie = $_POST['biographie'];

    $userInfo = getUserInfo();
    $id = $userInfo['id'];

    if($biographie != $userInfo['biographie']) {
        setNewBiographie($biographie, $id);
    }

    if($email != $userInfo['email']) {
        $user = verifEmailExist($email);
        if($user) {
            echo 'Email already exists';
        } else {
            setNewEmail($email, $id);
        }
    }


    if($username != $userInfo['username']) {
        $user = verifUsernameExist($username);
        if($user) {
            echo 'Username already exists';
        } else {
            $_SESSION['username'] = $username;
            setNewUsername($username, $id);
        }
    }

    if($_FILES['ppfile']['name'] != "") {
        require 'db.php';
        $userInfos = getUserInfo();
        $id = $userInfos['id'];

        $ppfilename = $_FILES['ppfile']["name"];

        $target = "profilepicture/" . $ppfilename;

        if (move_uploaded_file($_FILES['ppfile']["tmp_name"], $target)) {

            $query = $dp->prepare('UPDATE users SET profilepicture = :profilepicture WHERE id = :id');
            $query->execute([
                ':profilepicture' => $target,
                ':id' => $id,
            ]);

        } else {
            echo "There was a problem uploading image";
        }
    }

    header('Location: profil.php');

}



// PORTFOLIO ADD IMAGE

if (isset($_POST['portfolio-submit'])) {

    $dpp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');

    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];

    $image_destination = 'portfolioImages/' . $image_name;
    move_uploaded_file($image_tmp_name, $image_destination);
    $query = $dpp->prepare("INSERT INTO portfolio (title, description, image) VALUES ('$title', '$description', '$image_destination')");
    $query->execute();
    header('Location: portfolio.php');
}

?>