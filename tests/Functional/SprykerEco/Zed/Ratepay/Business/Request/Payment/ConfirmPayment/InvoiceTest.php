<?php
/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Functional\SprykerEco\Zed\Ratepay\Business\Request\Payment\ConfirmPayment;

use Functional\SprykerEco\Zed\Ratepay\Business\Api\Adapter\Http\ConfirmPaymentAdapterMock;
use Functional\SprykerEco\Zed\Ratepay\Business\Request\Payment\InvoiceAbstractTest;

/**
 * @group Functional
 * @group Spryker
 * @group Zed
 * @group Ratepay
 * @group Business
 * @group Request
 * @group Payment
 * @group ConfirmPayment
 * @group InvoiceTest
 */
class InvoiceTest extends InvoiceAbstractTest
{

    /**
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->setUpSalesOrderTestData();
        $this->setUpPaymentTestData();

        $this->orderTransfer->fromArray($this->orderEntity->toArray(), true);
    }

    /**
     * @return \Functional\SprykerEco\Zed\Ratepay\Business\Api\Adapter\Http\ConfirmPaymentAdapterMock
     */
    protected function getPaymentSuccessResponseAdapterMock()
    {
        return new ConfirmPaymentAdapterMock();
    }

    /**
     * @return \Functional\SprykerEco\Zed\Ratepay\Business\Api\Adapter\Http\ConfirmPaymentAdapterMock
     */
    protected function getPaymentFailureResponseAdapterMock()
    {
        return (new ConfirmPaymentAdapterMock())->expectFailure();
    }

    /**
     * @param \SprykerEco\Zed\Ratepay\Business\RatepayFacade $facade
     *
     * @return \Generated\Shared\Transfer\RatepayResponseTransfer
     */
    protected function runFacadeMethod($facade)
    {
        return $facade->confirmPayment($this->orderTransfer);
    }

}
