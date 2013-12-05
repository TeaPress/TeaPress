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
            if(!$acl->hasRole($rule->getRole()->getRoleName())) {
                $acl->addRole($rule->getRole()->getRoleName());
            }

            if($rule->getResource() == Acl::RESOURCE_ALL && $rule->getPermission()) {
                foreach ($acl->getResources() as $aclResource) {
                    $acl->setRule(Acl::OP_ADD, Acl::TYPE_ALLOW, $rule->getRole()->getRoleName(), $aclResource);
                }
            } else {
                if($acl->hasResource($rule->getResource())) {
                    $permission = ($rule->getPermission()) ? Acl::TYPE_ALLOW : Acl::TYPE_DENY;
                    $acl->setRule(Acl::OP_ADD, $permission, $rule->getRole()->getRoleName(), $rule->getResource());
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
            //TODO Better;
            $aclR = $child;
            unset($aclR['children']);
            
            $acl->addResource($child, $parent);
            
            if(isset($child['children'])) {
                $this->addResourceFromArray($acl, $child['children'], $aclR['resource']);
            }
        }
    }
}