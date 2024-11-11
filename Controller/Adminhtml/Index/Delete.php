<?php

namespace Rasel\CustomModule\Controller\Adminhtml\Index;

use Rasel\CustomModule\Model\ItemFactory;

class Delete extends \Magento\Backend\App\Action
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

        $deleteId = (int) $this->getRequest()->getParam('id');

        $this->ItemFactory->create()->load($deleteId)->delete();
        
        return $this->resultRedirectFactory->create()->setPath('region/index/index');
    }
}
