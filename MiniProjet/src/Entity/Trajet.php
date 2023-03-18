<?php

namespace App\Entity;

use App\Repository\TrajetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TrajetRepository::class)
 */
class Trajet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="departs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $villeDepart;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $villeArrivee;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $conducteurs;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="trajets")
     */
    private $passagers;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlacesRestantes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modeleVoiture;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDepart;

    /**
     * @ORM\ManyToMany(targetEntity=Reservation::class, mappedBy="trajets")
     */
    private $reservations;

    public function __construct()
    {
        $this->passagers = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVilleDepart(): ?Ville
    {
        return $this->villeDepart;
    }

    public function setVilleDepart(?Ville $villeDepart): self
    {
        $this->villeDepart = $villeDepart;

        return $this;
    }

    public function getVilleArrivee(): ?Ville
    {
        return $this->villeArrivee;
    }

    public function setVilleArrivee(?Ville $villeArrivee): self
    {
        $this->villeArrivee = $villeArrivee;

        return $this;
    }

    public function getConducteurs(): ?User
    {
        return $this->conducteurs;
    }

    public function setConducteurs(?User $conducteurs): self
    {
        $this->conducteurs = $conducteurs;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getPassagers(): Collection
    {
        return $this->passagers;
    }

    public function addPassager(User $passager): self
    {
        if (!$this->passagers->contains($passager)) {
            $this->passagers[] = $passager;
        }

        return $this;
    }

    public function removePassager(User $passager): self
    {
        $this->passagers->removeElement($passager);

        return $this;
    }

    public function getNbPlacesRestantes(): ?int
    {
        return $this->nbPlacesRestantes;
    }

    public function setNbPlacesRestantes(int $nbPlacesRestantes): self
    {
        $this->nbPlacesRestantes = $nbPlacesRestantes;

        return $this;
    }

    public function getModeleVoiture(): ?string
    {
        return $this->modeleVoiture;
    }

    public function setModeleVoiture(string $modeleVoiture): self
    {
        $this->modeleVoiture = $modeleVoiture;

        return $this;
    }

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): self
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->addTrajet($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            $reservation->removeTrajet($this);
        }

        return $this;
    }
}
