<?php

declare(strict_types=1);

namespace app\Classes\Composition;

class Invoice
{
    public function __construct(protected SalesTaxCalculator $salesTaxCalculator)
    {
    }

    public function create(array $lineItems)
    {
        $linesItemsTotal = $this->calculateLineItemsTotal($lineItems);

        $salesTax = $this->salesTaxCalculator->calculate($linesItemsTotal);

        $total = $linesItemsTotal + $salesTax;

        echo "Sub Total: $linesItemsTotal\n" .
             "Sales Tax: $salesTax\n" .
             "Total: $total\n";

        // Do some other stuff
    }

    private function calculateLineItemsTotal(array $items)
    {
        return array_sum(
            array_map(
                fn($item) => $item['unitPrice'] * $item['quantity'],
                $items
            )
        );
    }
}
