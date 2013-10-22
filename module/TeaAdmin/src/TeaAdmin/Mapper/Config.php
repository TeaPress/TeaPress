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
    
    public function getConfigFromPaths($section)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where('path LIKE "' . $section . '%"' );
        return $this->selectWith($select);
    }
    
    public function save($data)
    {
        if(isset($data['config_id'])) {
            return $this->tableGateway->update($data, 'config_id = ' . $data['config_id']);
        } else {
            return $this->tableGateway->insert($data);
        }
    }
}