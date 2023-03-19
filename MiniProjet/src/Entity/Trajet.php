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
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="terminus")
     * @ORM\JoinColumn(nullable=false)
     */
    private $villeArrivee;

    /**
     * @ORM\Column(type="time")
     */
    private $heureDepart;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $conducteur;

    /**
     * @ORM\ManyToMany(targetEntity=User::class)
     */
    private $passagers;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDepart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modeleVoiture;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlacesVoiture;

    /**
     * @ORM\OneToOne(targetEntity=Reservation::class, mappedBy="trajet", cascade={"persist", "remove"})
     */
    private $reservation;

    public function __construct()
    {
        $this->passagers = new ArrayCollection();
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

    public function getHeureDepart(): ?\DateTimeInterface
    {
        return $this->heureDepart;
    }

    public function setHeureDepart(\DateTimeInterface $heureDepart): self
    {
        $this->heureDepart = $heureDepart;

        return $this;
    }

    public function getConducteur(): ?User
    {
        return $this->conducteur;
    }

    public function setConducteur(?User $conducteur): self
    {
        $this->conducteur = $conducteur;

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

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }

    public function setDateDepart(\DateTimeInterface $dateDepart): self
    {
        $this->dateDepart = $dateDepart;

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

    public function getnbPlacesVoiture(): ?int
    {
        return $this->nbPlacesVoiture;
    }

    public function setnbPlacesVoiture(int $nbPlacesVoiture): self
    {
        $this->nbPlacesVoiture = $nbPlacesVoiture;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): self
    {
        // set the owning side of the relation if necessary
        if ($reservation->getTrajet() !== $this) {
            $reservation->setTrajet($this);
        }

        $this->reservation = $reservation;

        return $this;
    }
}
