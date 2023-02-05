<?php

namespace Ced\Employee\Model;

use Magento\Framework\Model\AbstractModel;

class Department extends AbstractModel {
    protected function _construct() {
        /* full resource classname */
        $this->_init('Ced\Employee\Model\ResourceModel\Department');
    }
}