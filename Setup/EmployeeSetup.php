<?php
namespace Ced\Employee\Setup;
use Magento\Eav\Setup\EavSetup;

class EmployeeSetup extends EavSetup {

    public function getDefaultEntities() {

        $employeeEntity = \Ced\Employee\Model\Employee::ENTITY;

        $entities = [
            $employeeEntity => [
                'entity_model' => 'Ced\Employee\Model\ResourceModel\Employee', //the full resource model class name 
                'table' => $employeeEntity . '_entity',
                'attributes' => [
                    'department_id' => [
                        'type' => 'static',
                    ],
                    'email' => [
                        'type' => 'static',
                    ],
                    'first_name' => [
                        'type' => 'static',
                    ],
                    'last_name' => [
                        'type' => 'static',
                    ],
                ],
            ],
        ];

        return $entities;
    }
}