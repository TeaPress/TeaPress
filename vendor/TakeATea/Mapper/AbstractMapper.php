<?php

namespace TakeATea\Mapper;

use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;

abstract class AbstractMapper
{       
    protected $tableGateway;
    protected $usePaginator = false;

    /**
     * Constructor
     *
     * @param TableGateway $tableGateway
     */
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    /**
     * Get Result with or without paginator
     * @param type $select
     * @return \TakeATea\Mapper\Paginator
     */
    public function selectWith($select)
    {
        if($this->usePaginator) {
            $paginatorAdapter = new DbSelect($select, $this->tableGateway->getAdapter(), $this->tableGateway->getResultSetPrototype());
            $paginator = new Paginator($paginatorAdapter);
            return $paginator;
        } else {
            return $this->tableGateway->selectWith($select);
        }
    }
    
    /**
     * Use Paginator with options
     * @param type $options
     */
    public function usePaginator($usePaginator)
    {
        $this->usePaginator = $usePaginator;
    }
}