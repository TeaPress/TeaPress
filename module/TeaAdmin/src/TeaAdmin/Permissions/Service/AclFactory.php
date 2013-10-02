<?php

namespace TeaAdmin\Permissions\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use TeaAdmin\Permissions\Acl\Acl;

class AclFactory implements FactoryInterface 
{
    /**
     * Created Acl from factory
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     */
    public function createService(ServiceLocatorInterface $serviceLocator) {
        $acl = new Acl();
        
        // Add resources
        $config = $serviceLocator->get('Config');
        $resources = $config['tea-admin-acl'];
        $this->addResourceFromArray($acl, $resources, null);
        
        // Add roles and rules
        $roles = $serviceLocator->get('TeaAdmin\Service\Role')->getAllRoleWithRules();
        foreach($roles as $role) {
            if($acl->hasRole($role->getName())) {
                $acl->addRole($role->getName());
            }
            
            foreach ($role->getRules() as $rule) {
                if($this->getResource() == Acl::RESOURCE_ALL && $rule->getPermission()) {
                    foreach ($acl->getResources() as $aclResource) {
                        $acl->setRule(Acl::OP_ADD, Acl::TYPE_ALLOW, $role->getName(), $aclResource);
                    }
                }
                
                $permission = ($rule->getPermission()) ? Acl::TYPE_ALLOW : Acl::TYPE_DENY;
                
                $acl->setRule(Acl::OP_ADD, $permission, $role->getName(), $rule->getResource());
            }
        }
        
        return $acl;
    }
    
    /**
     * Add ressource in Acl
     * @param Acl $acl
     * @param array $childrens
     * @param string $parent
     */
    protected function addResourceFromArray(Acl $acl, array &$childrens, $parent = null)
    {
        foreach($childrens as $childRole => $child) {
            if(isset($child['title'])) {
                $childRole = array(
                    'name' => $child['title'],
                    'resource' => $child['resource'],
                );
            }
            $acl->addResource($childRole, $parent);
            
            if(isset($child['children'])) {
                $this->addResourceFromArray($acl, $child['children']/*, is_array($childRole) ? $childRole['resource'] : $childRole*/);
            }
        }
    }
}