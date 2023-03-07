<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
    private $codePostal;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="villeDepart", orphanRemoval=true)
     */
    private $depart;

    /**
     * @ORM\OneToMany(targetEntity=Trajet::class, mappedBy="villeArrivee", orphanRemoval=true)
     */
    private $terminus;

    public function __construct()
    {
        $this->depart = new ArrayCollection();
        $this->terminus = new ArrayCollection();
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

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * @return Collection<int, Trajet>
     */
    public function getDepart(): Collection
    {
        return $this->depart;
    }

    public function addDepart(Trajet $depart): self
    {
        if (!$this->depart->contains($depart)) {
            $this->depart[] = $depart;
            $depart->setVilleDepart($this);
        }

        return $this;
    }

    public function removeDepart(Trajet $depart): self
    {
        if ($this->depart->removeElement($depart)) {
            // set the owning side to null (unless already changed)
            if ($depart->getVilleDepart() === $this) {
                $depart->setVilleDepart(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Trajet>
     */
    public function getTerminus(): Collection
    {
        return $this->terminus;
    }

    public function addTerminu(Trajet $terminu): self
    {
        if (!$this->terminus->contains($terminu)) {
            $this->terminus[] = $terminu;
            $terminu->setVilleArrivee($this);
        }

        return $this;
    }

    public function removeTerminu(Trajet $terminu): self
    {
        if ($this->terminus->removeElement($terminu)) {
            // set the owning side to null (unless already changed)
            if ($terminu->getVilleArrivee() === $this) {
                $terminu->setVilleArrivee(null);
            }
        }

        return $this;
    }
}
