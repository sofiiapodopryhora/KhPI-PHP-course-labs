<?php
session_start();
require 'db.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $db_username, $db_password);
            $stmt->fetch();

            if (md5($password) == $db_password) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $db_username;
                header("Location: welcome.php");
                exit();
            } else {
                $message = "Невірний пароль.";
            }
        } else {
            $message = "Користувача з таким ім'ям не знайдено.";
        }
        $stmt->close();
    } else {
        $message = "Будь ласка, введіть ім'я користувача і пароль.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Авторизація</title>
</head>
<body>
    <h2>Авторизація</h2>
    <?php if(!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="post" action="login.php">
        Ім'я користувача:<br>
        <input type="text" name="username" required><br><br>
        Пароль:<br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Увійти">
    </form>
    <p>Немає акаунта? <a href="register.php">Зареєструйтеся</a></p>
</body>
</html>