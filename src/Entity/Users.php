<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: "users")]
#[ORM\Entity]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "IDENTITY")]
    #[ORM\Column(type: "integer", nullable: false)]
    private int $id;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    private string $username;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    private string $password;

    #[ORM\Column(type: "string", length: 255, nullable: false)]
    private string $email;

    #[ORM\Column(type: "datetime", nullable: false)]
    private \DateTime $createdAt;

    #[ORM\Column(type: "datetime", nullable: false)]
    private \DateTime $updatedAt;

    #[ORM\ManyToMany(targetEntity: "Items", inversedBy: "user")]
    #[ORM\JoinTable(name: "watchlist",
   joinColumns: [#[ORM\JoinColumn(name: "user_id", referencedColumnName: "id")]],
       inverseJoinColumns: [#[ORM\JoinColumn(name: "item_id", referencedColumnName: "id")]]
    )]
    private array $item = [];
/**
     * Constructor
     */
    public function __construct()
    {
        $this->item = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Items>
     */
    public function getItem(): Collection
    {
        return $this->item;
    }

    public function addItem(Items $item): self
    {
        if (!$this->item->contains($item)) {
            $this->item->add($item);
        }

        return $this;
    }

    public function removeItem(Items $item): self
    {
        $this->item->removeElement($item);

        return $this;
    }

}
