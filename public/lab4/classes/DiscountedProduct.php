<?php
declare(strict_types=1);

require_once __DIR__ . '/Product.php';

class DiscountedProduct extends Product
{
    private float $discount; // знижка у відсотках (0..100)

    public function __construct(string $name, float $price, string $description, float $discount)
    {
        parent::__construct($name, $price, $description);

        if ($discount < 0 || $discount > 100) {
            throw new InvalidArgumentException('Знижка має бути в діапазоні від 0 до 100.');
        }
        $this->discount = $discount;
    }

    public function getDiscount(): float
    {
        return $this->discount;
    }

    // Нова ціна з урахуванням знижки
    public function getDiscountedPrice(): float
    {
        $newPrice = $this->price * (1 - $this->discount / 100);
        return max(0.0, $newPrice);
    }

    // Перевизначений вивід: додаємо знижку та нову ціну
    public function getInfo(): string
    {
        $name = htmlspecialchars($this->name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $description = htmlspecialchars($this->description, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

        $orig = number_format($this->price, 2, '.', ' ');
        $disc = number_format($this->discount, 0);
        $new = number_format($this->getDiscountedPrice(), 2, '.', ' ');

        return "Назва: {$name}<br>Ціна: {$orig}<br>Знижка: {$disc}%<br>Нова ціна: {$new}<br>Опис: {$description}";
    }
}