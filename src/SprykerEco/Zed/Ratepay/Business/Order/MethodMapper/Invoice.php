<?php
/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\Ratepay\Business\Order\MethodMapper;

use Generated\Shared\Transfer\QuoteTransfer;
use SprykerEco\Shared\Ratepay\RatepayConstants;
use Orm\Zed\Ratepay\Persistence\SpyPaymentRatepay;

class Invoice extends AbstractMapper
{

    /**
     * @return string
     */
    public function getMethodName()
    {
        return RatepayConstants::INVOICE;
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\RatepayPaymentInvoiceTransfer
     */
    protected function getPaymentTransfer(QuoteTransfer $quoteTransfer)
    {
        return $quoteTransfer->getPayment()->getRatepayInvoice();
    }

    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Orm\Zed\Ratepay\Persistence\SpyPaymentRatepay $payment
     *
     * @return void
     */
    public function mapMethodDataToPayment(QuoteTransfer $quoteTransfer, SpyPaymentRatepay $payment)
    {
        $paymentTransfer = $this->getPaymentTransfer($quoteTransfer);
        $payment
            ->setPaymentType($quoteTransfer->requirePayment()->getPayment()->requirePaymentMethod()->getPaymentMethod())
            ->setTransactionId($paymentTransfer->getTransactionId())
            ->setTransactionShortId($paymentTransfer->getTransactionShortId())
            ->setResultCode($paymentTransfer->getResultCode())
            ->setDeviceFingerprint($paymentTransfer->getDeviceFingerprint())

            ->setDescriptor($paymentTransfer->getDescriptor())

            ->setGender($paymentTransfer->requireGender()->getGender())
            ->setPhone($paymentTransfer->requirePhone()->getPhone())
            ->setDateOfBirth($paymentTransfer->requireDateOfBirth()->getDateOfBirth())
            ->setCustomerAllowCreditInquiry(($paymentTransfer->getCustomerAllowCreditInquiry() === false) ? false : true)

            ->setIpAddress($paymentTransfer->requireIpAddress()->getIpAddress())
            ->setCurrencyIso3($paymentTransfer->requireCurrencyIso3()->getCurrencyIso3());
    }

}