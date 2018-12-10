<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionsRepository")
 */
class Questions
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $question;

    /**
     * @ORM\Column(type="integer")
     */
    private $experience;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Qcm", mappedBy="question")
     */
    private $qcms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Choice", mappedBy="questions")
     */
    private $choice;

    public function __construct()
    {
        $this->qcms = new ArrayCollection();
        $this->choice = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * @return Collection|Qcm[]
     */
    public function getQcms(): Collection
    {
        return $this->qcms;
    }

    public function addQcm(Qcm $qcm): self
    {
        if (!$this->qcms->contains($qcm)) {
            $this->qcms[] = $qcm;
            $qcm->addQuestion($this);
        }

        return $this;
    }

    public function removeQcm(Qcm $qcm): self
    {
        if ($this->qcms->contains($qcm)) {
            $this->qcms->removeElement($qcm);
            $qcm->removeQuestion($this);
        }

        return $this;
    }

    /**
     * @return Collection|Choice[]
     */
    public function getChoice(): Collection
    {
        return $this->choice;
    }

    public function addChoice(Choice $choice): self
    {
        if (!$this->choice->contains($choice)) {
            $this->choice[] = $choice;
            $choice->setQuestions($this);
        }

        return $this;
    }

    public function removeChoice(Choice $choice): self
    {
        if ($this->choice->contains($choice)) {
            $this->choice->removeElement($choice);
            // set the owning side to null (unless already changed)
            if ($choice->getQuestions() === $this) {
                $choice->setQuestions(null);
            }
        }

        return $this;
    }
}
