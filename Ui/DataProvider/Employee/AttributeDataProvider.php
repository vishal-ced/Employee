<?php

namespace Ced\Employee\Ui\DataProvider\Employee;

use Magento\Eav\Model\ResourceModel\Entity\Attribute\CollectionFactory as AttributeCollectionFactory;
use Magento\Eav\Model\Entity as Entity;
/**
 * Class DataProvider for Zalando Feeds
 */
class AttributeDataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
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
    
    private $attributeCollectionFactory;  
    protected $entity;  


    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        AttributeCollectionFactory $attributeCollectionFactory,
        Entity $entity,
        $addFieldStrategies = [],
        $addFilterStrategies = [],
        $meta = [],
        $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->entity = $entity;
        $this->collection = $attributeCollectionFactory->create()
        ->addFieldToFilter('entity_type_id', $this->entity->setType(\Ced\Employee\Model\Employee::ENTITY)->getTypeId());
        $this->addFieldStrategies = $addFieldStrategies;
        $this->addFilterStrategies = $addFilterStrategies;
    }

    /**
     *
     * @return array
     */
    public function getData()
    {
        // die('data');

        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $items = $this->getCollection()->getData();
        return [
            'totalRecords' => $this->getCollection()->getSize(),
            'items' => array_values($items),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function addFilter(\Magento\Framework\Api\Filter $filter)
    {
        if (isset($this->addFilterStrategies[$filter->getField()])) {
            $this->addFilterStrategies[$filter->getField()]
                ->addFilter(
                    $this->getCollection(),
                    $filter->getField(),
                    [$filter->getConditionType() => $filter->getValue()]
                );
        } else {
            parent::addFilter($filter);
        }
    }

    /**
     * Add field to select
     *
     * @param string|array $field
     * @param string|null $alias
     * @return void
     */
    public function addField($field, $alias = null)
    {
        if (isset($this->addFieldStrategies[$field])) {
            $this->addFieldStrategies[$field]->addField($this->getCollection(), $field, $alias);
        } else {
            parent::addField($field, $alias);
        }
    }
}