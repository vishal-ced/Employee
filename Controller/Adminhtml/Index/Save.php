<?php

namespace Ced\Employee\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action

{
    protected $adapterFactory;
    protected $_helperData;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Ced\Employee\Helper\Data $helperData
    ) {
        parent::__construct($context);
        $this->_helperData = $helperData;
    }

    public function execute() {
        $data = $this->getRequest()->getParams();
        $response = $this->_helperData->dataSave($data);
        if ($response['success']) {
            $this->messageManager->addSuccessMessage(__($response['message']));
        }else{
            $this->messageManager->addErrorMessage(__($response['message']));
        }
        $this->_redirect('employee/index/grid');
    }
}