<?php

namespace Ced\Employee\Controller\Adminhtml\Index;
use Magento\Framework\Controller\ResultFactory;

class Grid extends \Magento\Backend\App\Action {

    protected $resultPageFactory;
    protected $CollectionFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\ResultFactory $resultPageFactory,
        \Ced\Employee\Model\ResourceModel\Employee\CollectionFactory $CollectionFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->CollectionFactory = $CollectionFactory;
    }

    public function execute() {
        
        $resultPage = $this->resultPageFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}