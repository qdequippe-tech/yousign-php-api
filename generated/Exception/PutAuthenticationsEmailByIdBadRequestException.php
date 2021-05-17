<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Exception;

class PutAuthenticationsEmailByIdBadRequestException extends BadRequestException
{
    private $authenticationsEmailIdPutResponse400;

    public function __construct(\Qdequippe\Yousign\Api\Model\AuthenticationsEmailIdPutResponse400 $authenticationsEmailIdPutResponse400)
    {
        parent::__construct('Code is not correct or expired', 400);
        $this->authenticationsEmailIdPutResponse400 = $authenticationsEmailIdPutResponse400;
    }

    public function getAuthenticationsEmailIdPutResponse400()
    {
        return $this->authenticationsEmailIdPutResponse400;
    }
}
