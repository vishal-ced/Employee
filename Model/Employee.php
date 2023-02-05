<?php
namespace Ced\Employee\Model;

use Magento\Framework\Model\AbstractModel;

class Employee extends AbstractModel {
    const ENTITY = 'ced_employee';

    protected function _construct() {
        /* full resource classname */
        $this->_init('Ced\Employee\Model\ResourceModel\Employee');
    }
}