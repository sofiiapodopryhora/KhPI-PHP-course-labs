<?php

$file = "log.txt";
$input = $_POST["textToUpload"];

if(isset($input)) {
    $text = trim($input);
    if(!empty($text)) {
        file_put_contents('log.txt', $text . "\n", FILE_APPEND);
    }
}

$content = file_exists($file) ? file_get_contents($file) : '';
echo htmlspecialchars($content);