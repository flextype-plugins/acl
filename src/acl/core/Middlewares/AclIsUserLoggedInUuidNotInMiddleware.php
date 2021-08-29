<?php

declare(strict_types=1);

/**
 * Flextype (https://flextype.org)
 * Founded by Sergey Romanenko and maintained by Flextype Community.
 */

namespace Flextype\Plugin\Acl\Middlewares;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function acl;

class AclIsUserLoggedInUuidNotInMiddleware
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
     * 
     * @return Response
     */
    public function __invoke(RequestHandler $request, RequestHandler $handler): Response
    {
        if (! acl()->isUserLoggedInUuidIn($this->settings['uuids'])) {
            $response = $handler->handle($request);
            return $response;
        } else {
            $response = new Response();
            $response->withHeader('Location', router()->pathFor($this->settings['redirect']));
            return $response;
        }
    }
}
