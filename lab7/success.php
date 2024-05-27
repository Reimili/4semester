<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <title>Успешное обновление данных</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Успешное обновление данных</h1>
        <p>Ваши данные были успешно обновлены и сохранены.</p>
        <p><strong>Ваше имя пользователя:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        
        <?php if (isset($_SESSION['password'])): ?>
            <p><strong>Ваш пароль:</strong> <?php echo htmlspecialchars($_SESSION['password']); ?></p>
            <p>Пожалуйста, сохраните его в надежном месте.</p>
        <?php endif; ?>

        <a href="index.php">Вернуться на страницу входа</a>
    </div>
</body>
</html>
