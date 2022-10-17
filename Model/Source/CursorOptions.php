<?php

namespace Mage4\ImageComparisonSlider\Model\Source;

class CursorOptions implements \Magento\Framework\Option\ArrayInterface
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
            '0' => __('all-scroll'),
            '1' => __('col-resize'),
            '2' => __('default'),
            '3' => __('grab'),
            '4' => __('pointer'),
        ];
    }
}
