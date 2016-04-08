<?php
namespace Excellence\Hello\Model\Rewrite\Customer;
use Psr\Log\LoggerInterface;

class Customer extends \Magento\Customer\Model\Customer
{
    public function getDataModel()
    {
        print_r('Model \Magento\Customer\Model\Customer is overriden');
        // exit;
        return parent::getDataModel();
    }

}