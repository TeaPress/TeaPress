<?php
namespace TakeATea\Db\ResultSet;

use Zend\Db\ResultSet\ResultSet as BaseResultSet;

class ResultSet extends BaseResultSet
{
    public function toArray()
    {
        $return = array();
        foreach ($this as $row) {
            $return[] = $row;
        }
        return $return;
    }
}
