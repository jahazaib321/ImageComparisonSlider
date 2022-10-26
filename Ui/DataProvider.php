<?php

namespace Mage4\ImageComparisonSlider\Ui;

use Magento\Ui\DataProvider\AbstractDataProvider;

class DataProvider extends AbstractDataProvider
{
    protected $collection;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        $collectionFactory,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }
    public function getData()
    {
        $result = [];
        foreach ($this->collection->getItems() as $item) {
            $data = $item->getData();
            if (isset($data['before_desktop_image'])) {
                $before_desktop_image = $data['before_desktop_image'];
                unset($data['before_desktop_image']);
                $data['before_desktop_image'][0] = [
                    'name' => $before_desktop_image,
                    'url' => 'http://jahazaib.local/pub/media/' . 'mage4/comparisonslider/image/' . $before_desktop_image
                ];
            }

            if (isset($data['after_desktop_image'])) {
                $after_desktop_image = $data['after_desktop_image'];
                unset($data['after_desktop_image']);
                $data['after_desktop_image'][0] = [
                    'name' => $after_desktop_image,
                    'url' => 'http://jahazaib.local/pub/media/' . 'mage4/comparisonslider/image/' . $after_desktop_image
                ];
            }

            if (isset($data['before_mobile_image'])) {
                $before_mobile_image = $data['before_mobile_image'];
                unset($data['before_mobile_image']);
                $data['before_mobile_image'][0] = [
                    'name' => $before_mobile_image,
                    'url' => 'http://jahazaib.local/pub/media/' . 'mage4/comparisonslider/image/' . $before_mobile_image
                ];
            }

            if (isset($data['after_mobile_image'])) {
                $after_mobile_image = $data['after_mobile_image'];
                unset($data['after_mobile_image']);
                $data['after_mobile_image'][0] = [
                    'name' => $after_mobile_image,
                    'url' => 'http://jahazaib.local/pub/media/' . 'mage4/comparisonslider/image/' . $after_mobile_image
                ];
            }

            if (isset($data['drag_icon'])) {
                $dragicon = $data['drag_icon'];
                unset($data['drag_icon']);
                $data['drag_icon'][0] = [
                    'name' => $dragicon,
                    'url' => 'http://jahazaib.local/pub/media/' . 'mage4/comparisonslider/image/' . $dragicon
                ];
            }
            $result[$item->getId()] = $data;
        }
//        dd($data);
        return $result;
    }
}
