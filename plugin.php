<?php

declare(strict_types=1);

namespace Flextype\Plugin\Acl;

use Flextype\Plugin\Acl\Twig\Extension\AclTwigExtension;
use function is_file;
use function acl;

/**
 * Ensure vendor libraries exist
 */
! is_file($aclAutoload = __DIR__ . '/vendor/autoload.php') and exit('Please run: <i>composer install</i> for acl plugin');

/**
 * Register The Auto Loader
 *
 * Composer provides a convenient, automatically generated class loader for
 * our application. We just need to utilize it! We'll simply require it
 * into the script here so that we don't have to worry about manual
 * loading any of our classes later on. It feels nice to relax.
 * Register The Auto Loader
 */
$aclLoader = require_once $aclAutoload;

/**
 * Add ACL shortcode
 */
require_once __DIR__ . '/src/acl/core/Shortcodes/AclShortcode.php';

/**
 * Add ACL entries action
 */
require_once __DIR__ . '/src/acl/core/Entries/Actions/AclAction.php';

/**
 * Add ACL Service
 */
container()->set('acl', new Acl());

/**
 * Add ACL Twig Extension
 */
twig()->addExtension(new AclTwigExtension());