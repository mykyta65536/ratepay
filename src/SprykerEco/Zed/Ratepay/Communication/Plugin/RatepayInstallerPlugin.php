<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerEco\Zed\Ratepay\Communication\Plugin;

use Spryker\Zed\Installer\Dependency\Plugin\InstallerPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \SprykerEco\Zed\Ratepay\Communication\RatepayCommunicationFactory getFactory()
 * @method \SprykerEco\Zed\Ratepay\Business\RatepayFacade getFacade()
 */
class RatepayInstallerPlugin extends AbstractPlugin implements InstallerPluginInterface
{

    /**
     * @return void
     */
    public function install()
    {
        $this->getFacade()->install();
    }

}
