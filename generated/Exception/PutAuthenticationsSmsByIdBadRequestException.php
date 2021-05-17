<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Exception;

class PutAuthenticationsSmsByIdBadRequestException extends BadRequestException
{
    private $authenticationsSmsIdPutResponse400;

    public function __construct(\Qdequippe\Yousign\Api\Model\AuthenticationsSmsIdPutResponse400 $authenticationsSmsIdPutResponse400)
    {
        parent::__construct('Code is not correct or expired', 400);
        $this->authenticationsSmsIdPutResponse400 = $authenticationsSmsIdPutResponse400;
    }

    public function getAuthenticationsSmsIdPutResponse400()
    {
        return $this->authenticationsSmsIdPutResponse400;
    }
}
