<?php

declare(strict_types=1);

namespace App\Services\Shipping;

class BillableWeightCalculatorService
{
    public function calculate(
        Weight $weight,
        PackageDimension $packageDimension,
        DimDivisor $dimDivisor
    ): int {
        $dimWeight = (int) round(
            $packageDimension->height * $packageDimension->width * $packageDimension->length / $dimDivisor->value
        );

        return max($dimWeight, $weight->value);
    }
}
