<?php
namespace Ced\Employee\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {
    private $employeeSetupFactory;

    public function __construct(
        \Ced\Employee\Setup\EmployeeSetupFactory $employeeSetupFactory
    ) {
        $this->employeeSetupFactory = $employeeSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $employeeEntity = \Ced\Employee\Model\Employee::ENTITY;

        $employeeSetup = $this->employeeSetupFactory->create(['setup' => $setup]);

        $employeeSetup->installEntities();

        /*

        Add attributes for the employee entity

        */
        
        $employeeSetup->addAttribute(
            $employeeEntity, 'service_years', ['type' => 'int']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'dob', ['type' => 'datetime']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'salary', ['type' => 'decimal']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'vat_number', ['type' => 'varchar']
        );

        $employeeSetup->addAttribute(
            $employeeEntity, 'not', ['type' => 'text']
        );

        $setup->endSetup();
    }
}