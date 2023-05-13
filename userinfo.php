<?php
function getUserInfo()
{
    if (isset($_SESSION['username'])) {
        $dp = new PDO('mysql:host=localhost;dbname=testtrue', 'root', '');

        $query = $dp->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute([
            ':username' => $_SESSION['username']
        ]);

        $user = $query->fetch();

        if ($user) {
            $userInfo = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'profilepicture' => $user['profilepicture'],
                'biographie' => $user['biographie'],
                'admin' => $user['admin']
            ];

            return $userInfo;
        }
    }

    return null;
}

?>