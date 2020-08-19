<?php

namespace Flextype\Plugin\Acl;

use Flextype\Component\Session\Session;

$flextype->container('emitter')->addListener('onEntryAfterInitialized', function() use ($flextype) {

    // Get current entry
    $entry = $flextype->container('entries')->entry;

    // Set ACL rules based on accounts uuids
    if (isset($entry['acl']['accounts']['uuids'])) {
        if (!$flextype->container('acl')->isUserLoggedInUuidsIn($entry['acl']['accounts']['uuids'])) {
            $flextype->container('entries')->entry = [];
        }
    }

    // Set ACL rules based on accounts emails
    if (isset($entry['acl']['accounts']['emails'])) {
        if (!$flextype->container('acl')->isUserLoggedInEmailsIn($entry['acl']['accounts']['emails'])) {
            $flextype->container('entries')->entry = [];
        }
    }

    // Set ACL rules based on accounts roles
    if (isset($entry['acl']['accounts']['roles'])) {
        if (!$flextype->container('acl')->isUserLoggedInRolesIn($entry['acl']['accounts']['roles'])) {
            $flextype->container('entries')->entry = [];
        }
    }
});
