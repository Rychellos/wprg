<?php
require_once 'newCar.php';

class CarWithExtras extends NewCar
{
    protected float $alarm;
    protected float $radio;
    protected float $airConditioning;

    public function __construct(
        string $model,
        float $priceEuro,
        float $euroToPlnRate,
        float $alarm,
        float $radio,
        float $airConditioning
    ) {
        parent::__construct($model, $priceEuro, $euroToPlnRate);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->airConditioning = $airConditioning;
    }

    public function calculatePrice(): float
    {
        $basePrice = parent::calculatePrice();
        return $basePrice + $this->alarm + $this->radio + $this->airConditioning;
    }
}
