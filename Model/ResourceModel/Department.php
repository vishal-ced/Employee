<?php
namespace Ced\Employee\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Department extends AbstractDb {
    protected function _construct() {
        /* tablename, primarykey*/
        $this->_init('ced_department', 'entity_id');
    }
}