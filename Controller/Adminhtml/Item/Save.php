<?php

namespace Mage4\ImageComparisonSlider\Controller\Adminhtml\Item;

use Mage4\ImageComparisonSlider\Model\SliderFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class Save extends Action
{
    private $sliderFactory;

    public function __construct(
        Context $context,
        SliderFactory                       $sliderFactory,
        DataObjectHelper                    $dataObjectHelper
    )
    {
        $this->sliderFactory = $sliderFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPost('general');
//        dd($data);
        $model = $this->sliderFactory->create();
        $id = $this->getRequest()->getParam('id');
        $model->load($id);
//        $data = $this->sliderFactory->create()
//            ->setData($this->getRequest()->getPostValue('general'))
//            ->save();
//        dd($data);
//        return $this->resultRedirectFactory->create()->setPath('comparisonslider/index/index');
         $model->setData($data)->save();
         return $this->resultRedirectFactory->create()->setPath('comparisonslider/index/index');
    }
}
?>

