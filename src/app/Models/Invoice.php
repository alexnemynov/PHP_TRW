<?php

namespace App\Models;

use App\Enums\InvoiceStatus;
use App\Model;

class Invoice extends Model
{
    public function all(InvoiceStatus $status): array
    {
        return $this->db->createQueryBuilder()->select('id', 'invoice_number', 'amount', 'status')
            ->from('invoices_new')
            ->where('status = ?')
            ->setParameter(0, $status->value)
            ->fetchAllAssociative();
    }
}

//    public function create(float $amount, int $userId): int
//    {
//        $stmt = $this->db->prepare(
//            "INSERT INTO invoices (amount, user_id)
//                   VALUES (?, ?)"
//        );
//
//        $stmt->execute([$amount, $userId]);
//
//        return (int) $this->db->lastInsertId();
//    }
//
//    public function find(int $invoiceId): array
//    {
//        $stmt = $this->db->prepare(
//            "SELECT invoices.id, amount, full_name
//            FROM invoices
//            LEFT JOIN users ON invoices.user_id = users.id
//            WHERE invoices.id = ?"
//        );
//
//        $stmt->execute([$invoiceId]);
//
//        $invoice = $stmt->fetch();
//
//        return $invoice ? $invoice : [];
//    }
//}
