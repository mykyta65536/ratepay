<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\Ratepay\Communication\Plugin\Oms\Command;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Dependency\Plugin\Command\CommandByOrderInterface;

/**
 * @method \SprykerEco\Zed\Ratepay\Business\RatepayFacade getFacade()
 * @method \SprykerEco\Zed\Ratepay\Communication\RatepayCommunicationFactory getFactory()
 */
class CancelPaymentPlugin extends BaseCommandPlugin implements CommandByOrderInterface
{
    /**
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderItem[] $orderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @return array
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $orderTransfer = $this->getOrderTransfer($orderEntity);
        $orderTransferItems = $this->getOrderItemsTransfer($orderItems);
        $partialOrderTransfer = $this->getPartialOrderTransferByOrderItems($orderItems, $orderEntity);
        $this->getFacade()->cancelPayment($orderTransfer, $partialOrderTransfer, $orderTransferItems);

        return [];
    }
}
