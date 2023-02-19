<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Exception;

class PostProceduresByIdRemindNotFoundException extends NotFoundException
{
    public function __construct()
    {
        parent::__construct('Status 404');
    }
}
