<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class AclTwigExtension extends AbstractExtension implements GlobalsInterface
{
    /**
     * Constructor
     */
    public function __construct()
    {

    }

    /**
     * Register Global variables in an extension
     */
    public function getGlobals() : array
    {
        return [
            'acl' => new AclTwig(),
        ];
    }
}

class AclTwig
{
    /**
     * Flextype Application
     */


    /**
     * Constructor
     */
    public function __construct()
    {

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
        return flextype('acl')->isUserLoggedIn();
    }

    /**
     * Get user logged in username
     *
     * @return string user logged in username
     *
     * @access public
     */
    public function getUserLoggedInEmail() : string
    {
        return flextype('acl')->getUserLoggedInEmail();
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
        return flextype('acl')->getUserLoggedInRoles();
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
        return flextype('acl')->getUserLoggedInUuid();
    }

    /**
     * Check is user logged in roles in
     *
     * @param string $roles Roles separated by comma.
     *
     * @return bool true if equal or false if not
     *
     * @access public
     */
    public function isUserLoggedInRolesIn($roles) : bool
    {
        return flextype('acl')->isUserLoggedInRolesIn($roles);
    }

    /**
     * Check is user logged in emails in
     *
     * @param string $emails Emails separated by comma.
     *
     * @return bool true if equal or false if not
     *
     * @access public
     */
    public function isUserLoggedInEmailIn(string $emails) : bool
    {
        return flextype('acl')->isUserLoggedInEmailIn($emails);
    }

    /**
     * Check is user logged in uuid in
     *
     * @param string $uuids Uuids separated by comma.
     *
     * @return bool true if equal or false if not
     *
     * @access public
     */
    public function isUserLoggedInUuidIn(string $uuids) : bool
    {
        return flextype('acl')->isUserLoggedInUuidIn($uuids);
    }
}
