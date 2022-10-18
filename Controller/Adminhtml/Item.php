<?php

namespace Mage4\ImageComparisonSlider\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Mage4\ImageComparisonSlider\Api\SliderRepositoryInterface;

abstract class Item extends Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ACTION_RESOURCE = 'Mage4_ImageComparisonSlider::comparisonslider';

    /**
     * Data repository
     *
     * @var SliderRepositoryInterface
     */
    protected $sliderRepository;

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * Result Page Factory
     *
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Result Forward Factory
     *
     * @var ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * Data constructor.
     *
     * @param Registry $registry
     * @param SliderRepositoryInterface $sliderRepository
     * @param PageFactory $resultPageFactory
     * @param ForwardFactory $resultForwardFactory
     * @param Context $context
     */
    public function __construct(
        Registry                $registry,
        SliderRepositoryInterface $sliderRepository,
        PageFactory             $resultPageFactory,
        ForwardFactory          $resultForwardFactory,
        Context                 $context
    ) {
        $this->coreRegistry = $registry;
        $this->sliderRepository = $sliderRepository;
        $this->resultPageFactory = $resultPageFactory;
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }
}
