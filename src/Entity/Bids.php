<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity]
class Bids
{
    #[Id]
    #[GeneratedValue(strategy: "IDENTITY")]
    #[Column(type: "integer", nullable: false)]
    private ?int $id = null;

    #[Column(type: "decimal", precision: 10, scale: 2, nullable: false)]
    private ?string $amount = null;

    #[Column(type: "datetime", nullable: false)]
    private ?\DateTimeInterface $createdAt = null;

    #[Column(type: "datetime", nullable: false)]
    private ?\DateTimeInterface $updatedAt = null;

    #[ManyToOne(targetEntity: Users::class)]
    #[JoinColumn(name: "bidder_id", referencedColumnName: "id")]
    private ?Users $bidder = null;

    #[ManyToOne(targetEntity: Items::class)]
    #[JoinColumn(name: "item_id", referencedColumnName: "id")]
    private ?Items $item = null;

    #[Assert\NotBlank(message: 'Amount is required.')]
    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(?string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getBidder(): ?Users
    {
        return $this->bidder;
    }

    public function setBidder(?Users $bidder): self
    {
        $this->bidder = $bidder;

        return $this;
    }

    public function getItem(): ?Items
    {
        return $this->item;
    }

    public function setItem(?Items $item): self
    {
        $this->item = $item;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
