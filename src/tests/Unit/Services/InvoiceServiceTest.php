<?php

declare(strict_types=1);

namespace tests\Unit\Services;

use App\Services\EmailService;
use App\Services\InvoiceService;
use App\Services\StripePayment;
use App\Services\SalesTaxService;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class InvoiceServiceTest extends TestCase
{
    #[Test]
    public function testProcessInvoice(): void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock = $this->createMock(StripePayment::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        // потому что по умолчанию все методы Mock классов возвращают Null с учетом type hint
        // Stubbing method
        $gatewayServiceMock->method('charge')->willReturn(true);

        // given invoice service
        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        $customer = ['name' => 'John Doe'];
        $amount = 100;

        // when process is called
        $result = $invoiceService->process($customer, $amount);

        // then assert invoice is processed successfully
        $this->assertTrue($result);
    }

    public function testSendEmail(): void
    {
        $salesTaxServiceMock = $this->createMock(SalesTaxService::class);
        $gatewayServiceMock = $this->createMock(StripePayment::class);
        $emailServiceMock = $this->createMock(EmailService::class);

        $gatewayServiceMock->method('charge')->willReturn(true);


        // Mocking method
        $emailServiceMock
            ->expects($this->once())
            ->method('send')
            ->with(['name' => 'John Doe'], 'receipt');

        $invoiceService = new InvoiceService(
            $salesTaxServiceMock,
            $gatewayServiceMock,
            $emailServiceMock
        );

        $customer = ['name' => 'John Doe'];
        $amount = 100;

        $result = $invoiceService->process($customer, $amount);

        $this->assertTrue($result);
    }
}
