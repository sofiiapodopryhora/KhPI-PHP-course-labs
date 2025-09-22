<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    
    if (empty($firstname) || empty($lastname)) {
        echo "Будь ласка, заповніть обидва поля";
        exit;
    }
    
    if (!is_string($firstname) || !is_string($lastname)) {
        echo "Некоректний тип даних.";
        exit;
    }
    
    echo "Вітаємо, " . htmlspecialchars($firstname) . " " . htmlspecialchars($lastname) . "!";
} else {
    echo "Форма не була надіслана.";
}
?>