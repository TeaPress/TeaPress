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
        throw new \Exception('Not developped');
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
    }
    
    public function getAcl()
    {
        return $this->acl;
    }
    
    public function setAcl($acl)
    {
        $this->acl = $acl;
    }
}