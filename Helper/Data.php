<?php
namespace Ced\Employee\Helper;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $_employeeResourceModel;
    protected $_employeeFactory;
    protected $eavSetupFactory;
    protected $setup;
    
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Ced\Employee\Model\EmployeeFactory $employeeFactory,
        \Ced\Employee\Model\ResourceModel\Employee $employeeResourceModel,
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\Config $eavConfig,
        \Magento\Framework\Setup\ModuleDataSetupInterface $setup
    ) {
        parent::__construct($context);
		$this->_employeeFactory = $employeeFactory;
        $this->_employeeResourceModel = $employeeResourceModel;
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig = $eavConfig;
        $this->setup = $setup;
    }

    public function dataSave($data = []) {
        $return = ['success' => false, 'message' => ''];
        if (!empty($data)) {
            try {
                // echo "<pre>";print_r($data); die;
                $id = isset($data['entity_id']) ? $data['entity_id'] : '';
                if (!empty($id)) {
                    $model = $this->_employeeFactory->create();
                    $this->_employeeResourceModel->load($model, $id);
                } else {
                    $model = $this->_employeeFactory->create();
                }
                print_r($model->getData());
                $model->addData(
                    [
                        "first_name" => $data['first_name'],
                        "last_name" => $data['last_name'],
                        "email" => $data['email'],
                        "department_id" => $data['department_id'],
                        "dob" => $data['dob'],
                        "vat_number" => $data['vat_number'],
                        "salary" => $data['salary']
                    ]
                );
                $saveData = $this->_employeeResourceModel->save($model);
                $return = ['success' => true, 'message' => 'Data Saved Successfully.'];

            } catch (\Exception $e) {
                echo $e->getMessage();die('IN CATCH---');
                $return = ['success' => false, 'message' => $e->getMessage()];
            }
        } else {
            $return = ['success' => false, 'message' => 'No Data Found To Save.'];
        }
        return $return;
    }


    public function saveAttributeData($attributeCode, $attributeType)
	{
        $return = ['success' => false, 'message' => ''];
        if(!empty($attributeCode && $attributeType)){
            try {
                $eavSetup = $this->eavSetupFactory->create(['setup' => $this->setup]);
                $eavSetup->addAttribute(
                \Ced\Employee\Model\Employee::ENTITY,
                $attributeCode,
                    [
                        'type' => 'text',
                        'backend' => '',
                        'frontend' => '',
                        'label' => $attributeCode,
                        'input' => $attributeType,
                        'class' => '',
                        'source' => '',
                        'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                        'visible' => true,
                        'required' => false,
                        'user_defined' => false,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => false,
                        'used_in_product_listing' => true,
                        'unique' => false,
                        'apply_to' => ''
                    ]
                );
                $return = ['success' => true, 'message' => 'Attribute Saved Successfully.'];
            } catch (\Exception $th) {
                $return = ['success' => false, 'message' => $th->getMessage()];
            }
        }else{
            $return = ['success' => false, 'message' => 'No Data Found To Save.'];
        }
		return $return;
	}
}