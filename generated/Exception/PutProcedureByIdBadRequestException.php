<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Exception;

class PutProcedureByIdBadRequestException extends BadRequestException
{
    public function __construct()
    {
        parent::__construct('Status 400');
    }
}
