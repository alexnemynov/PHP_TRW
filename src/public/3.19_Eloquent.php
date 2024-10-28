<?php

declare(strict_types=1);

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Carbon\Carbon;
use Illuminate\Database\Capsule\Manager;

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../eloquent.php';

// base query builder
$invoices = Manager::table('invoices')->where('status', InvoiceStatus::Paid)->get();
var_dump($invoices);
exit();

$invoiceId = 1;
Invoice::query()->where('id', '=', $invoiceId)->update(['status' => InvoiceStatus::Paid]);

// eloquent query builder
Invoice::query()->where('status', InvoiceStatus::Paid)->get()->each(function ($invoice) {
    echo $invoice->id . ", " . $invoice->status->toString() . ", " . $invoice->created_at->format('d/m/Y') . "\n";

    $invoice->items()->where("description", "=", 'Item 2')->delete();
//    $item = $invoice->items->first();
//    $item->description = 'Item 1';
//    $item->save();

//    $invoice->invoice_number = 3;
//    $invoice->push();
});

exit();
Manager::connection()->transaction(function (): void {
    $invoice = new Invoice();

    $invoice->amount = 45;
    $invoice->invoice_number = 1;
    $invoice->status = InvoiceStatus::Pending;
    $invoice->due_date = (new Carbon())->addDays(10);
// id и created_at создаются автоматически

    $invoice->save();

    $items = [['Item 1', 1, 15], ['Item 2', 2, 7.5], ['Item 3', 4, 3.75]];

    foreach ($items as [$description, $quantity, $unitPrice]) {
        $item = new InvoiceItem();

        $item->description = $description;
        $item->quantity = $quantity;
        $item->unit_price = $unitPrice;

        $item->invoice()->associate($invoice);

        $item->save();
    }
});
