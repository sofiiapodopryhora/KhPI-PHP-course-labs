<?php
declare(strict_types=1);

class Product
{
    public string $name;
    public string $description;
    protected float $price;

    public function __construct(string $name, float $price, string $description)
    {
        if ($price < 0) {
            throw new InvalidArgumentException('Ціна товару не може бути від’ємною.');
        }

        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getInfo(): string
    {
        $name = htmlspecialchars($this->name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $description = htmlspecialchars($this->description, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $price = number_format($this->price, 2, '.', ' ');

        return "Назва: {$name}<br>Ціна: {$price}<br>Опис: {$description}";
    }
}