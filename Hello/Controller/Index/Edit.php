<?php
namespace Excellence\Hello\Controller\Index;
 
 
class Edit extends \Magento\Framework\App\Action\Action
{
    protected $resultPageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->_testFactory = $testFactory;
        $this->resultPageFactory = $resultPageFactory;       
        return parent::__construct($context);
    }
     
    public function execute()
    {
        $test = $this->_testFactory->create();
        $post = $this->getRequest()->getPost('data');
        if(isset($post['submit'])) {
            $test->saveEdit($post);
        }
        
        return $this->resultPageFactory->create(); 
    } 
}