<?php

namespace Mage4\ImageComparisonSlider\Block\Adminhtml\Slider\Widget;

use Mage4\ImageComparisonSlider\Model\ResourceModel\Slider\CollectionFactory;
use Mage4\ImageComparisonSlider\Model\SliderFactory;
use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Grid\Extended;
use Magento\Backend\Helper\Data;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * CMS block chooser for Wysiwyg CMS widget
 */
class Chooser extends Extended
{
    /**
     * @var SliderFactory
     */
    protected $sliderFactory;

    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param Context $context
     * @param Data $backendHelper
     * @param SliderFactory $sliderFactory
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Context           $context,
        Data              $backendHelper,
        SliderFactory     $sliderFactory,
        CollectionFactory $collectionFactory,
        array             $data = []
    ) {
        $this->sliderFactory = $sliderFactory;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * Block construction, prepare grid params
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setDefaultSort('id');
        $this->setDefaultDir('ASC');
        $this->setUseAjax(true);
    }

    /**
     * Prepare chooser element HTML
     *
     * @param AbstractElement $element Form Element
     * @return AbstractElement
     */
    public function prepareElementHtml(AbstractElement $element)
    {
        $uniqId = $this->mathRandom->getUniqueHash($element->getId());
        $sourceUrl = $this->getUrl('comparisonslider/index/chooser', ['id' => $uniqId]);

        $chooser = $this->getLayout()->createBlock(
            \Magento\Widget\Block\Adminhtml\Widget\Chooser::class
        )->setElement(
            $element
        )->setConfig(
            $this->getConfig()
        )->setFieldsetId(
            $this->getFieldsetId()
        )->setSourceUrl(
            $sourceUrl
        )->setUniqId(
            $uniqId
        );

        if ($element->getValue()) {
            $block = $this->sliderFactory->create()->load($element->getValue());
            if ($block->getId()) {
                $chooser->setLabel($this->escapeHtml($block->getSliderTitle()));
            }
        }

        $element->setData('after_element_html', $chooser->toHtml());
        return $element;
    }

    /**
     * Grid Row JS Callback
     *
     * @return string
     */
    public function getRowClickCallback()
    {
        $chooserJsObject = $this->getId();
        $js = '
            function (grid, event) {
                var trElement = Event.findElement(event, "tr");
                var id = trElement.down("td").innerHTML.replace(/^\s+|\s+$/g,"");
                var sliderTitle = trElement.down("td").next().innerHTML;
                ' .
            $chooserJsObject .
            '.setElementValue(id);
                ' .
            $chooserJsObject .
            '.setElementLabel(sliderTitle);
                ' .
            $chooserJsObject .
            '.close();
            }
        ';
        return $js;
    }

    /**
     * Prepare Cms static blocks collection
     *
     * @return Extended
     */
    protected function _prepareCollection()
    {
        $this->setCollection($this->_collectionFactory->create());
        return parent::_prepareCollection();
    }

    /**
     * Prepare columns for Banner slider grid
     *
     * @return Extended
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'chooser_id',
            ['header' => __('ID'), 'align' => 'right', 'index' => 'id', 'width' => 50]
        );

        $this->addColumn('chooser_title', ['header' => __('Title'), 'align' => 'left', 'index' => 'set_title']);

        return parent::_prepareColumns();
    }

    /**
     * Get grid url
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('comparisonslider/index/chooser', ['_current' => true]);
    }
}
