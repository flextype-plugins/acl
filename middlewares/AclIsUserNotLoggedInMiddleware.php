<?php

declare(strict_types=1);

/**
 * Flextype (http://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Middlewares;

use Flextype\App\Foundation\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AclIsUserNotLoggedInMiddleware extends Container
{
    /**
     * Middleware Settings
     */
    protected $settings;

    /**
     * __construct
     */
    public function __construct($settings)
    {
        parent::__construct($settings['container']);

        $this->settings = $settings;
    }

    /**
     * __invoke
     *
     * @param Request  $request  PSR7 request
     * @param Response $response PSR7 response
     * @param callable $next     Next middleware
     */
    public function __invoke(Request $request, Response $response, callable $next) : Response
    {
        if (!$this->acl->isUserLoggedIn()) {
            $response = $next($request, $response);
        } else {
            $response = $response->withRedirect($this->router->pathFor($this->settings['redirect']));
        }

        return $response;
    }
}
