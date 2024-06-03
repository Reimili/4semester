<?php
    session_start();
    include 'db_pass.php';
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if(isset($_POST['enterAcc'])) 
        {

            $login = $_POST['login'];
            $password = $_POST['password'];

            $stmt = $db->prepare("SELECT * FROM Users WHERE username = ?");
            $stmt->execute([$login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) 
            {
                $_SESSION['username'] = $login;
                unset($_COOKIE['errors']);
                setcookie('errors', null, -1, '/');
                header("Location: form.php"); 
                exit();
            } 
            else 
            {
                echo "<p style='color:red;'>", "Неправильный логин или пароль!";
                exit();
            }
        }
        elseif (isset($_POST['createAcc'])) 
        {
            session_destroy();
            unset($_COOKIE['username']);
            setcookie('username', null, -1, '/');
            header("Location: form.php");
            exit();
        }
    }
?>