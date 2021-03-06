<?php
/**
 * @category   Webkul
 * @package    Webkul_Events
 * @author     webkul@czargroup.net
 * @copyright  This file was generated by using Module Creator provided by <developer@czargroup.net>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Webkul\Second\Model\ResourceModel2;

class Events extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('cms_page', 'entity_id');
    }
}
