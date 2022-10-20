<?php

namespace Mage4\ImageComparisonSlider\Controller\Adminhtml\Item;

use Mage4\ImageComparisonSlider\Api\Data\SliderInterface;
use Mage4\ImageComparisonSlider\Model\ImageUploader;
use Mage4\ImageComparisonSlider\Model\SliderFactory;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Model\AbstractModel;

class Save extends Action
{
    private $sliderFactory;
    private $imageUploader;

    public function __construct(
        Context          $context,
        SliderFactory    $sliderFactory,
        ImageUploader    $imageUploader,
        DataObjectHelper $dataObjectHelper
    )
    {
        $this->sliderFactory = $sliderFactory;
        $this->imageUploader = $imageUploader;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context);
    }


    /**
     * @throws LocalizedException
     */
    public function execute()
    {
        $slide = $this->getRequest()->getParams();
//        dd($slide);
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($slide) {
            $params = $this->getRequest()->getParams();
            $id = $params['id'];
            if ($id) {
                $model = $this->sliderFactory->getById($id);
            } else {
                $model = $this->sliderFactory->create();
                unset($slide['id']);
            }
            $slide = $this->desktop_image1($slide);
            $slide = $this->desktop_image2($slide);
            $slide = $this->mobile_image1($slide);
            $slide = $this->mobile_image2($slide);
            $slide = $this->drag_icon($slide);

            try {
                $this->dataObjectHelper->populateWithArray($model, $slide, Action::class);
                $model->setData($slide)->save();
                $this->messageManager->addSuccessMessage(__('You saved this data.'));
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/index/edit/', ['id' => $slide['parent_id'], '_current' => true]);
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the data.'));
            }

            $this->_getSession()->setFormData($slide);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }

    public function desktop_image1(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['desktop_image1'][0]['tmp_name'])) {
            $slide['desktop_image1'] = $slide['desktop_image1'][0]['name'];
            $slide['desktop_image1'] = $this->imageUploader->moveFileFromTmp($slide['desktop_image1']);
        } elseif (isset($slide['desktop_image1'][0]['name'])) {
            $slide['desktop_image1'] = $slide['desktop_image1'][0]['name'];
        } else {
            $slide['desktop_image1'] = null;
        }
        return $slide;
    }

    public function desktop_image2(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['desktop_image2'][0]['tmp_name'])) {
            $slide['desktop_image2'] = $slide['desktop_image2'][0]['name'];
            $slide['desktop_image2'] = $this->imageUploader->moveFileFromTmp($slide['desktop_image2']);
        } elseif (isset($slide['desktop_image2'][0]['name'])) {
            $slide['desktop_image2'] = $slide['desktop_image2'][0]['name'];
        } else {
            $slide['desktop_image2'] = null;
        }
        return $slide;
    }

    public function mobile_image1(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['mobile_image1'][0]['tmp_name'])) {
            $slide['mobile_image1'] = $slide['mobile_image1'][0]['name'];
            $slide['mobile_image1'] = $this->imageUploader->moveFileFromTmp($slide['mobile_image1']);
        } elseif (isset($slide['mobile_image1'][0]['name'])) {
            $slide['mobile_image1'] = $slide['mobile_image1'][0]['name'];
        } else {
            $slide['mobile_image1'] = null;
        }
        return $slide;
    }

    public function mobile_image2(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['mobile_image2'][0]['tmp_name'])) {
            $slide['mobile_image2'] = $slide['mobile_image2'][0]['name'];
            $slide['mobile_image2'] = $this->imageUploader->moveFileFromTmp($slide['mobile_image2']);
        } elseif (isset($slide['mobile_image2'][0]['name'])) {
            $slide['mobile_image2'] = $slide['mobile_image2'][0]['name'];
        } else {
            $slide['mobile_image2'] = null;
        }
        return $slide;
    }

    public function drag_icon(array $rawData)
    {
        $slide = $rawData;
        if (isset($slide['drag_icon'][0]['tmp_name'])) {
            $slide['drag_icon'] = $slide['drag_icon'][0]['name'];
            $slide['drag_icon'] = $this->imageUploader->moveFileFromTmp($slide['drag_icon']);
        } elseif (isset($slide['drag_icon'][0]['name'])) {
            $slide['drag_icon'] = $slide['drag_icon'][0]['name'];
        } else {
            $slide['drag_icon'] = null;
        }
        return $slide;
    }
}

