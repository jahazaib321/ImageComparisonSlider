<?php

namespace Mage4\ImageComparisonSlider\Controller\Adminhtml\Manage;

use Exception;
use Mage4\ImageComparisonSlider\Model\SliderFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;

class DeleteAction extends Action
{
    public $sliderFactory;

    public function __construct(
        Context      $context,
        SliderFactory $sliderFactory
    ) {
        $this->sliderFactory = $sliderFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        try {
            $blogModel = $this->sliderFactory->create();
            $blogModel->load($id);
            $blogModel->delete();
            $this->messageManager->addSuccessMessage(__('You deleted the record.'));
        } catch (Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        return $resultRedirect->setPath('comparisonslider/index/index');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mage4_ImageComparisonSlider::delete');
    }
}
