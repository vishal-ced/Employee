<?php

namespace Ced\Employee\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Department implements ArrayInterface
{
    protected $departmentCollectionModel;
    /**
     * @return array
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Ced\Employee\Model\ResourceModel\Department\CollectionFactory $departmentCollectionModel
    ) {
        $this->departmentCollectionModel = $departmentCollectionModel;
    }

    public function toOptionArray()
    {
        $department = $this->departmentCollectionModel->create()->getData();
        $options = [];
        foreach ($department as $key => $value) {
            $options [] = [
                    'label' => $value['name'],
                    'value' => $value['entity_id']
            ];
        }
        return $options;
    }
}