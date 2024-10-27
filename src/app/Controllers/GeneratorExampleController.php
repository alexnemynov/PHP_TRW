<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Attributes\Get;
use App\Models\Ticket;

class GeneratorExampleController
{
    public function __construct(private Ticket $ticketModel)
    {
    }

    #[Get('/examples/generator')]
    public function index()
    {
        foreach ($this->ticketModel->all() as $ticket) {
            // тк вклчюено PDO::FETCH_ASSOC
            echo $ticket['id'] . ': ' . substr($ticket['content'], 0, 15) . '<br>';
        }
    }
}
