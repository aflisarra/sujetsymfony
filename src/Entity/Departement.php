<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepartementRepository::class)]
class Departement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $info = null;

    #[ORM\Column(length: 50)]
    private ?string $tic = null;

    #[ORM\Column(length: 50)]
    private ?string $gc = null;

    #[ORM\Column(length: 50)]
    private ?string $em = null;

    /**
     * @var Collection<int, Enseignant>
     */
    #[ORM\OneToMany(targetEntity: Enseignant::class, mappedBy: 'departement', orphanRemoval: true)]
    private Collection $enseignants;

    public function __construct()
    {
        $this->enseignants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfo(): ?string
    {
        return $this->info;
    }

    public function setInfo(string $info): static
    {
        $this->info = $info;

        return $this;
    }

    public function getTic(): ?string
    {
        return $this->tic;
    }

    public function setTic(string $tic): static
    {
        $this->tic = $tic;

        return $this;
    }

    public function getGc(): ?string
    {
        return $this->gc;
    }

    public function setGc(string $gc): static
    {
        $this->gc = $gc;

        return $this;
    }

    public function getEm(): ?string
    {
        return $this->em;
    }

    public function setEm(string $em): static
    {
        $this->em = $em;

        return $this;
    }

    /**
     * @return Collection<int, Enseignant>
     */
    public function getEnseignants(): Collection
    {
        return $this->enseignants;
    }

    public function addEnseignant(Enseignant $enseignant): static
    {
        if (!$this->enseignants->contains($enseignant)) {
            $this->enseignants->add($enseignant);
            $enseignant->setDepartement($this);
        }

        return $this;
    }

    public function removeEnseignant(Enseignant $enseignant): static
    {
        if ($this->enseignants->removeElement($enseignant)) {
            // set the owning side to null (unless already changed)
            if ($enseignant->getDepartement() === $this) {
                $enseignant->setDepartement(null);
            }
        }

        return $this;
    }
}
