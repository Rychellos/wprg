<?php
require_once 'carWithExtras.php';

class Insurance extends CarWithExtras
{
    private float $insurancePercent;
    private int $yearsOwned;

    public function __construct(
        string $model,
        float $priceEuro,
        float $euroToPlnRate,
        float $alarm,
        float $radio,
        float $airConditioning,
        float $insurancePercent,
        int $yearsOwned
    ) {
        parent::__construct($model, $priceEuro, $euroToPlnRate, $alarm, $radio, $airConditioning);
        $this->insurancePercent = $insurancePercent;
        $this->yearsOwned = $yearsOwned;
    }

    public function calculatePrice(): float
    {
        $carPrice = parent::calculatePrice();
        $reductionFactor = max(0, (100 - $this->yearsOwned) / 100);
        return $this->insurancePercent * $carPrice * $reductionFactor;
    }
}
