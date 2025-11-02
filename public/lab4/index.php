<?php
declare(strict_types=1);

require_once __DIR__ . '/classes/Product.php';
require_once __DIR__ . '/classes/DiscountedProduct.php';
require_once __DIR__ . '/classes/Category.php';

function hr(): void { echo "<hr>"; }

header('Content-Type: text/html; charset=UTF-8');

try {
    $p1 = new Product('Хліб', 25.00, 'Пшеничний');
    $p2 = new Product('Молоко', 32.50, '1 л');

    $d1 = new DiscountedProduct('Яблука', 40.00, '1 кг', 10);
    $d2 = new DiscountedProduct('Чай', 80.00, 'Зелений', 15);

    echo "<h2>Інформація про товари</h2>";

    echo $p1->getInfo(); hr();
    echo $p2->getInfo(); hr();
    echo $d1->getInfo(); hr();
    echo $d2->getInfo(); hr();

    $catFood = new Category('Продукти');
    $catDrinks = new Category('Напої');

    $catFood->addProduct($p1);
    $catFood->addProduct($d1);

    $catDrinks->addProduct($p2);
    $catDrinks->addProduct($d2);

    echo "<h2>Товари за категоріями</h2>";
    echo $catFood->getProductsInfo(); hr();
    echo $catDrinks->getProductsInfo();

} catch (Throwable $e) {
    echo "<p style='color:red'>Помилка: " . htmlspecialchars($e->getMessage(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . "</p>";
}
