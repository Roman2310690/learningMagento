<?php

namespace Redepy\HelloWorld\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'product_id';
    protected $_eventPrefix = 'redepy_helloworld_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Redepy\HelloWorld\Model\Post::class, Redepy\HelloWorld\Model\ResourceModel\Post::class);
    }

}
