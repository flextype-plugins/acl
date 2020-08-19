<?php

declare(strict_types=1);

/**
 * Flextype (http://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Shortcodes;

use Thunder\Shortcode\Shortcode\ShortcodeInterface;

// Shortcode: [userLoggedInEmail]
$flextype->container('shortcode')->addHandler('userLoggedInEmail', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->container('acl')->getUserLoggedInEmail()) {
        return $flextype->container('acl')->getUserLoggedInEmail();
    }

    return '';
});

// Shortcode: [userLoggedInUuid]
$flextype->container('shortcode')->addHandler('userLoggedInUuid', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->container('acl')->getUserLoggedInUuid()) {
        return $flextype->container('acl')->getUserLoggedInUuid();
    }

    return '';
});

// Shortcode: [userLoggedInRoles]
$flextype->container('shortcode')->addHandler('userLoggedInRoles', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->container('acl')->getUserLoggedInRoles()) {
        return $flextype->container('acl')->getUserLoggedInRoles();
    }

    return '';
});

// Shortcode: [userLoggedIn]Private content here..[/userLoggedIn]
$flextype->container('shortcode')->addHandler('userLoggedIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->container('acl')->isUserLoggedIn()) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInRolesIn roles="admin, student"]Private content here..[/userLoggedInRolesIn]
$flextype->container('shortcode')->addHandler('userLoggedInRolesIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->container('acl')->isUserLoggedInRolesIn($s->getParameter('roles'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUuidIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]Private content here..[/userLoggedInUuidOneOf]
$flextype->container('shortcode')->addHandler('userLoggedInUuidIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->container('acl')->isUserLoggedInUuidIn($s->getParameter('uuids'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInEmailIn emails="jack@flexype.org, sam@flextype.org"]Private content here..[/userLoggedInUsernameOneOf]
$flextype->container('shortcode')->addHandler('userLoggedInEmailIn', static function (ShortcodeInterface $s) use ($flextype) {
    if ($flextype->container('acl')->isUserLoggedInEmailIn($s->getParameter('emails'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userNotLoggedIn]Content for not logged in user here..[/userNotLoggedIn]
$flextype->container('shortcode')->addHandler('userNotLoggedIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->container('acl')->isUserLoggedIn()) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInRolesNotIn roles="admin, student"]Private content here..[/userLoggedInRolesNotIn]
$flextype->container('shortcode')->addHandler('userLoggedInRolesNotIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->container('acl')->isUserLoggedInRolesNotIn($s->getParameter('roles'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInUuidNotIn uuids="ea7432a3-b2d5-4b04-b31d-1c5acc7a55e2, d549af27-79a0-44f2-b9b1-e82b47bf87e2"]Private content here..[/userLoggedInUuidNotIn]
$flextype->container('shortcode')->addHandler('userLoggedInUuidNotIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->container('acl')->isUserLoggedInUuidNotIn($s->getParameter('uuids'))) {
        return $s->getContent();
    }

    return '';
});

// Shortcode: [userLoggedInEmailNotIn emails="jack@flexype.org, sam@flextype.org"]Private content here..[/userLoggedInEmailNotIn]
$flextype->container('shortcode')->addHandler('userLoggedInEmailNotIn', static function (ShortcodeInterface $s) use ($flextype) {
    if (! $flextype->container('acl')->isUserLoggedInEmailsNotIn($s->getParameter('emails'))) {
        return $s->getContent();
    }

    return '';
});
