<?php

namespace Redepy\HelloWorld\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface RedepyInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param $text
     * @return void
     */
    public function setText($text);
}
