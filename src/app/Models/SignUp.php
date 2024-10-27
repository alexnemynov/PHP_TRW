<?php

namespace App\Models;

use App\Model;

class SignUp extends Model
{
    public function __construct(protected User $userModel, protected Invoice $invoiceModel)
    {
        parent::__construct();
    }

    public function register(string $email, string $name, float $amount): int
    {
        try {
            $this->db->beginTransaction();

            $userId = $this->userModel->create($email, $name);
            $invoiceId = $this->invoiceModel->create($amount, $userId);

            $this->db->commit();
        } catch (\Throwable $e) {
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
        }
        $invoiceId = $invoiceId ?? 13;
        return $invoiceId;
    }
}
