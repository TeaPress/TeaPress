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
        $rules = $serviceLocator->get('TeaAdmin\Service\Rule')->getAllRuleWithRole();
        foreach($rules as $rule) {
            if(!$acl->hasRole($rule->getRole()->getName())) {
                $acl->addRole($rule->getRole()->getName());
            }

            if($rule->getResource() == Acl::RESOURCE_ALL && $rule->getPermission()) {
                foreach ($acl->getResources() as $aclResource) {
                    $acl->setRule(Acl::OP_ADD, Acl::TYPE_ALLOW, $rule->getRole()->getName(), $aclResource);
                }
            } else {
                if($acl->hasResource($rule->getResource())) {
                    $permission = ($rule->getPermission()) ? Acl::TYPE_ALLOW : Acl::TYPE_DENY;
                    $acl->setRule(Acl::OP_ADD, $permission, $rule->getRole()->getName(), $rule->getResource());
                }
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