<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

if (! function_exists('acl')) {
    /**
     * Get Acl Service.
     */
    function acl()
    {
        return container()->get('acl');
    }
}