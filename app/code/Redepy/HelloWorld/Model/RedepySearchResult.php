<?php

namespace Redepy\HelloWorld\Model;


use Redepy\HelloWorld\Api\Data\RedepySearchResultInterface;
use Magento\Framework\Api\SearchResults;

class RedepySearchResult extends SearchResults implements RedepySearchResultInterface
{

}
