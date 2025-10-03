<?php
session_start();

if (isset($_POST['login_btn']) && isset($_POST['login']) && isset($_POST['password'])) {
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = $_POST['password'];
}

if (isset($_POST['logout_btn'])) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session</title>
</head>
<body>

<?php
if (isset($_SESSION['login'])) {
    echo "<h2>Welcome, " . $_SESSION['login'] . "!</h2>"; ?>
    <form method="post">
        <input type="submit" name="logout_btn" value="Logout">
    </form><br/>
    <?php
} else {
    ?>
    <form method="post">
        <label for="login">Login: </label>
        <input name="login" id="login" type="text" required><br/>

        <label for="password">Password: </label>
        <input name="password" id="password" type="password" required><br/>

        <input type="submit" name="login_btn" value="Login">
    </form>
    <?php
}
?>
</body>
</html>
