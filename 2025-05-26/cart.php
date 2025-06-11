<?php
require_once 'Product.php';

class Cart
{
    private array $products;

    public function __construct()
    {
        $this->products = [];
    }

    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function removeProduct(Product $product): void
    {
        foreach ($this->products as $index => $p) {
            if ($p->getName() === $product->getName()) {
                unset($this->products[$index]);
                $this->products = array_values($this->products);
                return;
            }
        }
    }

    public function getTotal(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        return $total;
    }

    public function __toString(): string
    {
        $output = "Produkty w koszyku:\n";
        foreach ($this->products as $product) {
            $output .= $product . "\n";
        }
        $output .= "Pełna cena: " . $this->getTotal();
        return $output;
    }
}
