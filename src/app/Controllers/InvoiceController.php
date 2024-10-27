<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\View;

class InvoiceController
{
    #[Get('/invoices')]
    public function index(): View
    {
        $invoices = (new Invoice())->all(InvoiceStatus::Pending);

        return View::make('invoices/index', ['invoices' => $invoices]);
    }

    #[Get('/invoices/create')]
    public function create(): View
    {
        return View::make('invoices/create');
    }

    #[Post('/invoices/create')]
    public function store()
    {
        $amount = $_POST['amount'];

        var_dump($amount);
    }
}
