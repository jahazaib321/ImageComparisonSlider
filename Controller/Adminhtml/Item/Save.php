<?php

namespace Mage4\ImageComparisonSlider\Controller\Adminhtml\Item;

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
        SliderFactory     $sliderFactory,
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
        $data = $this->getRequest()->getPostValue();
        unset($data['id']);
        $model = $this->sliderFactory->create();
        $id = $this->getRequest()->getParam('id');
        $model->load($id);
        if ($data) {
            if (isset($data['image'][0]['name']) && isset($data['image'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['name'];
                /** @var ImageUploader $this- >imageUploader */
                $this->imageUploader->moveFileFromTmp($data['image']);
                $this->dataObjectHelper->populateWithArray($model, $data, AbstractModel::class);
            } elseif (isset($data['image'][0]['name']) && !isset($data['image'][0]['tmp_name'])) {
                $data['image'] = $data['image'][0]['name'];
            } else {
                $data['image'] = null;
            }
            $model->setData($data)->save();
        }
        return $this->resultRedirectFactory->create()->setPath('comparisonslider/index/index');
    }
}

