<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AppelRepository")
 */
class Appel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $repense;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\RendezVous")
     */
    private $rendez_vous;

    public function __construct()
    {
        $this->rendez_vous = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getRepense(): ?string
    {
        return $this->repense;
    }

    public function setRepense(string $repense): self
    {
        $this->repense = $repense;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return sprintf('%s', $this->getId());
    }

    /**
     * @return Collection|RendezVous[]
     */
    public function getRendezVous(): Collection
    {
        return $this->rendez_vous;
    }

    public function addRendezVous(RendezVous $rendezVous): self
    {
        if (!$this->rendez_vous->contains($rendezVous)) {
            $this->rendez_vous[] = $rendezVous;
        }

        return $this;
    }

    public function removeRendezVous(RendezVous $rendezVous): self
    {
        if ($this->rendez_vous->contains($rendezVous)) {
            $this->rendez_vous->removeElement($rendezVous);
        }

        return $this;
    }

}
