<?php

namespace Mage4\ImageComparisonSlider\Model\Source;

class ComparisonOptions implements \Magento\Framework\Option\ArrayInterface
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
            '0' => __('Horizontal'),
            '1' => __('Vertical'),
        ];
    }
}
