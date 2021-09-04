<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;
use Twig\TwigFunction\TwigFunction;
use Atomastic\Macroable\Macroable;

use function acl;

class AclTwigExtension extends AbstractExtension
{
    /**
     * Callback for twig.
     *
     * @return array
     */
    public function getFunctions() : array
    {
        return [
            new TwigFunction('acl', function() { return new AclTwig(); }),
        ];
    }
}

class AclTwig
{
    use Macroable;

    /**
     * Check is user logged in
     *
     * @return bool true if user is logged in or false if not
     *
     * @access public
     */
    public function isUserLoggedIn(): bool
    {
        return acl()->isUserLoggedIn();
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
    public function isUserLoggedInRolesIn(string $roles): bool
    {
       return acl()->isUserLoggedInRolesIn($roles);
    }

    /**
     * Check is user logged in email in
     *
     * @param string $emails Email separated by comma.
     *
     * @return bool true if equal or false if not
     *
     * @access public
     */
    public function isUserLoggedInEmailIn(string $emails): bool
    {
        return acl()->isUserLoggedInEmailIn($emails);
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
    public function isUserLoggedInUuidIn(string $uuids): bool
    {
        return acl()->isUserLoggedInUuidIn($uuids);
    }

    /**
     * Get user logged in username
     *
     * @return string user logged in username
     *
     * @access public
     */
    public function getUserLoggedInEmail(): string
    {
        return acl()->getUserLoggedInEmail();
    }

    /**
     * Get user logged in roles
     *
     * @return string user logged in roles
     *
     * @access public
     */
    public function getUserLoggedInRoles(): string
    {
        return acl()->getUserLoggedInRoles();
    }

    /**
     * Get user logged in uuid
     *
     * @return string user logged in uuid
     *
     * @access public
     */
    public function getUserLoggedInUuid(): string
    {
        return acl()->getUserLoggedInUuid();
    }
}
