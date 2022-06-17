<?php

namespace Redepy\HelloWorld\Api;

use Redepy\HelloWorld\Model\Post;

interface RedepyRepositoryInterface
{
    /**
     * @param int $id
     * @return Post
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param Post $id
     * @return Post
     */
    public function save(Post $id);

}
