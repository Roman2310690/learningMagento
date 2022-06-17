<?php

namespace Redepy\HelloWorld\Controller\Test;

use Redepy\HelloWorld\Model\RedepyRepository;
use Magento\Framework\Exception\NoSuchEntityException;

class Save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \Redepy\HelloWorld\Model\PostFactory
     */
    protected $_postFactory;

    /**
     * @var RedepyRepository
     */
    protected $_postRepository;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Redepy\HelloWorld\Model\PostFactory $postFactory
     * @param RedepyRepository $postRepository
     */
    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Redepy\HelloWorld\Model\PostFactory       $postFactory,
        RedepyRepository                           $postRepository
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        $this->_postRepository = $postRepository;
        return parent::__construct($context);
    }

    public function execute()
    {
        try {
            $id = $this->getRequest()->getParam('id');
            $text = $this->getRequest()->getParam('text');
            try {
                $postModel = $this->_postRepository->getById($id);
            } catch (NoSuchEntityException $e) {
                $postModel = $this->_postFactory->create();
                $postModel->setId($id);
            }
            $postModel->setText($text);
            $this->_postRepository->save($postModel);
        } catch (NoSuchEntityException $e) {
            $this->messageManager->addExceptionMessage($e, $e->getMessage());
        }

        return $this->_pageFactory->create();
    }
}

