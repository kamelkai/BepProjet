<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
     * @Assert\Length(min=2, max=50)
     * @var string
     */
    private $menuName;
    
    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=20, max=2500)
     */
    private $menuDescription;
    
     /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $menuPrice;
    
    /**
     * @ORM\ManyToMany(targetEntity="Product", mappedBy="menus")
     * @var Collection
     */
    private $products;
    
        
    /**
     * @ORM\ManyToMany(targetEntity="Cart", mappedBy="menus")
     * @var Collection
     */
    private $carts;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="menus")
     * @var Collection
     */
    private $tags;


    // ACTIONS
    public function __construct() {
        $this->products= new ArrayCollection();
        $this->tags= new ArrayCollection();
        $this->carts= new ArrayCollection();
    }
    
    
    
        
    // GETTERS
    public function getId() {
        return $this->id;
    }

    public function getMenuName() {
        return $this->menuName;
    }
    
    public function getMenuDescription() {
        return $this->menuDescription;
    }

    public function getMenuPrice() {
        return $this->menuPrice;
    }


    public function getProducts(): Collection {
        return $this->products;
    }
    
    public function getTags(): Collection {
        return $this->tags;
    }
    
    public function getCarts(): Collection {
        return $this->carts;
    }
    
    
    
    // SETTERS
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setMenuName($menuName) {
        $this->menuName = $menuName;
        return $this;
    }

    public function setMenuDescription($menuDescription) {
        $this->menuDescription = $menuDescription;
        return $this;
    }

    public function setMenuPrice($menuPrice) {
        $this->menuPrice = $menuPrice;
        return $this;
    }

    
    public function setProducts(Collection $products) {
        $this->products = $products;
        return $this;
    }

    public function setTags(Collection $tags) {
        $this->tags = $tags;
        return $this;
    }

     public function setCarts(Collection $carts) {
        $this->carts = $carts;
        return $this;
    }

}
