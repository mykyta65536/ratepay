<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Unit\SprykerEco\Yves\Ratepay\Form\DataProvider;

use Generated\Shared\Transfer\PaymentTransfer;
use Generated\Shared\Transfer\RatepayPaymentInstallmentTransfer;
use SprykerEco\Client\Ratepay\RatepayClientInterface;
use Spryker\Client\Session\SessionClientInterface;
use SprykerEco\Yves\Ratepay\Form\DataProvider\InstallmentDataProvider;

/**
 * @group Unit
 * @group Spryker
 * @group Yves
 * @group Ratepay
 * @group Form
 * @group DataProvider
 * @group InstallmentDataProviderTest
 */
class InstallmentDataProviderTest extends AbstractDataProviderTest
{

    /**
     * @return void
     */
    public function testGetDataShouldAddTransferIfNotSet()
    {
        $installmentDataProvider = $this->getInstallmentDataProvider();
        $quoteTransfer = $this->getQuoteTransfer();

        $installmentDataProvider->getData($quoteTransfer);

        $paymentTransfer = $quoteTransfer->getPayment();
        $this->assertInstanceOf(PaymentTransfer::class, $paymentTransfer);
        $this->assertInstanceOf(RatepayPaymentInstallmentTransfer::class, $paymentTransfer->getRatepayInstallment());
    }

    /**
     * @return void
     */
    public function testGetDataShouldAddPhoneNumber()
    {
        $installmentDataProvider = $this->getInstallmentDataProvider();

        $quoteTransfer = $this->getQuoteTransfer();

        $installmentDataProvider->getData($quoteTransfer);

        $paymentTransfer = $quoteTransfer->getPayment();
        $this->assertInstanceOf(PaymentTransfer::class, $paymentTransfer);

        $paymentMethodTransfer = $paymentTransfer->getRatepayInstallment();
        $this->assertInstanceOf(RatepayPaymentInstallmentTransfer::class, $paymentMethodTransfer);
        $this->assertSame(static::PHONE_NUMBER, $paymentMethodTransfer->getPhone());
    }

    /**
     * @return \SprykerEco\Yves\Ratepay\Form\DataProvider\InstallmentDataProvider
     */
    protected function getInstallmentDataProvider()
    {
        $installmentDataProvider = new InstallmentDataProvider($this->getRatepayClientMock(), $this->getSessionClientMock());

        return $installmentDataProvider;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\SprykerEco\Client\Ratepay\RatepayClientInterface
     */
    protected function getRatepayClientMock()
    {
        return $this->getMockBuilder(RatepayClientInterface::class)->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|\Spryker\Client\Session\SessionClientInterface
     */
    protected function getSessionClientMock()
    {
        return $this->getMockBuilder(SessionClientInterface::class)->getMock();
    }

}
