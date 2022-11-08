<?php

namespace Mage4\ImageComparisonSlider\Block\Slider;

use Mage4\ImageComparisonSlider\Model\SliderFactory;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Widget\Block\BlockInterface;

class Slider extends \Magento\Framework\View\Element\Template implements BlockInterface
{
    protected $storeManager;
    protected $collectionFactory;
    public function __construct(
        Context $context,
        SliderFactory    $collectionFactory,
        StoreManagerInterface         $storeManager
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    public function getSlider()
    {
        return $this->collectionFactory->create()->load($this->getId());
    }

    public function getStoreMediaPathUrl($name)
    {
        // get media Base Url
        $media = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $media = $media . 'mage4/comparisonslider/image/' . $name;
        return $media;
    }

    public function _toHtml()
    {
        $this->setTemplate('Mage4_ImageComparisonSlider::comparisonslider.phtml');
        return parent::_toHtml();
    }
}
