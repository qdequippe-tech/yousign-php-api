<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class UserOutput
{
    /**
     * Object's ID.
     *
     * @var string|null
     */
    protected $id;
    /**
     * User's firstname.
     *
     * @var string|null
     */
    protected $firstname;
    /**
     * User's lastname.
     *
     * @var string|null
     */
    protected $lastname;
    /**
     * User's email address.
     *
     * @var string|null
     */
    protected $email;
    /**
     * User's title.
     *
     * @var string|null
     */
    protected $title;
    /**
     * User's phone number (mobiles and landline telephones are supported). Phone number must be formatted to E164 (https://en.wikipedia.org/wiki/E.164) which includes the symbol '+' and the country code. For example : +33612131315. All countries are supported.
     *
     * @var string|null
     */
    protected $phone;
    /**
     * User's status.
     *
     * @var string|null
     */
    protected $status;
    /**
     * ID of the organization the user belongs to.
     *
     * @var string|null
     */
    protected $organization;
    /**
     * List of workspaces to which the user is connected and has access.
     *
     * @var UserWorkspaceOutput[]|null
     */
    protected $workspaces;
    /**
     * @var string|null
     */
    protected $permission;
    /**
     * @var UserGroup|null
     */
    protected $group;
    /**
     * Date of creation.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Date of last update.
     *
     * @var \DateTime|null
     */
    protected $updatedAt;
    /**
     * Defines if the User is deleted or not.
     *
     * @var bool|null
     */
    protected $deleted;
    /**
     * @var mixed|null
     */
    protected $config;
    /**
     * Internal usage, should not be used.
     *
     * @var string|null
     */
    protected $inweboUserRequest;
    /**
     * ID of SAML.
     *
     * @var string|null
     */
    protected $samlNameId;
    /**
     * ID of the default sign image.
     *
     * @var string|null
     */
    protected $defaultSignImage;
    /**
     * Defines if the notifications are enable ou disable for entities.
     *
     * @var UserOutputNotifications|null
     */
    protected $notifications;
    /**
     * Defines if the fast signature is available for the user on the Yousign application.
     *
     * @var bool|null
     */
    protected $fastSign;
    /**
     * User's full name.
     *
     * @var string|null
     */
    protected $fullName;

    /**
     * Object's ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Object's ID.
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * User's firstname.
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * User's firstname.
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * User's lastname.
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * User's lastname.
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * User's email address.
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * User's email address.
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * User's title.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * User's title.
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * User's phone number (mobiles and landline telephones are supported). Phone number must be formatted to E164 (https://en.wikipedia.org/wiki/E.164) which includes the symbol '+' and the country code. For example : +33612131315. All countries are supported.
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * User's phone number (mobiles and landline telephones are supported). Phone number must be formatted to E164 (https://en.wikipedia.org/wiki/E.164) which includes the symbol '+' and the country code. For example : +33612131315. All countries are supported.
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * User's status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * User's status.
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * ID of the organization the user belongs to.
     */
    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    /**
     * ID of the organization the user belongs to.
     */
    public function setOrganization(?string $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    /**
     * List of workspaces to which the user is connected and has access.
     *
     * @return UserWorkspaceOutput[]|null
     */
    public function getWorkspaces(): ?array
    {
        return $this->workspaces;
    }

    /**
     * List of workspaces to which the user is connected and has access.
     *
     * @param UserWorkspaceOutput[]|null $workspaces
     */
    public function setWorkspaces(?array $workspaces): self
    {
        $this->workspaces = $workspaces;

        return $this;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(?string $permission): self
    {
        $this->permission = $permission;

        return $this;
    }

    public function getGroup(): ?UserGroup
    {
        return $this->group;
    }

    public function setGroup(?UserGroup $group): self
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Date of creation.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Date of creation.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date of last update.
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Date of last update.
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Defines if the User is deleted or not.
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * Defines if the User is deleted or not.
     */
    public function setDeleted(?bool $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param mixed $config
     */
    public function setConfig($config): self
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Internal usage, should not be used.
     */
    public function getInweboUserRequest(): ?string
    {
        return $this->inweboUserRequest;
    }

    /**
     * Internal usage, should not be used.
     */
    public function setInweboUserRequest(?string $inweboUserRequest): self
    {
        $this->inweboUserRequest = $inweboUserRequest;

        return $this;
    }

    /**
     * ID of SAML.
     */
    public function getSamlNameId(): ?string
    {
        return $this->samlNameId;
    }

    /**
     * ID of SAML.
     */
    public function setSamlNameId(?string $samlNameId): self
    {
        $this->samlNameId = $samlNameId;

        return $this;
    }

    /**
     * ID of the default sign image.
     */
    public function getDefaultSignImage(): ?string
    {
        return $this->defaultSignImage;
    }

    /**
     * ID of the default sign image.
     */
    public function setDefaultSignImage(?string $defaultSignImage): self
    {
        $this->defaultSignImage = $defaultSignImage;

        return $this;
    }

    /**
     * Defines if the notifications are enable ou disable for entities.
     */
    public function getNotifications(): ?UserOutputNotifications
    {
        return $this->notifications;
    }

    /**
     * Defines if the notifications are enable ou disable for entities.
     */
    public function setNotifications(?UserOutputNotifications $notifications): self
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * Defines if the fast signature is available for the user on the Yousign application.
     */
    public function getFastSign(): ?bool
    {
        return $this->fastSign;
    }

    /**
     * Defines if the fast signature is available for the user on the Yousign application.
     */
    public function setFastSign(?bool $fastSign): self
    {
        $this->fastSign = $fastSign;

        return $this;
    }

    /**
     * User's full name.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * User's full name.
     */
    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }
}
