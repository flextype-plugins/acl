<?php

namespace Flextype;

use Flextype\Component\Session\Session;

$flextype->emitter->addListener('onEntryAfterInitialized', function() use ($flextype) {

    // Get current entry
    $entry = $flextype->entries->entry;

    if (isset($entry['access']['accounts']['uuids'])) {
        if (!$flextype->acl->isUserLoggedInUuidsOneOf($entry['access']['accounts']['uuids'])) {
            $flextype->entries->entry = [];
        }
    }

    if (isset($entry['access']['accounts']['usernames'])) {
        if (!$flextype->acl->isUserLoggedInUsernameOneOf($entry['access']['accounts']['usernames'])) {
            $flextype->entries->entry = [];
        }
    }

    if (isset($entry['access']['accounts']['roles'])) {
        if (!$flextype->acl->isUserLoggedInRolesOneOf($entry['access']['accounts']['roles'])) {
            $flextype->entries->entry = [];
        }
    }
});
