<?php

declare(strict_types=1);

namespace App\Enums;

enum InvoiceStatus: int
{
    use InvoiceStatusHelper;
    case Pending = 0;
    case Paid = 1;
    case Void = 2;
    case Failed = 3;

    public function toString()
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Paid => 'Paid',
            self::Void => 'Void',
            self::Failed => 'Declined',
        };
    }

    public function color(): Color
    {
        return match ($this) {
            self::Pending => Color::Orange,
            self::Paid => Color::Green,
            self::Void => Color::Gray,
            self::Failed => Color::Red,
        };
    }
}