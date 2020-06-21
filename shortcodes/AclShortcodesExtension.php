<?php

declare(strict_types=1);

/**
 * Flextype (http://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

// Shortcode: [userLoggedInUsername]
$flextype['shortcodes']->addHandler('userLoggedInUsername', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->getUserLoggedInUsername()) {
        return $flextype->acl->getUserLoggedInUsername();
    }

    return '';
});

// Shortcode: [userLoggedInUuid]
$flextype['shortcodes']->addHandler('userLoggedInUuid', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->getUserLoggedInUuid()) {
        return $flextype->acl->getUserLoggedInUuid();
    }

    return '';
});

// Shortcode: [userLoggedInRoles]
$flextype['shortcodes']->addHandler('userLoggedInRoles', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->getUserLoggedInRoles()) {
        return $flextype->acl->getUserLoggedInRoles();
    }

    return '';
});

// Shortcode: [userLoggedIn]Private content here..[/userLoggedIn]
$flextype['shortcodes']->addHandler('userLoggedIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedIn()) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInRolesOneOf roles="admin, student"]Private content here..[/userLoggedInRolesOneOf]
$flextype['shortcodes']->addHandler('userLoggedInRolesOneOf', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedInRolesOneOf($s->getParameter('roles'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUuidOneOf uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]Private content here..[/userLoggedInUuidOneOf]
$flextype['shortcodes']->addHandler('userLoggedInUuidOneOf', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedInUuidOneOf($s->getParameter('uuids'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUsernameOneOf usernames="jack, sam"]Private content here..[/userLoggedInUsernameOneOf]
$flextype['shortcodes']->addHandler('userLoggedInUsernameOneOf', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedInUsernameOneOf($s->getParameter('usernames'))) {
        return $s->getContent();
    }

    return '';
});
