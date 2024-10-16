<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $date = null;

    #[ORM\Column]
    private ?float $h_debut = null;

    #[ORM\Column]
    private ?float $h_fin = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Participate>
     */
    #[ORM\OneToMany(targetEntity: Participate::class, mappedBy: 'lesCourses')]
    private Collection $participates;


    public function __construct()
    {
        $this->participates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }


    public function getHDebut(): ?float
    {
        return $this->h_debut;
    }

    public function setHDebut(float $h_debut): static
    {
        $this->h_debut = $h_debut;

        return $this;
    }

    public function getHFin(): ?float
    {
        return $this->h_fin;
    }

    public function setHFin(float $h_fin): static
    {
        $this->h_fin = $h_fin;

        return $this;
    }

    /**
     * @return Collection<int, Participate>
     */
    public function getParticipates(): Collection
    {
        return $this->participates;
    }

    public function addParticipate(Participate $participate): static
    {
        if (!$this->participates->contains($participate)) {
            $this->participates->add($participate);
            $participate->setLesCourses($this);
        }

        return $this;
    }

    public function removeParticipate(Participate $participate): static
    {
        if ($this->participates->removeElement($participate)) {
            // set the owning side to null (unless already changed)
            if ($participate->getLesCourses() === $this) {
                $participate->setLesCourses(null);
            }
        }

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }
}
