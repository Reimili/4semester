<?php
    session_start();
    include 'db_pass.php';
    $loginReq = "/^[a-zA-Z]+_[0-9]+$/";
    $passReq = '/^[a-zA-Z0-9]+$/';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['enterAcc'])) {
            $login = $_POST['login'];
            if(!preg_match($loginReq,$login))
            {
                echo "Incorrect Username";
                exit();
            }
            $password = $_POST['password'];
            if(!preg_match($passReq,$password))
            {
                echo "Incorrect Password";
                exit();
            }


            $stmt = $db->prepare("SELECT * FROM Users WHERE username = ?");
            $stmt->execute([$login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['username'] = $login;
                if ($user['admin'] == 1) {
                    header("Location: adminPage.php"); 
                    exit();
                } else {
                    unset($_COOKIE['errors']);
                    setcookie('errors', null, -1, '/');
                    header("Location: form.php"); 
                    exit();
                }
            } else {
                echo "<p>Incorrect Password</p>";
                exit();
            }
        } elseif(isset($_POST['createAcc'])) {
            session_destroy();
            unset($_COOKIE['username']);
            setcookie('username', null, -1, '/');
            header("Location: form.php");
            exit();
        }
    }
?>