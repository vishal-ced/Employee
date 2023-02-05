<?php

namespace Ced\Employee\Ui\DataProvider\Employee;

/**
 * Class DataProvider for Zalando Feeds
 */
class FormDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var $collection
     */
    public $collection;

    /**
     * @var $addFieldStrategies
     */
    public $addFieldStrategies;

    /**
     * @var $addFilterStrategies
     */
    public $addFilterStrategies;

    /**
     * DataProvider constructor.
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param array $addFieldStrategies
     * @param array $addFilterStrategies
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Ced\Employee\Model\ResourceModel\Employee\CollectionFactory $collectionFactory,
        $addFieldStrategies = [],
        $addFilterStrategies = [],
        $meta = [],
        $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create()->addAttributeToSelect(['dob','salary','vat_number']);
        $this->addFieldStrategies = $addFieldStrategies;
        $this->addFilterStrategies = $addFilterStrategies;
    }

    /**
     *
     * @return array
     */
    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $this->_loadedData=[];
        $items = $this->collection->getItems();
        foreach ($items as $employee) {
            $data = $employee->getData();
            $data['edit'] = true;
            $this->_loadedData[$employee->getId()] = $data;
        }
        // echo "<pre>"; print_r($this->_loadedData); die('formData');
        return $this->_loadedData;
    }
}
