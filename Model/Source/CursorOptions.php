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
            'all-scroll' => __('all-scroll'),
            'col-resize' => __('col-resize'),
            'default' => __('default'),
            'grab' => __('grab'),
            'pointer' => __('pointer'),
        ];
    }
}
