<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReadingRepository")
 */
class Reading
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="readings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ReadingType", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $readingtype;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valBool;

    /**
     * @ORM\Column(type="decimal", precision=12, scale=4, nullable=true)
     */
    private $valDecimal;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $valInt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $valString;

    public function getId()
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getReadingtype(): ?ReadingType
    {
        return $this->readingtype;
    }

    public function setReadingtype(ReadingType $readingtype): self
    {
        $this->readingtype = $readingtype;

        return $this;
    }

    public function getValBool(): ?bool
    {
        return $this->valBool;
    }

    public function setValBool(?bool $valBool): self
    {
        $this->valBool = $valBool;

        return $this;
    }

    public function getValDecimal()
    {
        return $this->valDecimal;
    }

    public function setValDecimal($valDecimal): self
    {
        $this->valDecimal = $valDecimal;

        return $this;
    }

    public function getValInt(): ?int
    {
        return $this->valInt;
    }

    public function setValInt(?int $valInt): self
    {
        $this->valInt = $valInt;

        return $this;
    }

    public function getValString(): ?string
    {
        return $this->valString;
    }

    public function setValString(?string $valString): self
    {
        $this->valString = $valString;

        return $this;
    }
}
