<?php
session_start();
date_default_timezone_set('Europe/Kyiv');

$inactiveLimit = 300;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactiveLimit)) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$_SESSION['last_activity'] = time();

$cookieName = 'previous_cart';
$previousCart = isset($_COOKIE[$cookieName]) ? unserialize($_COOKIE[$cookieName]) : [];

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['add_to_cart']) && !empty($_POST['product'])) {
    $product = $_POST['product'];
    $_SESSION['cart'][] = $product;
}

if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['save_and_exit'])) {
    setcookie($cookieName, serialize($_SESSION['cart']), time() + (86400 * 7), "/");
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<body>

<h2>Cart</h2>

<form method="post">
    <label for="product">Add product:</label>
    <input type="text" name="product" id="product" required>
    <input type="submit" name="add_to_cart" value="Add">
</form>

<h3>Current cart:</h3>
<ul>
    <?php
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            echo "<li>$item</li>";
        }
    } else {
        echo "<p>Cart is empty</p>";
    }
    ?>
</ul>

<form method="post">
    <input type="submit" name="clear_cart" value="Clear cart">
    <input type="submit" name="save_and_exit" value="Save and close">
</form>

<h3>Previous orders:</h3>
<ul>
    <?php
    if (!empty($previousCart)) {
        foreach ($previousCart as $item) {
            echo "<li>$item</li>";
        }
    } else {
        echo "<p>No previous products</p>";
    }
    ?>
</ul>

<p><strong>Previous activity time:</strong> <?php echo date("H:i:s", $_SESSION['last_activity']); ?></p>

</body>
</html>
