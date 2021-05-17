<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api;

class Client extends \Qdequippe\Yousign\Api\Runtime\Client\Client
{
    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\OrganizationOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getOrganizations(array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetOrganizations($headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\WorkspaceOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getWorkspaces(array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetWorkspaces($headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\UserOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getUsers(array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetUsers($headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\UserInput $body
     * @param array                                  $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\UserOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postUser(Model\UserInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostUser($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteUserById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\DeleteUserById($id, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\UserOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getUserById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetUserById($id, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\UserInput $body
     * @param array                                  $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\UserOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putUserById(string $id, Model\UserInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutUserById($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\UserGroup[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getUserGroups(array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetUserGroups($headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\UserGroup|\Psr\Http\Message\ResponseInterface|null
     */
    public function getUserGroupById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetUserGroupById($id, $headerParameters), $fetch);
    }

    /**
     * Used to upload a file in base64 on our platform.
     *
     * @param \Qdequippe\Yousign\Api\Model\FileInput $body
     * @param array                                  $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\FileOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postFile(Model\FileInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostFile($body, $headerParameters), $fetch);
    }

    /**
     * Returns all the information regarding the File but without its content (for performance issue).
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\FileOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getFileById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetFileById($id, $headerParameters), $fetch);
    }

    /**
     * Used to get the base64 content of a file.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function getFilesByIdDownload(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetFilesByIdDownload($id, $headerParameters), $fetch);
    }

    /**
     * Duplicate a file. It will be create a clone of this file, with a new ID.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\FileOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postFilesByIdDuplicate(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostFilesByIdDuplicate($id, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $status Return Procedure list based on the status for each Procedure
     *     @var bool $template Used to get Procedure template list
     *     @var array $members Get Procedure list for given members (paraph mode)
     *     @var string $itemsPerPage Number of items per page for the pagination
     *     @var bool $pagination Enable the pagination
     *     @var int $page Page of the pagination
     *     @var string $name Filter by name (contains)
     *     @var string $members.firstname Filter by member firstname (contains)
     *     @var string $members.lastname Filter by member lastname (contains)
     *     @var string $members.phone Filter by member phone (contains)
     *     @var string $members.email Filter by member email (contains)
     *     @var string $files.name Filter by file name (contains)
     *     @var array $createdAt Filter by creation date

     *     @var array $updatedAt Filter by update date

     *     @var array $expiresAt Filter by expire date

     *     @var string $order[createdAt] Order by createdAt

     * }
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ProcedureOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getProcedures(array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetProcedures($queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ProcedureInput $body
     * @param array                                       $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PostProcedureBadRequestException
     *
     * @return \Qdequippe\Yousign\Api\Model\ProcedureOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postProcedure(Model\ProcedureInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostProcedure($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteProcedureById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\DeleteProcedureById($id, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\GetProcedureByIdNotFoundException
     *
     * @return \Qdequippe\Yousign\Api\Model\ProcedureOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getProcedureById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetProcedureById($id, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ProcedureInput $body
     * @param array                                       $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PutProcedureByIdBadRequestException
     * @throws \Qdequippe\Yousign\Api\Exception\PutProcedureByIdNotFoundException
     *
     * @return \Qdequippe\Yousign\Api\Model\ProcedureOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putProcedureById(string $id, Model\ProcedureInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutProcedureById($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ProcedureDuplicateInput $body
     * @param array                                                $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PostProceduresByIdDuplicateNotFoundException
     *
     * @return \Qdequippe\Yousign\Api\Model\ProcedureOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postProceduresByIdDuplicate(string $id, Model\ProcedureDuplicateInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostProceduresByIdDuplicate($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $status Return Procedure list based on the status for each Procedure
     *     @var string $name Filter by name (contains)
     *     @var string $members.firstname Filter by member firstname (contains)
     *     @var string $members.lastname Filter by member lastname (contains)
     *     @var string $members.phone Filter by member phone (contains)
     *     @var string $members.email Filter by member email (contains)
     *     @var string $files.name Filter by file name (contains)
     *     @var array $createdAt Filter by creation date

     *     @var array $updatedAt Filter by update date

     *     @var array $expiresAt Filter by expire date

     *     @var string $order[createdAt] Order by attribut
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function getExportProcedure(array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetExportProcedure($queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ProcedureRemindInput $body
     * @param array                                             $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PostProceduresByIdRemindNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function postProceduresByIdRemind(string $id, Model\ProcedureRemindInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostProceduresByIdRemind($id, $body, $headerParameters), $fetch);
    }

    /**
     * Get a Procedure proof file.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function getProceduresByIdProof(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetProceduresByIdProof($id, $headerParameters), $fetch);
    }

    /**
     * Returns the list of Members of a organization.
     *
     * @param array $queryParameters {
     *
     *     @var string $procedure
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\MemberOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getMembers(array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetMembers($queryParameters, $headerParameters), $fetch);
    }

    /**
     * Create a new member.
     *
     * @param \Qdequippe\Yousign\Api\Model\MemberInput $body
     * @param array                                    $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\MemberOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postMember(Model\MemberInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostMember($body, $headerParameters), $fetch);
    }

    /**
     * Delete a member.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteMemberById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\DeleteMemberById($id, $headerParameters), $fetch);
    }

    /**
     * Edit a member.
     *
     * @param \Qdequippe\Yousign\Api\Model\MemberInput $body
     * @param array                                    $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\MemberOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putMemberById(string $id, Model\MemberInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutMemberById($id, $body, $headerParameters), $fetch);
    }

    /**
     * Get a proof file of a member.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\GetMembersByIdProofNotFoundException
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function getMembersByIdProof(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetMembersByIdProof($id, $headerParameters), $fetch);
    }

    /**
     * Create a new fileObject.
     *
     * @param \Qdequippe\Yousign\Api\Model\FileObjectInput $body
     * @param array                                        $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\FileObjectOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postFileObject(Model\FileObjectInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostFileObject($body, $headerParameters), $fetch);
    }

    /**
     * Delete a File Object.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteFileObjectById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\DeleteFileObjectById($id, $headerParameters), $fetch);
    }

    /**
     * Get a File Object.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\FileObjectOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getFileObjectById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetFileObjectById($id, $headerParameters), $fetch);
    }

    /**
     * Update a File Object.
     *
     * @param \Qdequippe\Yousign\Api\Model\FileObjectInput $body
     * @param array                                        $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\FileObjectOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putFileObjectById(string $id, Model\FileObjectInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutFileObjectById($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\OperationInput $body
     * @param array                                       $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\OperationOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postOperation(Model\OperationInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostOperation($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\OperationOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getOperationById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetOperationById($id, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\AuthenticationInweboOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getAuthenticationsInweboById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetAuthenticationsInweboById($id, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\AuthenticationInweboOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putAuthenticationsInweboById(string $id, \stdClass $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutAuthenticationsInweboById($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\AuthenticationSmsOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getAuthenticationsSmsById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetAuthenticationsSmsById($id, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PutAuthenticationsSmsByIdBadRequestException
     *
     * @return \Qdequippe\Yousign\Api\Model\AuthenticationSmsOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putAuthenticationsSmsById(string $id, \stdClass $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutAuthenticationsSmsById($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\AuthenticationEmailOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getAuthenticationsEmailById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetAuthenticationsEmailById($id, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PutAuthenticationsEmailByIdBadRequestException
     *
     * @return \Qdequippe\Yousign\Api\Model\AuthenticationEmailOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putAuthenticationsEmailById(string $id, \stdClass $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutAuthenticationsEmailById($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $member id of member (required for anonymous)
     *     @var string $procedure id of procedure (required if the member attribut is not set)
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ConsentProcessOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getConsentProcesses(array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetConsentProcesses($queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ConsentProcessInput $body
     * @param array                                            $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ConsentProcessOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postConsentProcess(Model\ConsentProcessInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostConsentProcess($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteConsentProcessById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\DeleteConsentProcessById($id, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $member id of member (required for anonymous)
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ConsentProcessOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getConsentProcessById(string $id, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetConsentProcessById($id, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ConsentProcessInput $body
     * @param array                                            $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ConsentProcessOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putConsentProcessById(string $id, Model\ConsentProcessInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutConsentProcessById($id, $body, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $member id of member (required for anonymous)
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ConsentProcessValueOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getConsentProcessValueById(string $id, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetConsentProcessValueById($id, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $member id of member
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ConsentProcessValueOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getConsentProcessValue(array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetConsentProcessValue($queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ConsentProcessValueInput $body
     * @param array                                                 $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\ConsentProcessValueOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postConsentProcessValue(Model\ConsentProcessValueInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostConsentProcessValue($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getSignatureUis(array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetSignatureUis($headerParameters), $fetch);
    }

    /**
     * Here is the url format to build on your side to get a custom signature interface with your settings :.
     *
     * @param \Qdequippe\Yousign\Api\Model\SignatureUiInput $body
     * @param array                                         $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postSignatureUi(Model\SignatureUiInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostSignatureUi($body, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $id Id of the signature ui
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteSignatureUiById(string $id, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\DeleteSignatureUiById($id, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $id id of a signature ui
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getSignatureUiById(string $id, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetSignatureUiById($id, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $id id of signature ui to update
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiInputUpdate|\Psr\Http\Message\ResponseInterface|null
     */
    public function putSignatureUiById(string $id, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutSignatureUiById($id, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Only usefull if you use a filter with name or signatureUI.
     *
     * @param array $queryParameters {
     *
     *     @var string $name Filtering on name of signature ui labels
     *     @var string $signatureUi Filtering on id of signature ui resource
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiLabelOutput[]|\Psr\Http\Message\ResponseInterface|null
     */
    public function getSignatureUiLabels(array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetSignatureUiLabels($queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\SignatureUiLabelInput $body
     * @param array                                              $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiLabelOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postSignatureUiLabel(Model\SignatureUiLabelInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostSignatureUiLabel($body, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $id Id of signature ui label
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     */
    public function deleteSignatureUiLabelById(string $id, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\DeleteSignatureUiLabelById($id, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     *
     *     @var string $id id of signature ui label
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiLabelOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getSignatureUiLabelById(string $id, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetSignatureUiLabelById($id, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\SignatureUiLabelInput $body
     * @param array                                              $queryParameters {
     *
     *     @var string $id Id of signature ui labels
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiLabelOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function putSignatureUiLabelById(string $id, Model\SignatureUiLabelInput $body, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PutSignatureUiLabelById($id, $body, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\ServerStampInput $body
     * @param array                                         $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PostServerStampBadRequestException
     *
     * @return \Qdequippe\Yousign\Api\Model\ServerStampOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postServerStamp(Model\ServerStampInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostServerStamp($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\GetServerStampByIdNotFoundException
     *
     * @return \Qdequippe\Yousign\Api\Model\ServerStampOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getServerStampById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetServerStampById($id, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\CheckDocumentIdentitiesInput $body
     * @param array                                                     $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\CheckDocumentIdentitiesOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postCheckDocumentIdentity(Model\CheckDocumentIdentitiesInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostCheckDocumentIdentity($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\CheckDocumentIdentitiesOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getCheckDocumentIdentityById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetCheckDocumentIdentityById($id, $headerParameters), $fetch);
    }

    /**
     * @param \Qdequippe\Yousign\Api\Model\CheckDocumentBankAccountsInput $body
     * @param array                                                       $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws \Qdequippe\Yousign\Api\Exception\PostCheckDocumentBankAccountBadRequestException
     *
     * @return \Qdequippe\Yousign\Api\Model\CheckDocumentBankAccountsOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function postCheckDocumentBankAccount(Model\CheckDocumentBankAccountsInput $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\PostCheckDocumentBankAccount($body, $headerParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return \Qdequippe\Yousign\Api\Model\CheckDocumentBankAccountsOutput|\Psr\Http\Message\ResponseInterface|null
     */
    public function getCheckDocumentBankAccountById(string $id, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \Qdequippe\Yousign\Api\Endpoint\GetCheckDocumentBankAccountById($id, $headerParameters), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [])
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = [];
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUrlFactory()->createUri('https://api.yousign.com');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            if (\count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $serializer = new \Symfony\Component\Serializer\Serializer([new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \Qdequippe\Yousign\Api\Normalizer\JaneObjectNormalizer()], [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
