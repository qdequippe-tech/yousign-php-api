<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class MemberInput
{
    /**
     * ID of the user in your companies. Informations about the member will be duplicate (first name, last name, email and phone number).

     *
     * @var string|null
     */
    protected $user;
    /**
     * Type of a member. "signer" to sign documents (legally) and "validator" to validate documents.
     *
     * @var string|null
     */
    protected $type = 'signer';
    /**
     * Firstname of an external member. Required if user field is blank.
     *
     * @var string|null
     */
    protected $firstname;
    /**
     * Lastname of an external member. Required if user field is blank.
     *
     * @var string|null
     */
    protected $lastname;
    /**
     * Email of an external member. Required if user field is blank.
     *
     * @var string|null
     */
    protected $email;
    /**
     * Phone of an external member. Required if user field is blank.
     *
     * @var string|null
     */
    protected $phone;
    /**
     * If the procedure have the boolean "ordered" at true, you can define position of the order to invite your members to sign.
     *
     * @var int|null
     */
    protected $position;
    /**
     * @var FileObjectInput[]|null
     */
    protected $fileObjects;
    /**
     * Procedure id reference.
     *
     * @var string|null
     */
    protected $procedure;
    /**
     * @var string|null
     */
    protected $operationLevel;
    /**
     * @var string[]|null
     */
    protected $operationCustomModes;
    /**
     * @var OperationModeSmsConfiguration|null
     */
    protected $operationModeSmsConfig;

    /**
     * ID of the user in your companies. Informations about the member will be duplicate (first name, last name, email and phone number).

    Required if none of fields above are specified.
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * ID of the user in your companies. Informations about the member will be duplicate (first name, last name, email and phone number).

    Required if none of fields above are specified.
     */
    public function setUser(?string $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Type of a member. "signer" to sign documents (legally) and "validator" to validate documents.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of a member. "signer" to sign documents (legally) and "validator" to validate documents.
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Firstname of an external member. Required if user field is blank.
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Firstname of an external member. Required if user field is blank.
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Lastname of an external member. Required if user field is blank.
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Lastname of an external member. Required if user field is blank.
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Email of an external member. Required if user field is blank.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Email of an external member. Required if user field is blank.
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Phone of an external member. Required if user field is blank.
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Phone of an external member. Required if user field is blank.
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * If the procedure have the boolean "ordered" at true, you can define position of the order to invite your members to sign.
    When the first member have signed, the second will be invited, etc...
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * If the procedure have the boolean "ordered" at true, you can define position of the order to invite your members to sign.
    When the first member have signed, the second will be invited, etc...
     */
    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return FileObjectInput[]|null
     */
    public function getFileObjects(): ?array
    {
        return $this->fileObjects;
    }

    /**
     * @param FileObjectInput[]|null $fileObjects
     */
    public function setFileObjects(?array $fileObjects): self
    {
        $this->fileObjects = $fileObjects;

        return $this;
    }

    /**
     * Procedure id reference.
     */
    public function getProcedure(): ?string
    {
        return $this->procedure;
    }

    /**
     * Procedure id reference.
     */
    public function setProcedure(?string $procedure): self
    {
        $this->procedure = $procedure;

        return $this;
    }

    public function getOperationLevel(): ?string
    {
        return $this->operationLevel;
    }

    public function setOperationLevel(?string $operationLevel): self
    {
        $this->operationLevel = $operationLevel;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getOperationCustomModes(): ?array
    {
        return $this->operationCustomModes;
    }

    /**
     * @param string[]|null $operationCustomModes
     */
    public function setOperationCustomModes(?array $operationCustomModes): self
    {
        $this->operationCustomModes = $operationCustomModes;

        return $this;
    }

    public function getOperationModeSmsConfig(): ?OperationModeSmsConfiguration
    {
        return $this->operationModeSmsConfig;
    }

    public function setOperationModeSmsConfig(?OperationModeSmsConfiguration $operationModeSmsConfig): self
    {
        $this->operationModeSmsConfig = $operationModeSmsConfig;

        return $this;
    }
}
