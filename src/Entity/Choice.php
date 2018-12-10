<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChoiceRepository")
 */
class Choice
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
    private $choice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $response;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChoice(): ?string
    {
        return $this->choice;
    }

    public function setChoice(string $choice): self
    {
        $this->choice = $choice;

        return $this;
    }

    public function getResponse(): ?bool
    {
        return $this->response;
    }

    public function setResponse(bool $response): self
    {
        $this->response = $response;

        return $this;
    }
}
