<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $invoice_id
 * @property string $description
 * @property int $quantity
 * @property float $unit_price
 */
class InvoiceItem extends Model
{
    public $timestamps = false; // тк у нас нет колонок updated_at и created_at

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
