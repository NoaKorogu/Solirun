<?php

namespace App\Entity;

use App\Repository\ParticipateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipateRepository::class)]
class Participate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nb_tours = null;

    #[ORM\ManyToOne(inversedBy: 'participates')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Course $lesCourses = null;

    #[ORM\ManyToOne(inversedBy: 'participates')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Classe $lesClasses = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTours(): ?int
    {
        return $this->nb_tours;
    }

    public function setNbTours(int $nb_tours): static
    {
        $this->nb_tours = $nb_tours;

        return $this;
    }

    public function getLesCourses(): ?Course
    {
        return $this->lesCourses;
    }

    public function setLesCourses(?Course $lesCourses): static
    {
        $this->lesCourses = $lesCourses;

        return $this;
    }

    public function getLesClasses(): ?Classe
    {
        return $this->lesClasses;
    }

    public function setLesClasses(?Classe $lesClasses): static
    {
        $this->lesClasses = $lesClasses;

        return $this;
    }
}
