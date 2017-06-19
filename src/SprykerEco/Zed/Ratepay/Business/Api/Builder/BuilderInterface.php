<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */
namespace SprykerEco\Zed\Ratepay\Business\Api\Builder;

interface BuilderInterface
{

    /**
     * @return array
     */
    public function buildData();

    /**
     * @return string
     */
    public function getRootTag();

}