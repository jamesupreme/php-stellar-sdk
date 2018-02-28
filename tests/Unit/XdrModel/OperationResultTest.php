<?php


namespace ZuluCrypto\StellarSdk\Test\Unit\XdrModel;


use PHPUnit\Framework\TestCase;
use ZuluCrypto\StellarSdk\Xdr\XdrBuffer;
use ZuluCrypto\StellarSdk\XdrModel\OperationResult;
use ZuluCrypto\StellarSdk\XdrModel\PaymentResult;

class OperationResultTest extends TestCase
{
    public function testPaymentOperationResultSuccess()
    {
        $xdr = new XdrBuffer(base64_decode('AAAAAAAAAAEAAAAAAAAAAQAAAAAAAAAA='));

        $result = OperationResult::fromXdr($xdr);

        $this->assertTrue($result instanceof PaymentResult);
        $this->assertEquals(null, $result->getErrorCode());
        $this->assertTrue($result->succeeded());
        $this->assertFalse($result->failed());
    }
}