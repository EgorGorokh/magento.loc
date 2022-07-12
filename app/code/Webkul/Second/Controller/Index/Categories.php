<?php

namespace Webkul\Second\Controller\Index;

use Magento\Framework\App\Action\Context;

class Categories extends \Magento\Framework\App\Action\Action
{
//
/*
    protected $context;
   public function __construct(\Webkul\Second\Helper\Logic $helper, Context $context)
    {
        parent::__construct($context);
        $this->helper = $helper;
    }
    ////////
*/
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
        //$this->helper->examination();/////////
    }
}

