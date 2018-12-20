<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner votre e-mail")
     * @Assert\Email(
     *     message = "L'email {{ value }} n'est pas valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner un mot de passe")
     * @Assert\Length( min = 4, minMessage="Le mot de passe doit contenir au moins 4 caractères" )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner votre prénom")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner votre nom")
     */
    private $lastname;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $experience;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Classroom", inversedBy="users")
     */
    private $classroom;
    
    /**
     * 
     */
    private $classCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner un pseudo")
     * @Assert\Length( min = 3, minMessage="Le pseudo doit contenir au moins 3 caractères" ) )
     */
    private $username;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Avatar", inversedBy="users", cascade={"persist"} )
     */
    private $avatar;

    public function __construct()
    {
        $this->classroom = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getExperience(): ?int
    {
        return $this->experience;
    }

    public function setExperience(?int $experience): self
    {
        $this->experience = $experience;

        return $this;
    }


    /**
     * @return Collection|Classroom[]
     */
    public function getClassroom(): Collection
    {
        return $this->classroom;
    }

    public function addClassroom(Classroom $classroom): self
    {
        if (!$this->classroom->contains($classroom)) {
            $this->classroom[] = $classroom;
        }

        return $this;
    }

    public function removeClassroom(Classroom $classroom): self
    {
        if ($this->classroom->contains($classroom)) {
            $this->classroom->removeElement($classroom);
        }

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function eraseCredentials ()
    {
        
    }

    public function getSalt() : ?string
    {
        return null;
    }

    public function getAvatar(): ?Avatar
    {
        return $this->avatar;
    }

    public function setAvatar(?Avatar $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }


    
    public function getClassCode(): ?string
    {
        return $this->classCode;
    }
    
    public function setClassCode( $classCode): self
    {
        $this->classCode = $classCode;

        return $this;
    }

}
