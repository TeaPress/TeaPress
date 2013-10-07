<?php

namespace TeaAdmin\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Config extends AbstractMapper
{
    public function getAllConfig()
    {
        $select = $this->tableGateway->getSql()->select();
        return $this->selectWith($select);
    }
}