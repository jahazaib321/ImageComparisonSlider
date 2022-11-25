<?php
namespace Mage4\ImageComparisonSlider\Ui\Component\Listing\Column;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Ui\Component\Listing\Columns\Column;

class Image extends Column
{
    const URL_PATH_EDIT = 'comparisonslider/item/editaction';
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var UrlInterface
     */
    protected $url;

    /**
     * Image constructor.
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param StoreManagerInterface $storeManager
     * @param UrlInterface $url
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        StoreManagerInterface $storeManager,
        UrlInterface $url,
        array $components = [],
        array $data = []
    ) {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->storeManager = $storeManager;
        $this->url = $url;
    }

    public function prepareDataSource(array $dataSource)
    {
        $mediaUrl = $this->storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);

        if (isset($dataSource['data']['items'])) {
            $fieldName = 'before_desktop_image';
            foreach ($dataSource['data']['items'] as & $item) {
                if (!empty($item['before_desktop_image'])) {
                    $name = $item['before_desktop_image'];
                    $item[$fieldName . '_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                    $item[$fieldName . '_alt'] = '';
                    $item[$fieldName . '_link'] = $this->url->getUrl(static::URL_PATH_EDIT, [
                        'id' => $item['id']
                    ]);
                    $item[$fieldName . '_orig_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                }
            }
        }


        if (isset($dataSource['data']['items'])) {
            $fieldName = 'after_desktop_image';
            foreach ($dataSource['data']['items'] as & $item) {
                if (!empty($item['after_desktop_image'])) {
                    $name = $item['after_desktop_image'];
                    $item[$fieldName . '_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                    $item[$fieldName . '_alt'] = '';
                    $item[$fieldName . '_link'] = $this->url->getUrl(static::URL_PATH_EDIT, [
                        'id' => $item['id']
                    ]);
                    $item[$fieldName . '_orig_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                }
            }
        }


        if (isset($dataSource['data']['items'])) {
            $fieldName = 'before_mobile_image';
            foreach ($dataSource['data']['items'] as & $item) {
                if (!empty($item['before_mobile_image'])) {
                    $name = $item['before_mobile_image'];
                    $item[$fieldName . '_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                    $item[$fieldName . '_alt'] = '';
                    $item[$fieldName . '_link'] = $this->url->getUrl(static::URL_PATH_EDIT, [
                        'id' => $item['id']
                    ]);
                    $item[$fieldName . '_orig_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                }
            }
        }

        if (isset($dataSource['data']['items'])) {
            $fieldName = 'after_mobile_image';
            foreach ($dataSource['data']['items'] as & $item) {
                if (!empty($item['after_mobile_image'])) {
                    $name = $item['after_mobile_image'];
                    $item[$fieldName . '_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                    $item[$fieldName . '_alt'] = '';
                    $item[$fieldName . '_link'] = $this->url->getUrl(static::URL_PATH_EDIT, [
                        'id' => $item['id']
                    ]);
                    $item[$fieldName . '_orig_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                }
            }
        }

        if (isset($dataSource['data']['items'])) {
            $fieldName = 'drag_icon';
            foreach ($dataSource['data']['items'] as & $item) {
                if (!empty($item['drag_icon'])) {
                    $name = $item['drag_icon'];
                    $item[$fieldName . '_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                    $item[$fieldName . '_alt'] = '';
                    $item[$fieldName . '_link'] = $this->url->getUrl(static::URL_PATH_EDIT, [
                        'id' => $item['id']
                    ]);
                    $item[$fieldName . '_orig_src'] = $mediaUrl . 'mage4/comparisonslider/image/' . $name;
                }
            }
        }

        return $dataSource;
    }
}
