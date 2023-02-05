<?php

namespace Ced\Employee\Model\ResourceModel\Department;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection {
    protected function _construct() {
        $this->_init('Ced\Employee\Model\Department', 'Ced\Employee\Model\ResourceModel\Department');
    }
}