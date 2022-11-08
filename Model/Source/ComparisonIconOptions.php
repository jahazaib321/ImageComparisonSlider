<?php

namespace Mage4\ImageComparisonSlider\Model\Source;

class ComparisonIconOptions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $options = $this->getOptions();
        $formatedOptions = [];
        foreach ($options as $key => $option) {
            array_push($formatedOptions, ['value' => $key, 'label' => $option]);
        }
        return $formatedOptions;
    }

    public function getOptions()
    {
        return [
            '↔' => __('↔'),
            '↕' => __('↕	'),
            '⇄' => __('⇄'),
            '⇅' => __('⇅'),
            '⇈' => __('⇈'),
            '⇉' => __('⇉'),
            '⇊' => __('⇊'),
            '⇋' => __('⇋'),
        ];
    }
}
