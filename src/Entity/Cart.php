<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Zend\Code\Generator\DocBlock\Tag;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
{
    // CHAMPS
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $total;

    /**
     * @ORM\ManyToOne(targetEntity="Member", inversedBy="carts")
     * @var Collection
     */
    private $member;
    
    /**
     * @ORM\ManyToMany(targetEntity="Menu", inversedBy="carts")
     * @var Collection
     */
    private $menus;
    
    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="carts")
     * @var Collection
     */
    private $products;
    
    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="carts")
     * @var Collection
     */
    private $tags;
    
    
    
    
    //  ACTIONS
    public function __construct() {
       $this->menus = new ArrayCollection();
       $this->products = new ArrayCollection();
       $this->tags = new ArrayCollection();       
   }
    
   
   
    
    // GETTERS
    public function getId() {
        return $this->id;
    }
    
    public function getTotal() {
        return $this->total;
    }

    public function getMember(): collection {
        return $this->member;
    }

    public function getMenus(): collection {
        return $this->menus;
    }

    public function getProducts(): collection {
        return $this->products;
    }

    public function getTags(): collection {
        return $this->tags;
    }

    

    
    // SETTERS
    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function setTotal($total) {
        $this->total = $total;
        return $this;
    }
 
    public function setMember(collection $member) {
        $this->member = $member;
        return $this;
    }

    public function setMenus(collection $menus) {
        $this->menus = $menus;
        return $this;
    }

    public function setProducts(collection $products) {
        $this->products = $products;
        return $this;
    }

    public function setTags(collection $tags) {
        $this->tags = $tags;
        return $this;
    }

    


}
