<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype;

use Twig_Extension;
use Twig_Extension_GlobalsInterface;

class AclTwigExtension extends Twig_Extension implements Twig_Extension_GlobalsInterface
{
    /**
     * Flextype Dependency Container
     */
    private $flextype;

    /**
     * Constructor
     */
    public function __construct($flextype)
    {
        $this->flextype = $flextype;
    }

    /**
     * Register Global variables in an extension
     */
    public function getGlobals()
    {
        return [
            'acl' => new AclTwig($this->flextype),
        ];
    }
}

class AclTwig
{
    /**
     * Flextype Dependency Container
     */
    private $flextype;

    /**
     * Constructor
     */
    public function __construct($flextype)
    {
        $this->flextype = $flextype;
    }

    public function isUserLoggedIn()
    {
        return $this->flextype->acl->isUserLoggedIn();
    }

    public function getUserLoggedInUsername()
    {
        return $this->flextype->acl->getUserLoggedInUsername();
    }

    public function getUserLoggedInRoles()
    {
        return $this->flextype->acl->getUserLoggedInRoles();
    }

    public function getUserLoggedInUuid()
    {
        return $this->flextype->acl->getUserLoggedInUuid();
    }

    public function isUserLoggedInRolesOneOf($roles)
    {
        return $this->flextype->acl->isUserLoggedInRolesOneOf($roles);
    }
}
