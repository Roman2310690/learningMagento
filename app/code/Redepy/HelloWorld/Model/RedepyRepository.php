<?php

namespace Redepy\HelloWorld\Model;

use Redepy\HelloWorld\Model\Post;
use Redepy\HelloWorld\Model\PostFactory;
use Redepy\HelloWorld\Api\RedepyRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class RedepyRepository implements RedepyRepositoryInterface
{
    public function __construct(
        PostFactory                   $redepyFactory,
        ResourceModel\Post\Collection $redepyCollectionFactory
    )
    {
        $this->redepyFactory = $redepyFactory;
        $this->redepyCollectionFactory = $redepyCollectionFactory;
    }

    /**
     * @param Post $items
     * @return Post
     */
    public function save(Post $items)
    {
        $items->getResource()->save($items);
        return $items;
    }

    /**
     * @param int $id
     * @return Post
     * @throws NoSuchEntityException
     */
    public function getById($id)
    {
        $obj = $this->redepyFactory->create();
        $obj->getResource()->load($obj, $id);
        if (!$obj->getId()) {
            throw new NoSuchEntityException(__('Unable to find My Entity with ID "%1"', $id));
        }
        return $obj;
    }
}
