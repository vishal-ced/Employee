<?php

namespace Ced\Employee\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;

class Addattribute extends \Magento\Backend\App\Action {

    protected $resultPageFactory;
    
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\ResultFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute() {
        
        $resultPage = $this->resultPageFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend(__('Add New Record'));
        return $resultPage;
    }
}