<?php
namespace Mage4\ImageComparisonSlider\Model\ResourceModel;

/**
 * Class Slider
 */
class Slider extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init('mage4_comparisonslider_managesliders', 'id');
    }
}

