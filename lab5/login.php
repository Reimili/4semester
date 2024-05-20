<?php

    include 'db_pass.php';
    try {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD,
            [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo 'Подключение не удалось: ' . $e->getMessage();
        exit;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $stmt = $db->prepare("SELECT * FROM Users WHERE username = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $login;
            header("Location: form.php"); 
            exit();
        } else {
            header("Location: index.php"); 
            exit();
        }
    }