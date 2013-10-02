<?php

namespace TeaAdmin\Permissions\Acl;

use Zend\Permissions\Acl\Acl as BaseAcl;

class Acl extends BaseAcl
{
    const RESOURCE_ALL = 'all';
    
    protected $resourcesNamed;
    
    /**
     * 
     * @param array $resource
     * @param string $parent
     */
    public function addResource($resource, $parent = null)
    {
        if(is_array($resource)) {
            $name = $resource['name'];
            $resource = $resource['resource'];
        } else {
            $name = $resource;
        }
        parent::addResource($resource, $parent);
        $this->resourcesNamed[$resource] = $name;
    }
    
    /**
     * Get list of named resources
     */
    public function getResourcesNamed()
    {
        return $this->resourcesNamed;
    }
}