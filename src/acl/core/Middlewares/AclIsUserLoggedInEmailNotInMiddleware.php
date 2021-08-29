<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Middlewares;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

use function acl;

class AclIsUserLoggedInEmailNotInMiddleware
{
    /**
     * Middleware Settings
     */
    protected $settings;

    /**
     * Construct
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
    }

    /**
     * Invoke
     *
     * @param  ServerRequest  $request PSR-7 request
     * @param  RequestHandler $handler PSR-15 request handler
     */
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        if (! acl()->isUserLoggedInEmailIn($this->settings['emails'])) {
            return $handler->handle($request);
        }

        $response = new Response();
        $response->withHeader('Location', router()->pathFor($this->settings['redirect']));

        return $response;
    }
}
