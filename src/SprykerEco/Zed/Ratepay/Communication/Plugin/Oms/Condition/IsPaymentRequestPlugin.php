<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\Ratepay\Communication\Plugin\Oms\Condition;

use Generated\Shared\Transfer\OrderTransfer;

/**
 * @method \SprykerEco\Zed\Ratepay\Business\RatepayFacade getFacade()
 */
class IsPaymentRequestPlugin extends AbstractCheckPlugin
{

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @return bool
     */
    protected function callFacade(OrderTransfer $orderTransfer)
    {
        return $this->getFacade()->isPaymentRequestSuccess($orderTransfer);
    }

}
