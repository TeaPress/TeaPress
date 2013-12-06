<?php

namespace TeaAdmin\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Permissions\Acl;

class Permission extends AbstractHelper
{
    /**
     * ACL to use when iterating pages
     *
     * @var Acl\Acl
     */
    protected $acl;
    
    /**
     * ACL role to use when iterating pages
     *
     * @var \TeaAdmin\Model\Role
     */
    protected $role;
    
    /**
     * Default ACL to use when iterating pages if not explicitly set in the
     * instance by calling {@link setAcl()}
     *
     * @var Acl\Acl
     */
    protected static $defaultAcl;
    
    /**
     * Default ACL role to use when iterating pages if not explicitly set in the
     * instance by calling {@link setRole()}
     *
     * @var \TeaAdmin\Model\Role
     */
    protected static $defaultRole;
    
    /**
     * Sets ACL to use when iterating pages
     *
     * Implements {@link HelperInterface::setAcl()}.
     *
     * @param  Acl\Acl $acl [optional] ACL object.  Default is null.
     * @return AbstractHelper  fluent interface, returns self
     */
    public function setAcl(Acl\Acl $acl = null)
    {
        $this->acl = $acl;
        return $this;
    }
    
    /**
     * Returns ACL or null if it isn't set using {@link setAcl()} or
     * {@link setDefaultAcl()}
     *
     * Implements {@link HelperInterface::getAcl()}.
     *
     * @return Acl\Acl|null  ACL object or null
     */
    public function getAcl()
    {
        if ($this->acl === null && static::$defaultAcl !== null) {
            return static::$defaultAcl;
        }
    
        return $this->acl;
    }
    
    /**
     * Sets ACL role(s) to use when iterating pages
     *
     * Implements {@link HelperInterface::setRole()}.
     *
     * @param  mixed $role [optional] role to set. Expects a string, an
     *                     instance of type {@link Acl\Role\RoleInterface}, or null. Default
     *                     is null, which will set no role.
     * @return AbstractHelper  fluent interface, returns self
     * @throws Exception\InvalidArgumentException if $role is invalid
     */
    public function setRole($role = null)
    {
        if (null === $role || is_string($role) ||
        $role instanceof Acl\Role\RoleInterface
        ) {
            $this->role = $role;
        } else {
            throw new \Exception\InvalidArgumentException(sprintf(
                '$role must be a string, null, or an instance of '
                .  'Zend\Permissions\Role\RoleInterface; %s given',
                (is_object($role) ? get_class($role) : gettype($role))
            ));
        }
    
        return $this;
    }
    
    /**
     * Returns ACL role to use when iterating pages, or null if it isn't set
     * using {@link setRole()} or {@link setDefaultRole()}
     *
     * Implements {@link HelperInterface::getRole()}.
     *
     * @return string|Acl\Role\RoleInterface|null  role or null
     */
    public function getRole()
    {
        if ($this->role === null && static::$defaultRole !== null) {
            return static::$defaultRole;
        }
    
        return $this->role;
    }
    
    /**
     * Determines whether a resource should be accepted by ACL when iterating
     *
     * Rules:
     * - If helper has no ACL, page is not accepted
     * - If page has a resource or privilege defined, page is accepted
     *   if the ACL allows access to it using the helper's role
     * - If page has no resource or privilege, page is accepted
     *
     * @param  AbstractPage $page  page to check
     * @return bool                whether page is accepted by ACL
     */
    public function isAuthorized($resource)
    {
        if (!$acl = $this->getAcl()) {
            return false;
        }
    
        if ($resource) {
            return $acl->hasResource($resource) && $acl->isAllowed($this->getRole()->getRoleName(), $resource, null);
        }
    
        return false;
    }
}
