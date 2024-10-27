<?php

declare(strict_types=1);

namespace App\Models;

use App\Model;

class Ticket extends Model
{
    public function all(): \Generator
    {
        $stmt = $this->db->createQueryBuilder()
            ->select('*')
            ->from('tickets')
            ->fetchAllAssociative();
        return $this->fetchLazy($stmt);
    }
}