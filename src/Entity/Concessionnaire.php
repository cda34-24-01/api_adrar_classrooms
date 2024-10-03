<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ConcessionnaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConcessionnaireRepository::class)]
#[ApiResource]
class Concessionnaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $groupe = null;

    #[ORM\Column]
    private ?int $adresse_numero = null;

    #[ORM\Column(length: 150)]
    private ?string $adresse_rue = null;

    #[ORM\Column(length: 100)]
    private ?string $adresse_ville = null;

    #[ORM\Column(length: 5)]
    private ?string $adresse_cp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getGroupe(): ?string
    {
        return $this->groupe;
    }

    public function setGroupe(string $groupe): static
    {
        $this->groupe = $groupe;

        return $this;
    }

    public function getAdresseNumero(): ?int
    {
        return $this->adresse_numero;
    }

    public function setAdresseNumero(int $adresse_numero): static
    {
        $this->adresse_numero = $adresse_numero;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresse_rue;
    }

    public function setAdresseRue(string $adresse_rue): static
    {
        $this->adresse_rue = $adresse_rue;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresse_ville;
    }

    public function setAdresseVille(string $adresse_ville): static
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }

    public function getAdresseCp(): ?string
    {
        return $this->adresse_cp;
    }

    public function setAdresseCp(string $adresse_cp): static
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }
}
