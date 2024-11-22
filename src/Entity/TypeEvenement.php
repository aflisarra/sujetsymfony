<?php

namespace App\Entity;

use App\Repository\TypeEvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeEvenementRepository::class)]
class TypeEvenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $journeesPortesOuvertes = null;

    #[ORM\Column(length: 50)]
    private ?string $workshop = null;

    /**
     * @var Collection<int, Evenement>
     */
    #[ORM\OneToMany(targetEntity: Evenement::class, mappedBy: 'typeEv', orphanRemoval: true)]
    private Collection $evenements;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJourneesPortesOuvertes(): ?string
    {
        return $this->journeesPortesOuvertes;
    }

    public function setJourneesPortesOuvertes(string $journeesPortesOuvertes): static
    {
        $this->journeesPortesOuvertes = $journeesPortesOuvertes;

        return $this;
    }

    public function getWorkshop(): ?string
    {
        return $this->workshop;
    }

    public function setWorkshop(string $workshop): static
    {
        $this->workshop = $workshop;

        return $this;
    }

    /**
     * @return Collection<int, Evenement>
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): static
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements->add($evenement);
            $evenement->setTypeEv($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): static
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getTypeEv() === $this) {
                $evenement->setTypeEv(null);
            }
        }

        return $this;
    }
}
