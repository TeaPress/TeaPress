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
            $title = $resource['title'];
            if(isset($resource['group'])) {
                $group = $resource['group'];
            }
            $resource = $resource['resource'];
            
        } else {
            $title = $resource;
        }
        parent::addResource($resource, $parent);
        
        $this->resourcesNamed[$resource] = $title;
        $this->resources[$resource]['title'] = $title;
        
        if(isset($group)) {
            $this->resources[$resource]['group'] = $group;
        }
    }
    
    public function getResourcesNamed()
    {
        return $this->resourcesNamed;
    }
    
    public function getResourceNamed($resource)
    {
        return $this->resourcesNamed[$resource];
    }
    
    public function getFullResource($resource)
    {
        if ($resource instanceof Resource\ResourceInterface) {
            $resourceId = $resource->getResourceId();
        } else {
            $resourceId = (string) $resource;
        }

        if (!$this->hasResource($resource)) {
            throw new Exception\InvalidArgumentException("Resource '$resourceId' not found");
        }

        return $this->resources[$resourceId];
    }
}