<?php
namespace Excellence\Hello\Block;
  
class Add extends \Magento\Framework\View\Element\Template
{   
	protected $_testFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Excellence\Hello\Model\TestFactory $testFactory
    )
    {
    	$this->_testFactory = $testFactory;
        parent::__construct($context);
    }
    protected function _prepareLayout()
    {
 		// $this->setText('This test is passed from block to template');
 		$test = $this->_testFactory->create();


 		/*Inserting Data*/
 		// $test->setTitle('First');
 		// $test->save();

 		/*Fetching Collection*/
 		$collectionData = $test->getCollection()->getData();
		// foreach($collection as $row){
		//    print_r($row->getData());
		// }

		/*Using Model Function in which resource function is called*/
		// $test->loadByTitle('First');
 		$this->setTestModel($collectionData);
    }
    public function getListUrl()
    {
        return $this->_urlBuilder->getUrl("excellence/index/index/");
    }
}