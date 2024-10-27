<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\EmailStatus;
use App\Model;
use Symfony\Component\Mime\Address;

class Email extends Model
{
    public function queue(
        Address $to,
        Address $from,
        string $subject,
        string $html,
        ?string $text = null
    ): void {

        $meta['to']   = $to->toString();
        $meta['from'] = $from->toString();

        $data = [
            'subject' => $subject,
            'status' => EmailStatus::Queue->value,
            'html_body' => $html,
            'text_body' => $text,
            'meta' => $meta,
            'created_at' => new \DateTime(),
        ];
        $types = ['string', 'integer', 'string', 'string', 'json',  'datetime'];
        $this->db->insert('emails', $data, $types);
    }

    public function getEmailsByStatus(EmailStatus $status): array
    {
        return $this->db->createQueryBuilder()
            ->select('*')
            ->from('emails')
            ->where('status = :status')
            ->setParameter('status', $status->value)
            ->fetchAllAssociative()
            ;
    }

    public function markEmailSent(int $id): void
    {
        $this->db->createQueryBuilder()
            ->update('emails')
            ->set('status', ':status')
            ->set('sent_at', 'CURRENT_TIMESTAMP()')
            ->where('id = :id')
            ->setParameter('status', EmailStatus::Sent->value)
            ->setParameter('id', $id)
            ->executeStatement()
        ;
    }
}
