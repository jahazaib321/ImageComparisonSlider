<?php

namespace Mage4\ImageComparisonSlider\Block\Slider;

use Magento\Framework\View\Element\Template\Context;
use Magento\Widget\Block\BlockInterface;

class Slider extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    public function __construct(
        Context $context
    ) {
        parent::__construct($context);
    }

    public function _toHtml()
    {
        $this->setTemplate('Mage4_ImageComparisonSlider::comparisonslider.phtml');
        return parent::_toHtml();
    }
}
