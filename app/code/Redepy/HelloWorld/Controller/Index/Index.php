<?php

namespace Redepy\HelloWorld\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
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
     * @var \Magento\Catalog\Model\ProductRepository
     */
    protected $productRepository;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Redepy\HelloWorld\Model\PostFactory $postFactory
     * @param \Magento\Catalog\Model\ProductRepository $productRepository
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\App\Action\Context      $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Redepy\HelloWorld\Model\PostFactory       $postFactory,
        \Magento\Catalog\Model\ProductRepository   $productRepository,
        array                                      $data = []
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_postFactory = $postFactory;
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }

    public function execute()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        return $this->_pageFactory->create();
    }

    public function getProductById($id)
    {
        return $this->productRepository->getById($id);
    }
}
