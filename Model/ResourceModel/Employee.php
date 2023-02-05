<?php
namespace Ced\Employee\Model\ResourceModel;

use Magento\Eav\Model\Entity\AbstractEntity;

/*
Our resource class extends from \Magento\Eav\Model\Entity\AbstractEntity, 
and set $this->_read, $this->_write class properties  in _construct() method 
*/
class Employee extends AbstractEntity {
    protected function _construct() {
        $this->_read = 'ced_employee_read';
        $this->_write = 'ced_employee_write';
    }

    public function getEntityType() {
        if(empty($this->_type)) {
            $this->setType(\Ced\Employee\Model\Employee::ENTITY);
        }

        return parent::getEntityType();
    }
}