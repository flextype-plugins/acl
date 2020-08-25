<?php

declare(strict_types=1);

/**
 * @link https://flextype.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flextype\Plugin\Acl;

use Flextype\Plugin\Acl\Models\Acl;
use Flextype\Plugin\Acl\Twig\AclTwigExtension;

/**
 * Add ACL Model to Flextype container
 */
flextype()->container()['acl'] = static function () {
    return new Acl();
};

/**
 * Add ACL Twig Extension to Flextype container
 */
flextype('twig')->addExtension(new AclTwigExtension());
