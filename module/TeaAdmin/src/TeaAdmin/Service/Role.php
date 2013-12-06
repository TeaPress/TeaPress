<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class Role extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\Role';
    
    /**
     * Get role by id
     * @param int $id
     * @return TeaAdmin\Model\Role
     */
    public function getRoleById($id)
    {
        return $this->getMapper()->getRoleById($id);
    }
    
    /**
     * Get all roles
     * @param boolean $usePaginator
     * @return Paginator
     */
    public function getAllRoles($usePaginator = true)
    {
        if($usePaginator) {
            $this->usePaginator();
        }
        return $this->getMapper()->getAllRoles();
    }
    
    /**
     * Create or update role
     * @param \TeaAdmin\Model\Role $role
     * @return type
     */
    public function save(\TeaAdmin\Model\Role $role)
    {
        return $this->getMapper()->save($role);
    }
    
    /**
     * 
     * @param \TeaAdmin\Model\Role $role
     * @param array $resources
     */
    public function saveWithRules($role, $resources)
    {
    	$adapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
    	$connexion = $adapter->getDriver()->getConnection();
    	$connexion->beginTransaction();
    	
    	try {
    		if($role->getRoleId() != null) {
    			$this->getServiceLocator()->get('TeaAdmin\Service\Rule')->deleteRulesFromRole($role->getRoleId());
    		}
    		
	    	$role = $this->getMapper()->save($role);
	    	
	    	$systemResources = $this->getserviceLocator()->get('TeaAdmin\Permissions\Service\Acl')->getResources();
	    	foreach ($systemResources as $item) {
	    		$rule = new \TeaAdmin\Model\Rule();
	    		$rule->setRoleId($role->getRoleId());
	    		$rule->setResource($item);
	    		
	    		if(in_array($item, $resources)) {
					$rule->setPermission(1);
				} else {
					$rule->setPermission(0);
				}
	    		
				$this->getServiceLocator()->get('TeaAdmin\Service\Rule')->save($rule);
	    	}
    	} catch(\Exception $e) {
    		$connexion->rollBack();
    		throw $e;
    	}
    	
    	$connexion->commit();
    }
    
    public function delete($roleId)
    {
        $adapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $connexion = $adapter->getDriver()->getConnection();
        $connexion->beginTransaction();
        
        try {
            $this->getServiceLocator()->get('TeaAdmin\Service\Rule')->deleteRulesFromRole($roleId);
            
            $this->getMapper()->delete($roleId);
        } catch(\Exception $e) {
            $connexion->rollBack();
            throw $e;
        }
         
        $connexion->commit();
    }
}