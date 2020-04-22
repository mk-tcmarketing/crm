<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
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
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $function;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Societe", inversedBy="societe")
     */
    private $societe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RendezVous", mappedBy="client", orphanRemoval=true)
     */
    private $rendezvous;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ChiffreAffaire", inversedBy="client")
     */
    private $chiffreAffaire;

    public function __construct()
    {
        $this->rendezvous = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFunction(): ?string
    {
        return $this->function;
    }

    public function setFunction(?string $function): self
    {
        $this->function = $function;

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

    public function getSociete(): ?Societe
    {
        return $this->societe;
    }

    public function setSociete(?Societe $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    /**
     * @return Collection|RendezVous[]
     */
    public function getRendezvous(): Collection
    {
        return $this->rendezvous;
    }

    public function addRendezvous(RendezVous $rendezvous): self
    {
        if (!$this->rendezvous->contains($rendezvous)) {
            $this->rendezvous[] = $rendezvous;
            $rendezvous->setRendezVous($this);
        }

        return $this;
    }

    public function removeRendezvous(RendezVous $rendezvous): self
    {
        if ($this->rendezvous->contains($rendezvous)) {
            $this->rendezvous->removeElement($rendezvous);
            // set the owning side to null (unless already changed)
            if ($rendezvous->getRendezVous() === $this) {
                $rendezvous->setRendezVous(null);
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s %s', $this->getNom(), $this->getPrenom());
    }

    public function getChiffreAffaire(): ?ChiffreAffaire
    {
        return $this->chiffreAffaire;
    }

    public function setChiffreAffaire(?ChiffreAffaire $chiffreAffaire): self
    {
        $this->chiffreAffaire = $chiffreAffaire;

        return $this;
    }
}
