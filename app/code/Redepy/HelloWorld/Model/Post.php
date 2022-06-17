<?php

namespace Redepy\HelloWorld\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'redepy_helloworld_post';

    protected $_cacheTag = 'redepy_helloworld_post';

    protected $_eventPrefix = 'redepy_helloworld_post';

    public function setText($text): Post
    {
        $this->setData($this->_idFieldName, $text);
        return $this;
    }

    protected function _construct()
    {
        $this->_init(\Redepy\HelloWorld\Model\ResourceModel\Post::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues(): array
    {
        $values = [];

        return $values;
    }
}
