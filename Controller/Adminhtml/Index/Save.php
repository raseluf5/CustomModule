<?php

namespace Rasel\CustomModule\Controller\Adminhtml\Index;

use Rasel\CustomModule\Model\ItemFactory;

class Save extends \Magento\Backend\App\Action
{
    private $ItemFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ItemFactory $ItemFactory
    ) {
        $this->ItemFactory = $ItemFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $writer = new \Zend_Log_Writer_Stream(BP . '/var/log/custom.log');
        $logger = new \Zend_Log();
        $logger->addWriter($writer);
        $logger->info('Hello World!');

        $formValues = $this->getRequest()->getPostValue();
        $editId = $this->getRequest()->getPostValue('id');

        if(!empty($editId)){
            $this->ItemFactory->create()
            ->setData($formValues)
            ->save();

        }else{
            $this->ItemFactory->create()
            ->setData($formValues)
            ->save();
        }
        
        return $this->resultRedirectFactory->create()->setPath('region/index/index');
    }
}
