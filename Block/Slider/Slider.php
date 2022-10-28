<?php

namespace Mage4\ImageComparisonSlider\Block\Slider;

use Mage4\ImageComparisonSlider\Model\ResourceModel\Slider\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

class Slider extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    protected $collectionFactory;
    public function __construct(
        Context $context,
        CollectionFactory    $collectionFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function getSlider()
    {
        return $this->collectionFactory->create();
    }

    public function _toHtml()
    {
        $this->setTemplate('Mage4_ImageComparisonSlider::comparisonslider.phtml');
        return parent::_toHtml();
    }
}
