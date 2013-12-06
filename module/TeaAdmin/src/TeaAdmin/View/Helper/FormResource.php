<?php

namespace TeaAdmin\View\Helper;

use Zend\View\Helper\AbstractHelper;

class FormResource extends AbstractHelper
{
    /**
     * Partial view script to use for rendering form resources
     *
     * @var string|array
     */
    protected $partial = null;
    
    protected $role = null;
    
    protected $acl;
    
    protected $data = array();
    
    public function __invoke()
    {
        return $this;
    }
    
    public function render()
    {
        $partial = $this->getPartial();
        if ($partial) {
            return $this->renderPartial($partial);
        }

        return $this->renderStraight();
    }
    
    public function renderPartial($partial)
    {
        if (null === $partial) {
            $partial = $this->getPartial();
        }

        if (empty($partial)) {
            throw new Exception\RuntimeException(
                'Unable to render form resource: No partial view script provided'
            );
        }
        
        $model = array(
            'role' => $this->role,
            'acl' => $this->acl
        );

        if (is_array($partial)) {
            if (count($partial) != 2) {
                throw new Exception\InvalidArgumentException(
                    'Unable to render menu: A view partial supplied as '
                        .  'an array must contain two values: partial view '
                        .  'script and module where script can be found'
                );
            }

            $partialHelper = $this->view->plugin('partial');
            return $partialHelper($partial[0], /*$partial[1], */$model);
        }

        $partialHelper = $this->view->plugin('partial');
        return $partialHelper($partial, $model);
    }
    
    public function renderStraight()
    {
    	$rootResource = 'admin';
    	
    	$html = '<ul class="user-roles"><input type="hidden" name="resources['. $rootResource . ']" value="1" />';
        $full = $this->getAcl()->getFullResource($rootResource);
        if(count($full['children'])) {
        	$html .= $this->renderChildren(array_keys($full['children']));
        }
    	$html .='</ul>';
    	return $html;
    }
    
    public function htmlify($resource)
    {
    	$full = $this->getAcl()->getFullResource($resource);
    	$isAllowed = $this->getAcl()->isAllowed($this->getRole()->getRoleName(), $resource);
    	
    	$html = '<li>';
    	
    	$html .= '<input type="checkbox" id="resource-' . $resource . '" name="resources[' . $resource . ']" ' . ((!$isAllowed) ? 'disabled="disabled"' : '') . ' ' . ((in_array($resource, $this->data)) ? 'checked="checked"' : '') . '/>';
    	$html .= '<label for="resource-' . $resource . '">' . $full['title'] . '</label>';
    	
    	if(count($full['children'])) {
    		$html .= $this->renderChildren(array_keys($full['children']));
    	}
    	
    	$html .= '</li>';
    	return $html;
    }
    
    public function renderChildren($childrens)
    {
    	$html = '<ul>';
    	
    	foreach ($childrens as $resource) {
    		$html .= $this->htmlify($resource);
    	}
    	
    	$html .= '</ul>';
    	return $html;
    }
    
    /**
     * Sets which partial view script to use for rendering form resource
     *
     * @param  string|array $partial partial view script or null. If an array is
     *                               given, it is expected to contain two
     *                               values; the partial view script to use,
     *                               and the module where the script can be
     *                               found.
     * @return Menu
     */
    public function setPartial($partial)
    {
        if (null === $partial || is_string($partial) || is_array($partial)) {
            $this->partial = $partial;
        }

        return $this;
    }

    /**
     * Returns partial view script to use for rendering form resource
     *
     * @return string|array|null
     */
    public function getPartial()
    {
        return $this->partial;
    }
    
    public function getRole()
    {
        return $this->role;
    }
    
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }
    
    public function getAcl()
    {
        return $this->acl;
    }
    
    public function setAcl($acl)
    {
        $this->acl = $acl;
        return $this;
    }
    
    public function  getData()
    {
    	return $this->data;
    }
    
    public function setData($data)
    {
    	$this->data = $data;
    	return $this;
    }
}