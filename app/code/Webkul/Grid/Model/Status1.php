<?php
/**
 * Webkul_Grid Status Options Model.
 * @category    Webkul
 * @author      Webkul Software Private Limited
 */
namespace Webkul\Grid\Model;
use Magento\Framework\Data\OptionSourceInterface;

class Status1 implements OptionSourceInterface
{
    /**
     * Get Grid row status type labels array.
     * @return array
     */
    public function getOptionArray()
    {
        $this->_resources = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');
        $connection = $this->_resources->getConnection();
        $dataTable = $this->_resources->getTableName('chirag_events_table');
        $sql = "select * from " . $dataTable;
        $customersData = $connection->fetchAll($sql);
        $options1=[];
        foreach ($customersData as $key => $customer) {
            $options1+=["{$customer['reason']}" => __("{$customer['reason']}")];
        }
        return $options1;
    }

    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    /**
     * Get Grid row type array for option element.
     * @return array
     */
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        return $this->getOptions();
    }
}
