<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClassroomRepository")
 */
class Classroom
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="classroom")
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Qcm", inversedBy="classrooms")
     */
    private $qcm;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->qcm = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addClassroom($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeClassroom($this);
        }

        return $this;
    }

    /**
     * @return Collection|Qcm[]
     */
    public function getQcm(): Collection
    {
        return $this->qcm;
    }

    public function addQcm(Qcm $qcm): self
    {
        if (!$this->qcm->contains($qcm)) {
            $this->qcm[] = $qcm;
        }

        return $this;
    }

    public function removeQcm(Qcm $qcm): self
    {
        if ($this->qcm->contains($qcm)) {
            $this->qcm->removeElement($qcm);
        }

        return $this;
    }
}
