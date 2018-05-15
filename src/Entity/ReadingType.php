<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReadingTypeRepository")
 */
class ReadingType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $CommonName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ScientificName;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $Units;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $MeasureUnit;

    /**
     * @ORM\Column(type="boolean")
     */
    private $IsPublic;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="readingTypes")
     */
    private $User;

    public function getId()
    {
        return $this->id;
    }

    public function getCommonName(): ?string
    {
        return $this->CommonName;
    }

    public function setCommonName(string $CommonName): self
    {
        $this->CommonName = $CommonName;

        return $this;
    }

    public function getScientificName(): ?string
    {
        return $this->ScientificName;
    }

    public function setScientificName(string $ScientificName): self
    {
        $this->ScientificName = $ScientificName;

        return $this;
    }

    public function getUnits(): ?string
    {
        return $this->Units;
    }

    public function setUnits(string $Units): self
    {
        $this->Units = $Units;

        return $this;
    }

    public function getMeasureUnit(): ?string
    {
        return $this->MeasureUnit;
    }

    public function setMeasureUnit(string $MeasureUnit): self
    {
        $this->MeasureUnit = $MeasureUnit;

        return $this;
    }

    public function getIsPublic(): ?bool
    {
        return $this->IsPublic;
    }

    public function setIsPublic(bool $IsPublic): self
    {
        $this->IsPublic = $IsPublic;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
