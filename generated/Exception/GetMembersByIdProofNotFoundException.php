<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Exception;

class GetMembersByIdProofNotFoundException extends NotFoundException
{
    public function __construct()
    {
        parent::__construct('The member does not exist or the member have not signed yet.');
    }
}
