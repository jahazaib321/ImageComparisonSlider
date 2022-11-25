<?php

namespace Mage4\ImageComparisonSlider\Controller\Adminhtml\Item;

use Mage4\ImageComparisonSlider\Model\ImageUploader;
use Mage4\ImageComparisonSlider\Model\SliderFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\LocalizedException;

class Save extends Action
{
    private SliderFactory $sliderFactory;
    private ImageUploader $imageUploader;

    /**
     * @param Context $context
     * @param SliderFactory $sliderFactory
     * @param ImageUploader $imageUploader
     * @param DataObjectHelper $dataObjectHelper
     * @throws LocalizedException
     */
    public function __construct(
        Context          $context,
        SliderFactory    $sliderFactory,
        ImageUploader    $imageUploader,
        DataObjectHelper $dataObjectHelper
    ) {
        $this->sliderFactory = $sliderFactory;
        $this->imageUploader = $imageUploader;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context);
    }

    public function execute()
    {
        $slide = $this->getRequest()->getParams();

        $resultRedirect = $this->resultRedirectFactory->create();
        if ($slide) {
            $params = $this->getRequest()->getParams();
            $id = $params['id'];
            if ($id) {
                $model = $this->sliderFactory->create()->load($id);
            } else {
                $model = $this->sliderFactory->create();
                unset($slide['id']);
            }
            $slide = $this->before_desktop_image($slide);
            $slide = $this->after_desktop_image($slide);
            $slide = $this->before_mobile_image($slide);
            $slide = $this->after_mobile_image($slide);

            try {
                $this->dataObjectHelper->populateWithArray($model, $slide, Action::class);
                $model->setData($slide)->save();
                $this->messageManager->addSuccessMessage(__('You saved this data.'));
                $this->_getSession()->setFormData(false);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($slide);
            return $resultRedirect->setPath('comparisonslider/index/index', ['id' => $this->getRequest()->getParam('id')]);
        }
    }

    public function before_desktop_image(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['before_desktop_image'][0]['tmp_name'])) {
            $slide['before_desktop_image'] = $slide['before_desktop_image'][0]['name'];
            $slide['before_desktop_image'] = $this->imageUploader->moveFileFromTmp($slide['before_desktop_image']);
        } elseif (isset($slide['before_desktop_image'][0]['name'])) {
            $slide['before_desktop_image'] = $slide['before_desktop_image'][0]['name'];
        } else {
            $slide['before_desktop_image'] = null;
        }
//        dd($slide);
        return $slide;
    }

    public function after_desktop_image(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['after_desktop_image'][0]['tmp_name'])) {
            $slide['after_desktop_image'] = $slide['after_desktop_image'][0]['name'];
            $slide['after_desktop_image'] = $this->imageUploader->moveFileFromTmp($slide['after_desktop_image']);
        } elseif (isset($slide['after_desktop_image'][0]['name'])) {
            $slide['after_desktop_image'] = $slide['after_desktop_image'][0]['name'];
        } else {
            $slide['after_desktop_image'] = null;
        }
        return $slide;
    }

    public function before_mobile_image(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['before_mobile_image'][0]['tmp_name'])) {
            $slide['before_mobile_image'] = $slide['before_mobile_image'][0]['name'];
            $slide['before_mobile_image'] = $this->imageUploader->moveFileFromTmp($slide['before_mobile_image']);
        } elseif (isset($slide['before_mobile_image'][0]['name'])) {
            $slide['before_mobile_image'] = $slide['before_mobile_image'][0]['name'];
        } else {
            $slide['before_mobile_image'] = null;
        }
        return $slide;
    }

    public function after_mobile_image(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['after_mobile_image'][0]['tmp_name'])) {
            $slide['after_mobile_image'] = $slide['after_mobile_image'][0]['name'];
            $slide['after_mobile_image'] = $this->imageUploader->moveFileFromTmp($slide['after_mobile_image']);
        } elseif (isset($slide['after_mobile_image'][0]['name'])) {
            $slide['after_mobile_image'] = $slide['after_mobile_image'][0]['name'];
        } else {
            $slide['after_mobile_image'] = null;
        }
        return $slide;
    }
}
