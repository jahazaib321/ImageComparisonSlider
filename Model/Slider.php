<?php
namespace Mage4\ImageComparisonSlider\Model;

/**
 * Class Slider
 */
class Slider extends \Magento\Framework\Model\AbstractModel implements
    \Mage4\ImageComparisonSlider\Api\Data\SliderInterface,
    \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'image_comparison_slider';

    /**
     * Init
     */
    protected function _construct() // phpcs:ignore PSR2.Methods.MethodDeclaration
    {
        $this->_init(\Mage4\ImageComparisonSlider\Model\ResourceModel\Slider::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
