<?php
include 'db_pass.php';

$user_id = $_GET['user_id'];

if (!isset($user_id)) {
    echo "Ошибка: user_id не передан.";
    exit;
}

try {
    $stmt = $db->prepare("DELETE FROM UserProgrammingLanguages WHERE user_id = ?");
    $stmt->execute([$user_id]);

    $stmt = $db->prepare("DELETE FROM Users WHERE user_id = ?");
    $stmt->execute([$user_id]);

    header("Location: adminPage.php");
    exit;
} catch (PDOException $e) {
    echo "Ошибка удаления пользователя: " . htmlspecialchars($e->getMessage());
    exit;
}
?>
