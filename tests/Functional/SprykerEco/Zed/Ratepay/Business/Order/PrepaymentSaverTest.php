<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Functional\SprykerEco\Zed\Ratepay\Business\Order;

use Generated\Shared\Transfer\RatepayPaymentPrepaymentTransfer;
use SprykerEco\Shared\Ratepay\RatepayConstants;

/**
 * @group Functional
 * @group Spryker
 * @group Zed
 * @group Ratepay
 * @group Business
 * @group Order
 * @group PrepaymentSaverTest
 */
class PrepaymentSaverTest extends AbstractSaverTest
{

    /**
     * @const Payment method code.
     */
    const PAYMENT_METHOD = RatepayConstants::PREPAYMENT;

    /**
     * @return \Generated\Shared\Transfer\RatepayPaymentPrepaymentTransfer
     */
    protected function getRatepayPaymentMethodTransfer()
    {
        return new RatepayPaymentPrepaymentTransfer();
    }

    /**
     * @return \Generated\Shared\Transfer\RatepayPaymentPrepaymentTransfer
     */
    protected function getPaymentTransferFromQuote()
    {
        return $this->quoteTransfer->getPayment()->getRatepayPrepayment();
    }

    /**
     * @param \Generated\Shared\Transfer\PaymentTransfer $payment
     * @param \Spryker\Shared\Kernel\Transfer\TransferInterface $paymentTransfer
     *
     * @return void
     */
    protected function setRatepayPaymentDataToPaymentTransfer($payment, $paymentTransfer)
    {
        $payment->setRatepayPrepayment($paymentTransfer);
    }

}
