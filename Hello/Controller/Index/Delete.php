<?php
namespace Excellence\Hello\Controller\Index;
use Magento\Framework\Controller\ResultFactory; 
 
class Delete extends \Magento\Framework\App\Action\Action
{
    protected $_testFactory;
    protected $messageManager;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager
        )
    {
        $this->messageManager = $messageManager;
        $this->_testFactory = $testFactory;
        return parent::__construct($context);
    }
     
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $test = $this->_testFactory->create();
        $id = $this->getRequest()->getParam('id');
        if($test->deleteById($id)){
            $this->messageManager->addSuccess('Add your success message');
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;
        }
    }
}