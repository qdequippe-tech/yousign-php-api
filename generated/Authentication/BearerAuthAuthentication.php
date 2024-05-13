<?php

namespace Qdequippe\Yousign\Api\Authentication;

use Jane\Component\OpenApiRuntime\Client\AuthenticationPlugin;
use Psr\Http\Message\RequestInterface;

class BearerAuthAuthentication implements AuthenticationPlugin
{
    private $token;

    public function __construct(string $token)
    {
        $this->{'token'} = $token;
    }

    public function authentication(RequestInterface $request): RequestInterface
    {
        $header = sprintf('Bearer %s', $this->{'token'});

        return $request->withHeader('Authorization', $header);
    }

    public function getScope(): string
    {
        return 'bearerAuth';
    }
}
