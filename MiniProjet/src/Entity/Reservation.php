<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="reservations")
     */
    private $nom;

    /**
     * @ORM\OneToOne(targetEntity=Trajet::class, inversedBy="reservation", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $trajet;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPlacesReservees;

    public function __construct()
    {
        $this->nom = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, User>
     */
    public function getNom(): Collection
    {
        return $this->nom;
    }

    public function addNom(User $nom): self
    {
        if (!$this->nom->contains($nom)) {
            $this->nom[] = $nom;
        }

        return $this;
    }

    public function removeNom(User $nom): self
    {
        $this->nom->removeElement($nom);

        return $this;
    }

    public function getTrajet(): ?Trajet
    {
        return $this->trajet;
    }

    public function setTrajet(Trajet $trajet): self
    {
        $this->trajet = $trajet;

        return $this;
    }

    public function getNbPlacesReservees(): ?int
    {
        return $this->nbPlacesReservees;
    }

    public function setNbPlacesReservees(int $nbPlacesReservees): self
    {
        $this->nbPlacesReservees = $nbPlacesReservees;

        return $this;
    }
}
