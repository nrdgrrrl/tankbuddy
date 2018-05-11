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

    public function __construct()
    {
        parent::__construct();
        $this->tanks = new ArrayCollection();
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
}