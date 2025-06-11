<?php

class NewCar
{
    protected string $model;
    protected float $priceEuro;
    protected float $euroToPlnRate;

    public function __construct(string $model, float $priceEuro, float $euroToPlnRate)
    {
        $this->model = $model;
        $this->priceEuro = $priceEuro;
        $this->euroToPlnRate = $euroToPlnRate;
    }

    public function calculatePrice(): float
    {
        return $this->priceEuro * $this->euroToPlnRate;
    }
}
