<?php

namespace Redepy\HelloWorld\Api\Data;

use Magento\Framework\Data\SearchResultInterface;

interface RedepySearchResultInterface extends SearchResultInterface
{
    /**
     * @return \Redepy\HelloWorld\Api\Data\RedepyInterface[]
     */
    public function getItems();

    /**
     * @param \Redepy\HelloWorld\Api\Data\RedepyInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
