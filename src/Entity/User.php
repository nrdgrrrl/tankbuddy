<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tank", mappedBy="user")
     */
    private $tanks;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ReadingType", mappedBy="User")
     */
    private $readingTypes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reading", mappedBy="user")
     */
    private $readings;

    public function __construct()
    {
        parent::__construct();
        $this->tanks = new ArrayCollection();
        $this->readingTypes = new ArrayCollection();
        $this->readings = new ArrayCollection();
        // your own logic
    }

    /**
     * @return Collection|Tank[]
     */
    public function getTanks(): Collection
    {
        return $this->tanks;
    }

    public function addTank(Tank $tank): self
    {
        if (!$this->tanks->contains($tank)) {
            $this->tanks[] = $tank;
            $tank->setUser($this);
        }

        return $this;
    }

    public function removeTank(Tank $tank): self
    {
        if ($this->tanks->contains($tank)) {
            $this->tanks->removeElement($tank);
            // set the owning side to null (unless already changed)
            if ($tank->getUser() === $this) {
                $tank->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ReadingType[]
     */
    public function getReadingTypes(): Collection
    {
        return $this->readingTypes;
    }

    public function addReadingType(ReadingType $readingType): self
    {
        if (!$this->readingTypes->contains($readingType)) {
            $this->readingTypes[] = $readingType;
            $readingType->setUser($this);
        }

        return $this;
    }

    public function removeReadingType(ReadingType $readingType): self
    {
        if ($this->readingTypes->contains($readingType)) {
            $this->readingTypes->removeElement($readingType);
            // set the owning side to null (unless already changed)
            if ($readingType->getUser() === $this) {
                $readingType->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reading[]
     */
    public function getReadings(): Collection
    {
        return $this->readings;
    }

    public function addReading(Reading $reading): self
    {
        if (!$this->readings->contains($reading)) {
            $this->readings[] = $reading;
            $reading->setUser($this);
        }

        return $this;
    }

    public function removeReading(Reading $reading): self
    {
        if ($this->readings->contains($reading)) {
            $this->readings->removeElement($reading);
            // set the owning side to null (unless already changed)
            if ($reading->getUser() === $this) {
                $reading->setUser(null);
            }
        }

        return $this;
    }
}