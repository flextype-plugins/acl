<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Acl;

use function array_intersect;
use function array_map;
use function explode;
use function in_array;
use function session;

class Acl
{
    /**
     * Check is user logged in
     *
     * @return bool true if user is logged in or false if not
     *
     * @access public
     */
    public function isUserLoggedIn(): bool
    {
        if (session()->has('user_logged_in')) {
            return true;
        }

        return false;
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
        if (
            ! empty(array_intersect(
                array_map('trim', explode(',', $roles)),
                array_map('trim', explode(',', $this->getUserLoggedInRoles()))
            ))
        ) {
            return true;
        }

        return false;
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
        if (in_array($this->isUserLoggedInEmail(), array_map('trim', explode(',', $emails)))) {
            return true;
        }

        return false;
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
        if (in_array($this->getUserLoggedInUuid(), array_map('trim', explode(',', $uuids)))) {
            return true;
        }

        return false;
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
        return session()->has('user_email') ? session()->get('user_email') : '';
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
        return session()->has('user_roles') ? session()->get('user_roles') : '';
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
        return session()->has('user_uuid') ? session()->get('user_uuid') : '';
    }

    /**
     * Set user logged in state
     *
     * @param bool $logged_in Logged in state for logged in user.
     *
     * @access public
     */
    public function setUserLoggedIn(bool $logged_in): void
    {
        session()->set('user_logged_in', $logged_in);
    }

    /**
     * Set user logged in uuid
     *
     * @param string $uuid Uuid for logged in user.
     *
     * @access public
     */
    public function setUserLoggedInUuid(string $uuid): void
    {
        session()->set('user_uuid', $uuid);
    }

    /**
     * Set user logged in email
     *
     * @param string $email Email for logged in user.
     *
     * @access public
     */
    public function setUserLoggedInEmail(string $email): void
    {
        session()->set('user_email', $email);
    }

    /**
     * Set user logged in roles
     *
     * @param string $roles Roles for logged in user.
     *
     * @access public
     */
    public function setUserLoggedInRoles(string $roles): void
    {
        session()->set('user_roles', $roles);
    }
}
