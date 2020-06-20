<?php

namespace Flextype;

use Flextype\Component\Session\Session;

$flextype->emitter->addListener('onEntryAfterInitialized', function() use ($flextype) {

    // Get current entry
    $entry = $flextype->entries->entry;

    // Set ACL rules based on accounts uuids
    if (isset($entry['acl']['accounts']['uuids'])) {
        if (!$flextype->acl->isUserLoggedInUuidsOneOf($entry['acl']['accounts']['uuids'])) {
            $flextype->entries->entry = [];
        }
    }

    // Set ACL rules based on accounts usernames
    if (isset($entry['acl']['accounts']['usernames'])) {
        if (!$flextype->acl->isUserLoggedInUsernameOneOf($entry['acl']['accounts']['usernames'])) {
            $flextype->entries->entry = [];
        }
    }

    // Set ACL rules based on accounts roles
    if (isset($entry['acl']['accounts']['roles'])) {
        if (!$flextype->acl->isUserLoggedInRolesOneOf($entry['acl']['accounts']['roles'])) {
            $flextype->entries->entry = [];
        }
    }
});
