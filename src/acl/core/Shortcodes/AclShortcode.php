<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

use function acl;

// Shortcode: [userLoggedInEmail]
parsers()->shortcodes()->addHandler('userLoggedInEmail', static function (ShortcodeInterface $s) {
    if (acl()->getUserLoggedInEmail()) {
        return acl()->getUserLoggedInEmail();
    }

    return '';
});

// Shortcode: [userLoggedInUuid]
parsers()->shortcodes()->addHandler('userLoggedInUuid', static function (ShortcodeInterface $s) {
    if (acl()->getUserLoggedInUuid()) {
        return acl()->getUserLoggedInUuid();
    }

    return '';
});

// Shortcode: [userLoggedInRoles]
parsers()->shortcodes()->addHandler('userLoggedInRoles', static function (ShortcodeInterface $s) {
    if (acl()->getUserLoggedInRoles()) {
        return acl()->getUserLoggedInRoles();
    }

    return '';
});

// Shortcode: [userLoggedIn]Private content here..[/userLoggedIn]
parsers()->shortcodes()->addHandler('userLoggedIn', static function (ShortcodeInterface $s) {
    if (acl()->isUserLoggedIn()) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInRolesIn roles="admin, student"]Private content here..[/userLoggedInRolesIn]
parsers()->shortcodes()->addHandler('userLoggedInRolesIn', static function (ShortcodeInterface $s) {
    if (acl()->isUserLoggedInRolesIn($s->getParameter('roles'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUuidIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]Private content here..[/userLoggedInUuidOneOf]
parsers()->shortcodes()->addHandler('userLoggedInUuidIn', static function (ShortcodeInterface $s) {
    if (acl()->isUserLoggedInUuidIn($s->getParameter('uuids'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInEmailIn emails="jack@flexype.org, sam@flextype.org"]Private content here..[/userLoggedInUsernameOneOf]
parsers()->shortcodes()->addHandler('userLoggedInEmailIn', static function (ShortcodeInterface $s) {
    if (acl()->isUserLoggedInEmailIn($s->getParameter('emails'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userNotLoggedIn]Content for not logged in user here..[/userNotLoggedIn]
parsers()->shortcodes()->addHandler('userNotLoggedIn', static function (ShortcodeInterface $s) {
    if (! acl()->isUserLoggedIn()) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInRolesNotIn roles="admin, student"]Private content here..[/userLoggedInRolesNotIn]
parsers()->shortcodes()->addHandler('userLoggedInRolesNotIn', static function (ShortcodeInterface $s) {
    if (! acl()->isUserLoggedInRolesNotIn($s->getParameter('roles'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUuidNotIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]Private content here..[/userLoggedInUuidNotIn]
parsers()->shortcodes()->addHandler('userLoggedInUuidNotIn', static function (ShortcodeInterface $s) {
    if (! acl()->isUserLoggedInUuidNotIn($s->getParameter('uuids'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInEmailNotIn emails="jack@flexype.org, sam@flextype.org"]Private content here..[/userLoggedInEmailNotIn]
parsers()->shortcodes()->addHandler('userLoggedInEmailNotIn', static function (ShortcodeInterface $s) {
    if (! acl()->isUserLoggedInEmailsNotIn($s->getParameter('emails'))) {
        return $s->getContent();
    }

    return '';
});
