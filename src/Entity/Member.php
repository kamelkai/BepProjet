<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="MemberRepository")
 * @Table(indexes={@Index(name="status_index", columns={"status"})})
 */
class Member
{
    // CHAMPS
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\Column(type="string", length=50)
    * @var string
    */
    private $firstname;
    
    /**
    * @ORM\Column(type="string", length=50)
    * @var string
    */
    private $lastname;
    
    /**
    * @ORM\Column(type="string", length=255)
    * @var string
    */
    private $email;
    
    /**
    * @ORM\Column(type="string", length=255)
    * @var string
    */
    private $mdp;
    
     /**
     * @ORM\Column(type="string", length=25)
     * @Assert\Choice({"member", "admin"})
     * @var string
     */
    private $status;  
    
    /**
    * @ORM\OneToMany(targetEntity="Cart", mappedBy="member")
    * @var Collection
     */
    private $carts;
    
    
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    



    // ACTIONS
    public function __construct() {
       $this->carts = new ArrayCollection();
   }
        
    // GETTERS
    public function getId() {
        return $this->id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMdp() {
        return $this->mdp;
    }
    
    public function getCarts(): Collection {
        return $this->carts;
    }

    // SETTERS
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
        return $this;
    }
    
    public function setCarts(Collection $carts) {
        $this->carts = $carts;
        return $this;
    }
    
}
