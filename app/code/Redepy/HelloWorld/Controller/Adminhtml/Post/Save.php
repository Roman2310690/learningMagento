<?php

namespace Redepy\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Redepy\HelloWorld\Model\RedepyRepository;
use Redepy\HelloWorld\Model\PostFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Controller\Result\RedirectFactory;

class Save extends Action
{
    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;
    /**
     * @var RedirectFactory
     */
    protected $resultRedirectFactory;
    /**
     * @var PostFactory
     */
    protected PostFactory $_postFactory;
    /**
     * @var RedepyRepository
     */
    protected RedepyRepository $_postRepository;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param PostFactory $postFactory
     * @param RedepyRepository $postRepository
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Context          $context,
        PageFactory      $resultPageFactory,
        PostFactory      $postFactory,
        RedepyRepository $postRepository,
        RedirectFactory  $resultRedirectFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->_postFactory = $postFactory;
        $this->_postRepository = $postRepository;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('product_id');
        $text = $this->getRequest()->getParam('text');
        try {
            $postModel = $this->_postRepository->getById($id);
        } catch (NoSuchEntityException $e) {
            $postModel = $this->_postFactory->create();
            $postModel->setId($id);
        }
        $postModel->setText($text);
        $this->_postRepository->save($postModel);

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/index');
        return $resultRedirect;
    }
}

