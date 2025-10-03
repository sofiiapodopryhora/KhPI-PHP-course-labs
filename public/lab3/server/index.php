<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: redirect.php");
    exit;
}
echo "IP-address: " . $_SERVER['REMOTE_ADDR'] . "<br/>";
echo "User browser: " . $_SERVER['HTTP_USER_AGENT'] . "<br/>";
echo "Script name: " . $_SERVER['PHP_SELF'] . "<br/>";
echo "Request method: " . $_SERVER['REQUEST_METHOD'] . "<br/>";
echo "Path to file on server: " . $_SERVER['SCRIPT_FILENAME'] . "<br/>";