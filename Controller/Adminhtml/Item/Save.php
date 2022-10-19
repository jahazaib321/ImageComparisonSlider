<?php

namespace Mage4\ImageComparisonSlider\Controller\Adminhtml\Item;

use Mage4\ImageComparisonSlider\Model\SliderFactory;

class Save extends \Magento\Backend\App\Action
{
    private $sliderFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        SliderFactory $sliderFactory
    ) {
        $this->sliderFactory = $sliderFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        unset($data['id']);
        $this->sliderFactory->create()
            ->setData($data)
            ->save();
//        dd($data);
        return $this->resultRedirectFactory->create()->setPath('comparisonslider/index/index');
    }
}
?>
