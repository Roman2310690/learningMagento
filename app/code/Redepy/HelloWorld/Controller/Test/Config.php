<?php

namespace Redepy\HelloWorld\Controller\Test;

class Config extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Redepy\HelloWorld\Helper\Data
     */
    protected $helperData;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Redepy\HelloWorld\Helper\Data $helperData
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Redepy\HelloWorld\Helper\Data        $helperData

    )
    {
        $this->helperData = $helperData;
        return parent::__construct($context);
    }

    public function execute()
    {

        echo $this->helperData->getGeneralConfig('enable');
        echo $this->helperData->getGeneralConfig('display_text');
        exit();

    }
}
