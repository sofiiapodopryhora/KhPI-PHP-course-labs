<?php
$cookieName = 'user_name';

if (isset($_POST['user_name'])) {
    $input = $_POST['user_name'];
    setcookie($cookieName, $input, time() + (86400 * 7), "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['delete_cookie_btn'])) {
    setcookie($cookieName, '', time() - 3600, "/");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies</title>
</head>
<body>

<?php
if (isset($_COOKIE[$cookieName])) {
    echo "<h2>Welcome back, " . $_COOKIE[$cookieName] . "!</h2>";
    ?>
    <form method="post">
        <input type="submit" name="delete_cookie_btn" value="Delete cookie">
    </form
    <?php
} else {
    echo "<h2>Welcome! Please enter your name.</h2>";
    ?>
    <form method="post">
        <label for="user_name">Name: </label>
        <input name="user_name" id="user_name" type="text"><br/>
        <input type="submit" value="Submit">
    </form>
    <?php
}
?>

</body>
</html>
