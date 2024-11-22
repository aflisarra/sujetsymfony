<?php

namespace App\Entity;

use App\Repository\TypeStageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeStageRepository::class)]
class TypeStage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $pfe = null;

    #[ORM\Column(length: 50)]
    private ?string $immersion = null;

    #[ORM\Column(length: 50)]
    private ?string $ingenieur = null;

    /**
     * @var Collection<int, Stage>
     */
    #[ORM\OneToMany(targetEntity: Stage::class, mappedBy: 'typeStage', orphanRemoval: true)]
    private Collection $stages;

    public function __construct()
    {
        $this->stages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPfe(): ?string
    {
        return $this->pfe;
    }

    public function setPfe(string $pfe): static
    {
        $this->pfe = $pfe;

        return $this;
    }

    public function getImmersion(): ?string
    {
        return $this->immersion;
    }

    public function setImmersion(string $immersion): static
    {
        $this->immersion = $immersion;

        return $this;
    }

    public function getIngenieur(): ?string
    {
        return $this->ingenieur;
    }

    public function setIngenieur(string $ingenieur): static
    {
        $this->ingenieur = $ingenieur;

        return $this;
    }

    /**
     * @return Collection<int, Stage>
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): static
    {
        if (!$this->stages->contains($stage)) {
            $this->stages->add($stage);
            $stage->setTypeStage($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): static
    {
        if ($this->stages->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getTypeStage() === $this) {
                $stage->setTypeStage(null);
            }
        }

        return $this;
    }
}
