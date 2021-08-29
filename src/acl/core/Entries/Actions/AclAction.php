<?php

namespace Flextype\Plugin\Acl\Entries\Actions;

emitter()->addListener('onEntriesFetchSingleHasResult', function() {

    // Get current entry
    $entry = entries()->registry()->get('fetch.data');

    // Set ACL rules based on accounts uuids
    if (isset($entry['acl']['accounts']['uuids'])) {
        if (!acl()->isUserLoggedInUuidsIn($entry['acl']['accounts']['uuids'])) {
            entries()->registry()->set('fetch.data', []);
        }
    }

    // Set ACL rules based on accounts emails
    if (isset($entry['acl']['accounts']['emails'])) {
        if (!acl()->isUserLoggedInEmailsIn($entry['acl']['accounts']['emails'])) {
            entries()->registry()->set('fetch.data', []);
        }
    }

    // Set ACL rules based on accounts roles
    if (isset($entry['acl']['accounts']['roles'])) {
        if (!acl()->isUserLoggedInRolesIn($entry['acl']['accounts']['roles'])) {
            entries()->registry()->set('fetch.data', []);
        }
    }
});
