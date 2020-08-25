<?php

namespace Flextype\Plugin\Acl;

use Flextype\Component\Session\Session;

flextype('emitter')->addListener('onEntryAfterInitialized', function() {

    // Get current entry
    $entry = flextype('entries')->entry;

    // Set ACL rules based on accounts uuids
    if (isset($entry['acl']['accounts']['uuids'])) {
        if (!flextype('acl')->isUserLoggedInUuidsIn($entry['acl']['accounts']['uuids'])) {
            flextype('entries')->entry = [];
        }
    }

    // Set ACL rules based on accounts emails
    if (isset($entry['acl']['accounts']['emails'])) {
        if (!flextype('acl')->isUserLoggedInEmailsIn($entry['acl']['accounts']['emails'])) {
            flextype('entries')->entry = [];
        }
    }

    // Set ACL rules based on accounts roles
    if (isset($entry['acl']['accounts']['roles'])) {
        if (!flextype('acl')->isUserLoggedInRolesIn($entry['acl']['accounts']['roles'])) {
            flextype('entries')->entry = [];
        }
    }
});
