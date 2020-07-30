<?php

declare(strict_types=1);

/**
 * Flextype (http://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

// Shortcode: [userLoggedInEmail]
$flextype['shortcode']->add('userLoggedInEmail', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->getUserLoggedInEmail()) {
        return $flextype->acl->getUserLoggedInEmail();
    }

    return '';
});

// Shortcode: [userLoggedInUuid]
$flextype['shortcode']->add('userLoggedInUuid', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->getUserLoggedInUuid()) {
        return $flextype->acl->getUserLoggedInUuid();
    }

    return '';
});

// Shortcode: [userLoggedInRoles]
$flextype['shortcode']->add('userLoggedInRoles', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->getUserLoggedInRoles()) {
        return $flextype->acl->getUserLoggedInRoles();
    }

    return '';
});

// Shortcode: [userLoggedIn]Private content here..[/userLoggedIn]
$flextype['shortcode']->add('userLoggedIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedIn()) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInRolesIn roles="admin, student"]Private content here..[/userLoggedInRolesIn]
$flextype['shortcode']->add('userLoggedInRolesIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedInRolesIn($s->getParameter('roles'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUuidIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]Private content here..[/userLoggedInUuidOneOf]
$flextype['shortcode']->add('userLoggedInUuidIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedInUuidIn($s->getParameter('uuids'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInEmailIn emails="jack@flexype.org, sam@flextype.org"]Private content here..[/userLoggedInUsernameOneOf]
$flextype['shortcode']->add('userLoggedInEmailIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->acl->isUserLoggedInEmailIn($s->getParameter('emails'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userNotLoggedIn]Content for not logged in user here..[/userNotLoggedIn]
$flextype['shortcode']->add('userNotLoggedIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->acl->isUserLoggedIn()) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInRolesNotIn roles="admin, student"]Private content here..[/userLoggedInRolesNotIn]
$flextype['shortcode']->add('userLoggedInRolesNotIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->acl->isUserLoggedInRolesNotIn($s->getParameter('roles'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUuidNotIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]Private content here..[/userLoggedInUuidNotIn]
$flextype['shortcode']->add('userLoggedInUuidNotIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->acl->isUserLoggedInUuidNotIn($s->getParameter('uuids'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInEmailNotIn emails="jack@flexype.org, sam@flextype.org"]Private content here..[/userLoggedInEmailNotIn]
$flextype['shortcode']->add('userLoggedInEmailNotIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->acl->isUserLoggedInEmailsNotIn($s->getParameter('emails'))) {
        return $s->getContent();
    }

    return '';
});
