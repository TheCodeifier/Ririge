<?php

namespace App\Entity;

use App\Repository\RegistrationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegistrationRepository::class)]
class Registration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $payment = null;

    #[ORM\ManyToOne(inversedBy: 'registrations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Person $member = null;

    #[ORM\ManyToOne(inversedBy: 'registrations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Lesson $lesson = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isPayment(): ?bool
    {
        return $this->payment;
    }

    public function setPayment(?bool $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getMember(): ?Person
    {
        return $this->member;
    }

    public function setMember(?Person $member): self
    {
        $this->member = $member;

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
