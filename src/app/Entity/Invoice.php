<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enums\InvoiceStatus;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\PrePersist;
use Doctrine\ORM\Mapping\Table;
use Doctrine\Persistence\Event\LifecycleEventArgs;

#[Entity]
#[Table(name: 'invoices_new')]
#[HasLifecycleCallbacks]
class Invoice
{
    #[Id]
    #[Column, GeneratedValue]
    private int $id;

    #[Column(name: 'invoice_number')]
    private int $invoiceNumber;

    #[Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private float $amount;

    #[Column]
    private InvoiceStatus $status;

    #[Column(name: 'created_at')]
    private \DateTime $createdAt;

    #[Column(name: 'due_date')]
    private \DateTime $dueDate;

    #[OneToMany(targetEntity: InvoiceItem::class, mappedBy: 'invoice', cascade: ['persist', 'remove'])]
    private Collection $items;

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    #[PrePersist]
    public function onPrePersist(LifecycleEventArgs $args): void
    {
        $this->createdAt = new \DateTime();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): int
    {
        return $this->invoiceNumber;
    }

    public function setInvoiceNumber(int $invoiceNumber): Invoice
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): Invoice
    {
        $this->amount = $amount;

        return $this;
    }

    public function getStatus(): InvoiceStatus
    {
        return $this->status;
    }

    public function setStatus(InvoiceStatus $status): Invoice
    {
        $this->status = $status;

        return $this;
    }

    public function setCreatedAt(\DateTime $createdAt): Invoice
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function addItem(InvoiceItem $item): Invoice
    {
        $item->setInvoice($this); // ассоциировать обьект с инвойсом

        $this->items->add($item);

        return $this;
    }

    public function getItems(): Collection
    {
        return $this->items;
    }
}
