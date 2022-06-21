<?php

namespace Mageants\Blog\Model;

use Mageants\Blog\Api\TestInterface;
use Mageants\Blog\Model\PostFactory;
use Mageants\Blog\Model\ResourceModel\Post\CollectionFactory;

class Test implements TestInterface
{
    private $PostFactory;
    private $CollectionFactory;

    public function __construct(PostFactory $PostFactory, CollectionFactory $CollectionFactory)
    {
        $this->PostFactory = $PostFactory;
        $this->CollectionFactory = $CollectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function setData($data)
    {
        $name = $data['name'];
        $number = $data['number'];
        $city = $data['city'];
        $insertData = $this->PostFactory->create();
        $insertData->setName($name)->save();
        $insertData->setNumber($number)->save();
        $insertData->setCity($city)->save();
        return 'successfully saved';
    }
}
