<?php

namespace Ced\Employee\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Attribute implements ArrayInterface
{
    /**
     * @return array
     */

    public function toOptionArray()
    {
        $options = [
            0 => [
                'label' => 'Text',
                'value' => 'text'
            ],
            1 => [
                'label' => 'Integer',
                'value' => 'int'
            ],
            2 => [
                'label' => 'Data & Time',
                'value' => 'datetime'
            ],
            3 => [
                'label' => 'Varchar',
                'value' => 'varchar'
            ],
            4 => [
                'label' => 'Decimal',
                'value' => 'decimal'
            ],
        ];

        return $options;
    }
}