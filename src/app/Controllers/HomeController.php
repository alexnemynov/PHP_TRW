<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\Enums\HttpMethod;
use App\Models\Invoice;
use App\Models\SignUp;
use App\Models\User;
use App\Services\InvoiceService;
use App\View;

class HomeController
{
    public function __construct(private InvoiceService $invoiceService)
    {
    }

    #[Get('/')]
    #[Route(routePath: '/home', HttpMethod: HttpMethod::Head)]
    public function index(): View
    {
        return View::make('index');
//        $this->invoiceService->process(['name' => 'John Doe'], 150);
//
//        $email = 'zzzz@doe.com';
//        $name = 'Z Z';
//        $amount = 25;
//
//        $userModel = new User();
//        $invoiceModel = new Invoice();
//
//        $invoiceId = (new SignUp($userModel, $invoiceModel))->register($email, $name, $amount);

//        return View::make('index', ['invoice' => $invoiceModel->find($invoiceId)]);
    }

    #[Get('/download')]
    public function download()
    {
        header('Content-Type: Application/pdf');
        header('Content-Disposition: attachment; filename="myfile.pdf"');

        readfile(STORAGE_PATH . '/' . 'Pandas_Cheat_Sheet.pdf');
    }

    #[Post('/upload')]
    public function upload()
    {
        $filePath = STORAGE_PATH . '/' . $_FILES["receipt"]["name"][0];

        move_uploaded_file($_FILES["receipt"]["tmp_name"][0], $filePath);

        header('Location: /');
        exit(); // чтобы убедиться, что код не выполняется дальше
    }

    #[Put('/')]
    public function update()
    {

    }
}
