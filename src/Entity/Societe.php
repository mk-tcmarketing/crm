<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SocieteRepository")
 */
class Societe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contact;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Client", mappedBy="societe")
     */
    private $societe;

    public function __construct()
    {
        $this->societe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(?string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getSociete(): Collection
    {
        return $this->societe;
    }

    public function addSociete(Client $societe): self
    {
        if (!$this->societe->contains($societe)) {
            $this->societe[] = $societe;
            $societe->setSociete($this);
        }

        return $this;
    }

    public function removeSociete(Client $societe): self
    {
        if ($this->societe->contains($societe)) {
            $this->societe->removeElement($societe);
            // set the owning side to null (unless already changed)
            if ($societe->getSociete() === $this) {
                $societe->setSociete(null);
            }
        }

        return $this;
    }
}
