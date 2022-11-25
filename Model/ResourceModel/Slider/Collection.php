<?php
namespace Mage4\ImageComparisonSlider\Model\ResourceModel\Slider;

/**
 * Class Collection
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Mage4\ImageComparisonSlider\Model\Slider::class, \Mage4\ImageComparisonSlider\Model\ResourceModel\Slider::class);
    }
}
