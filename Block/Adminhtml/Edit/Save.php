<?php

namespace Ced\Employee\Block\Adminhtml\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class Save implements ButtonProviderInterface

{
    public function __construct(
        \Magento\Framework\App\RequestInterface $request
     ) {
        $this->request = $request;
     }

    public function getButtonData() {
        $id = $this->request->getParam('entity_id', null);
        if(empty($id)){
            return [
                'label' => __('Save Record'),
                'class' => 'save primary',
                'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
                ],
                'sort_order' => 90,
            ];
        }else{
            return [];
        }
      
    }
}