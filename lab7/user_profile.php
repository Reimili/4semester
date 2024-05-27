<?php
    include 'db_pass.php';


    $user_id = isset($_GET['user_id']) ? htmlspecialchars($_GET['user_id']): '';

    $stmt = $db->prepare("SELECT * FROM Users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $new_fullname = test_input($_POST['fullname']);
        $new_phone = test_input($_POST['phone']);
        $new_email = test_input($_POST['email']);
        $new_bio = test_input($_POST['bio']);

        $stmt = $db->prepare("UPDATE Users SET fullname = ?, phone = ?, email = ?, bio = ? WHERE user_id = ?");
        $stmt->execute([$new_fullname, $new_phone, $new_email, $new_bio, $user_id]);
        header("Location: user_profile.php?user_id=".htmlspecialchars($user_id));
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <title>Данные пользователя</title>
</head>
<body>
    <h1>Редактировать данные пользователя</h1>
    <div>          </div>
    <form action="" method="POST">
        <label>Имя:</label>
        <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>">
        <label>Телефон:</label>
        <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">
        <label>Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>">
        <br>
        <label>Биография:</label>
        <input type="bio" name="bio" value="<?= htmlspecialchars($user['bio']) ?>">
        <button type="submit">Сохранить изменения</button>
        <br>
        <a href="adminPage.php">Вернуться к панеле админа</a>
    </form>
</body>
</html>