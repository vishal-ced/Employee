<?php
namespace Ced\Employee\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Event\ManagerInterface as EventManager;

class Delete extends Action
{
    public $EmployeeFactory;
    protected $_employeeResourceModel;
    private $eventManager;
    
    public function __construct(
        EventManager $eventManager,
        Context $context,
        \Ced\Employee\Model\EmployeeFactory $EmployeeFactory,
        \Ced\Employee\Model\ResourceModel\Employee $employeeResourceModel
    ) {
        $this->EmployeeFactory = $EmployeeFactory;
        $this->_employeeResourceModel = $employeeResourceModel;
        parent::__construct($context);
        $this->eventManager = $eventManager;
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('entity_id');
        try {
            $Model = $this->EmployeeFactory->create();
            $this->_employeeResourceModel->load($Model, $id);

            $this->_employeeResourceModel->delete($Model);

            $this->messageManager->addSuccessMessage(__('You deleted the Record.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('employee/index/grid');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ced_Employee::delete');
    }
}