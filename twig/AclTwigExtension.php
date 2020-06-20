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

    /**
     * Check is user logged in
     *
     * @return bool true if user is logged in or false if not
     *
     * @access public
     */
    public function isUserLoggedIn() : bool
    {
        return $this->flextype->acl->isUserLoggedIn();
    }

    /**
     * Get user logged in username
     *
     * @return string user logged in username
     *
     * @access public
     */
    public function getUserLoggedInUsername() : string
    {
        return $this->flextype->acl->getUserLoggedInUsername();
    }

    /**
     * Get user logged in roles
     *
     * @return string user logged in roles
     *
     * @access public
     */
    public function getUserLoggedInRoles() : string
    {
        return $this->flextype->acl->getUserLoggedInRoles();
    }

    /**
     * Get user logged in uuid
     *
     * @return string user logged in uuid
     *
     * @access public
     */
    public function getUserLoggedInUuid() : string
    {
        return $this->flextype->acl->getUserLoggedInUuid();
    }

    /**
     * Check is user logged in roles one of
     *
     * @param string $roles Roles separated by comma.
     *
     * @return bool true if equal or false if not
     *
     * @access public
     */
    public function isUserLoggedInRolesOneOf($roles) : bool
    {
        return $this->flextype->acl->isUserLoggedInRolesOneOf($roles);
    }

    /**
     * Check is user logged in usernames one of
     *
     * @param string $usernames Usernames separated by comma.
     *
     * @return bool true if equal or false if not
     *
     * @access public
     */
    public function isUserLoggedInUsernameOneOf(string $usernames) : bool
    {
        return $this->flextype->acl->isUserLoggedInUsernameOneOf($usernames);
    }

    /**
     * Check is user logged in uuid one of
     *
     * @param string $uuids Uuids separated by comma.
     *
     * @return bool true if equal or false if not
     *
     * @access public
     */
    public function isUserLoggedInUuidOneOf(string $uuids) : bool
    {
        return $this->flextype->acl->isUserLoggedInUuidOneOf($uuids);
    }
}
