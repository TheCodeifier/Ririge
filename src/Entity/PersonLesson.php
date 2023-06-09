<?php

namespace App\Entity;

use App\Repository\PersonLessonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonLessonRepository::class)]
class PersonLesson
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'personLessons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $Person = null;

    #[ORM\ManyToOne(inversedBy: 'personLessons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lesson $lesson = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerson(): ?Person
    {
        return $this->Person;
    }

    public function setPerson(?Person $Person): self
    {
        $this->Person = $Person;

        return $this;
    }

    public function getLesson(): ?Lesson
    {
        return $this->lesson;
    }

    public function setLesson(?Lesson $lesson): self
    {
        $this->lesson = $lesson;

        return $this;
    }
}
