<?php
require 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($email) && !empty($password)) {
        $hashed_password = md5($password);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            $message = "Реєстрація пройшла успішно! Тепер ви можете увійти.";
        } else {
            $message = "Помилка: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Будь ласка, заповніть усі поля.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Реєстрація</title>
</head>
<body>
    <h2>Реєстрація нового користувача</h2>
    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post" action="register.php">
        Ім'я користувача:<br>
        <input type="text" name="username" required><br><br>
        Email:<br>
        <input type="email" name="email" required><br><br>
        Пароль:<br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Зареєструватися">
    </form>
    <p>Уже є акаунт? <a href="login.php">Увійти</a></p>
</body>
</html>