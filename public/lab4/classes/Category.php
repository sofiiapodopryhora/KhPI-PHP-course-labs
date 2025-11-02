<?php
declare(strict_types=1);

require_once __DIR__ . '/Product.php';
require_once __DIR__ . '/DiscountedProduct.php';

class Category
{
    public string $name;
    private array $products = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function getProductsInfo(): string
    {
        $name = htmlspecialchars($this->name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
        $out = "<h3>Категорія: {$name}</h3>";

        if (empty($this->products)) {
            return $out . "<p>Немає товарів у цій категорії.</p>";
        }

        $out .= "<ul>";
        foreach ($this->products as $p) {
            $out .= "<li>" . $p->getInfo() . "</li>";
        }
        $out .= "</ul>";

        return $out;
    }
}