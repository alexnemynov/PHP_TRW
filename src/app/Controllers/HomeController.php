<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Attributes\Post;
use App\Attributes\Put;
use App\Attributes\Route;
use App\Enums\HttpMethod;
use App\View;

class HomeController
{
    #[Get('/')]
    #[Route('/home', HttpMethod::Get)]
    public function index(): View
    {
        throw new \RuntimeException('Test');
        return View::make('index');
    }

    #[Post('/')]
    public function store()
    {
    }

    #[Put('/')]
    public function update()
    {
    }
}
