<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource(
)]

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDebutLocation = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateFinLocation = null;

    #[ORM\ManyToOne(inversedBy: 'locations')]
    private ?Clients $idClient = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Bijou $idBijoux = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebutLocation(): ?\DateTimeInterface
    {
        return $this->dateDebutLocation;
    }

    public function setDateDebutLocation(\DateTimeInterface $dateDebutLocation): static
    {
        $this->dateDebutLocation = $dateDebutLocation;

        return $this;
    }

    public function getDateFinLocation(): ?\DateTimeInterface
    {
        return $this->dateFinLocation;
    }

    public function setDateFinLocation(\DateTimeInterface $dateFinLocation): static
    {
        $this->dateFinLocation = $dateFinLocation;

        return $this;
    }

    public function getIdClient(): ?Clients
    {
        return $this->idClient;
    }

    public function setIdClient(?Clients $idClient): static
    {
        $this->idClient = $idClient;

        return $this;
    }

    public function getIdBijoux(): ?Bijou
    {
        return $this->idBijoux;
    }

    public function setIdBijoux(?Bijou $idBijoux): static
    {
        $this->idBijoux = $idBijoux;

        return $this;
    }
}
