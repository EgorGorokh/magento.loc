<?php

namespace Dolphin\MyModule\Block;

use Magento\Framework\View\Element\Template;

class MyModule extends Template
{
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getMymodule()
    {
        return 'Module Created Successfully';
    }
}
