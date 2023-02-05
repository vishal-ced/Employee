<?php
namespace Ced\Employee\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/*
UpgradeData conforms to UpgradeDataInterface, which requires the implementation of the upgrade
method taht accepts two parameters of type ModuleDataSetupInterface and ModuelContextInterface. 
We are further adding our own __construct method to which we are passing DepartmentFactory and 
EmployeeeFactory, as we will be using them within the upgrade method as shown next.
*/
class UpgradeData implements UpgradeDataInterface {
    protected $departmentFactory;
    protected $employeeFactory;

    public function __construct(
        \Ced\Employee\Model\DepartmentFactory $departmentFactory,
        \Ced\Employee\Model\EmployeeFactory $employeeFactory
    ) {
        $this->departmentFactory = $departmentFactory;
        $this->employeeFactory = $employeeFactory; 
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();
       
        $salesDepartment = $this->departmentFactory->create();
        $salesDepartment->setName('Sales');
        $salesDepartment->save();

        $employee = $this->employeeFactory->create();
        $employee->setDepartmentId($salesDepartment->getId());
        $employee->setEmail('vishal@gmail.com');
        $employee->setFirstName('Vishal');
        $employee->setLastName('Singh');
        $employee->setServiceYears(3);
        $employee->setDob('1999-01-01');
        $employee->setSalary('5000.00');
        $employee->setVatNumber('12345');
        $employee->setNote('Just some notes to Vishal');
        $employee->save();

        $setup->endSetup();
    }
}