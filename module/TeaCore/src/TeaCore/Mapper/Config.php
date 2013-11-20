<?php

namespace TeaCore\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Config extends AbstractMapper
{
    public function get($path)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where("path = '" . $path . "'");
        
        return $this->selectWith($select)->current();
    }
    
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
            $exist = $this->tableGateway->select("path = '" . $data['path'] . "'")->current();
            if($exist) {
                unset($data['config_id']);
                return $this->tableGateway->update($data, 'config_id = ' . $exist->getConfigId());
            } else {
                return $this->tableGateway->insert($data);
            }
        }
    }
}