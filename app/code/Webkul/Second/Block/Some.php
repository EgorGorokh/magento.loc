<?php

namespace Webkul\Second\Block;

use Webkul\Second\Model\ResourceModel\Events\Collection as tableSecond;
use Webkul\Second\Model\ResourceModel1\Events\Collection as tableThird;
use Webkul\Second\Model\ResourceModel2\Events\Collection as tableFirst;
use Magento\Cms\Api\PageRepositoryInterface;

class Some extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Cms\Model\PageFactory
     */

    private $_pageFactory;
    private tableFirst $collection1;
    private tableSecond $collection2;
    private tableThird $collection3;

    /**
     * Construct
     *
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array                                            $data = [],
        \Magento\Cms\Model\PageFactory                   $pageFactory,
        tableFirst                                       $collection1,
        tableSecond                                      $collection2,
        tableThird                                       $collection3,
        PageRepositoryInterface                          $pageRepository
    )
    {
        parent::__construct($context, $data);
        $this->collection1 = $collection1;
        $this->collection2 = $collection2;
        $this->collection3 = $collection3;
        $this->_pageFactory = $pageFactory;
        $this->pageRepository = $pageRepository;
    }

    public function getWelcomeText()
    {
        $customersData1 = $this->collection1;
        $customersData2 = $this->collection2;
        $customersData3 = $this->collection3;
        $title = '';
        $arr = [];


        foreach ($customersData1 as $key => $customer) {
            $arr[] = $customer['title'];
        }


        echo "Посты:<br><br>";
        foreach ($customersData2 as $key => $customer) {
            $title = $customer['title'];
            echo "<div class='title'>" . $customer['title'] . "</div><br>" .
                "<div class='main'>" .
                mb_strimwidth("{$customer['content']}", 0, 450, "...") . "</div>" .
                "<div class='link'>" . "<a href='http://magento.loc/{$customer['title']}'>Подробнее</a>" . "</div><br><br>";
            $content = "<div style='font-size: 3em'>" . $customer['title'] . '</div><br><br>' . $customer['content'];
        }


        if (!in_array($title, $arr)) {
            $page = $this->_pageFactory->create();
            $page->setTitle($title)
                ->setIdentifier($title)
                ->setIsActive(true)
                ->setPageLayout('1column')
                ->setStores([0])
                ->setContent($content)
                ->save();
        }


        foreach ($customersData3 as $key => $customer) {
            $title = $customer['reason'];
            if (in_array($title, $arr)) {
                $this->pageRepository->deleteById($customer['reason']);
            }
        }


        $content = '';
        foreach ($customersData3 as $key => $customer3) {
            $title = $customer3['reason'];
            foreach ($customersData2 as $key => $customer) {
                if ($customer3['reason'] == $customer['category']) {
                    $content .= "<div style='font-size: 3em'>" . $customer['title'] . '</div><br><br>' . $customer['content'] . '<br><br>' . "<div style='float: right'class='link'>" . "<a href='http://magento.loc/{$customer['title']}'>Подробнее</a>" . "</div><br><br>";
                }
            }

            $page = $this->_pageFactory->create();
            $page->setTitle($title)
                ->setIdentifier($title)
                ->setIsActive(true)
                ->setPageLayout('1column')
                ->setStores([0])
                ->setContent($content)
                ->save();
            $content = '';
        }
    }
}
