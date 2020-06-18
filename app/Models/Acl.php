<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype;

use Flextype\Component\Session\Session;
use function array_intersect;
use function array_map;
use function explode;
use function in_array;

class Acl extends Container
{
    public function isUserLoggedIn() : bool
    {
        if (Session::exists('account_is_user_logged_in')) {
            return true;
        }

        return false;
    }

    public function isUserLoggedInRolesOneOf(string $roles) : bool
    {
        if (! empty(array_intersect(
            array_map('trim', explode(',', $roles)),
            array_map('trim', explode(',', $this->getUserLoggedInRoles()))
        ))) {
            return true;
        }

        return false;
    }

    public function isUserLoggedInUsernameOneOf(string $usernames) : bool
    {
        if (in_array($this->getUserLoggedInUsername(), array_map('trim', explode(',', $usernames)))) {
            return true;
        }

        return false;
    }

    public function isUserLoggedInUuidOneOf(string $uuids) : bool
    {
        if (in_array($this->getUserLoggedInUuid(), array_map('trim', explode(',', $uuids)))) {
            return true;
        }

        return false;
    }

    public function getUserLoggedInUsername() : string
    {
        return Session::exists('account_username') ? Session::get('account_username') : '';
    }

    public function getUserLoggedInRoles() : string
    {
        return Session::exists('account_roles') ? Session::get('account_roles') : '';
    }

    public function getUserLoggedInUuid() : string
    {
        return Session::exists('account_uuid') ? Session::get('account_uuid') : '';
    }
}
