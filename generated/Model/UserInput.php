<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Model;

class UserInput
{
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
     * User's email address (This field is allowed only during creation).
     *
     * @var string|null
     */
    protected $email;
    /**
     * User's job title.
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
     * @var string|null
     */
    protected $permission;
    /**
     * User's UserGroup.
     *
     * @var string|null
     */
    protected $group;
    /**
     * @var mixed|null
     */
    protected $config;
    /**
     * ID of file image.
     *
     * @var string|null
     */
    protected $defaultSignImage;
    /**
     * Defines if the notifications are enable ou disable for entities.
     *
     * @var UserInputNotifications|null
     */
    protected $notifications;

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
     * User's email address (This field is allowed only during creation).
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * User's email address (This field is allowed only during creation).
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * User's job title.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * User's job title.
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

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(?string $permission): self
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * User's UserGroup.
     */
    public function getGroup(): ?string
    {
        return $this->group;
    }

    /**
     * User's UserGroup.
     */
    public function setGroup(?string $group): self
    {
        $this->group = $group;

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
     * ID of file image.
     */
    public function getDefaultSignImage(): ?string
    {
        return $this->defaultSignImage;
    }

    /**
     * ID of file image.
     */
    public function setDefaultSignImage(?string $defaultSignImage): self
    {
        $this->defaultSignImage = $defaultSignImage;

        return $this;
    }

    /**
     * Defines if the notifications are enable ou disable for entities.
     */
    public function getNotifications(): ?UserInputNotifications
    {
        return $this->notifications;
    }

    /**
     * Defines if the notifications are enable ou disable for entities.
     */
    public function setNotifications(?UserInputNotifications $notifications): self
    {
        $this->notifications = $notifications;

        return $this;
    }
}
