<?php
namespace Ced\Employee\Model\ResourceModel\Employee;

use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class Collection extends AbstractCollection {
    protected function _construct() {
        /* Full model classname, full resource classname */
        $this->_init(
            'Ced\Employee\Model\Employee',
            'Ced\Employee\Model\ResourceModel\Employee'
        );
    }
}