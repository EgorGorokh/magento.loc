<?php

namespace Webkul\Second\Observer;

use Magento\Framework\Data\Tree\Node;
use Magento\Framework\Data\Tree\NodeFactory;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Webkul\Second\Model\ResourceModel1\Events\Collection;

class NonCategoryLink implements ObserverInterface
{
    protected $nodeFactory;
    private $collection;

    public function __construct(
        NodeFactory                               $nodeFactory,
        Collection                                       $collection
    ) {
        $this->nodeFactory = $nodeFactory;
        $this->collection = $collection;
    }

    /**
     * @param EventObserver $observer
     * @param ModuleDataSetupInterface $setup
     * @return $this
     */
    public function execute(EventObserver $observer)
    {
        /** @var \Magento\Framework\Data\Tree\Node $menu */
        $customersData = $this->collection;
        foreach ($customersData as $key => $customer) {
            $name = $customer['reason'];
            $menu = $observer->getMenu();
            $tree = $menu->getTree();
            $data = [
                'name' => __($name),
                'id' => $customer['entity_id'],
                'url' => 'http://magento.loc/' . $name,
                'is_active' => false
            ];
            $node = new Node($data, 'id', $tree, $menu);
            $menu->addChild($node);
        }
        return $this;
    }
}
