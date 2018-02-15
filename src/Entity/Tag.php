<?php

namespace App\Entity;

use App\Repository\TagRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;

/**
 * @ORM\Entity(repositoryClass="TagRepository")
 */
class Tag
{
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
    private $name;
    
     /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="tags")
     * @var Collection
     */
    private $products;
    
     /**
     * @ORM\ManyToMany(targetEntity="Menu", inversedBy="tags")
     * @var Collection
     */
    private $menus;
    
     /**
     * @ORM\ManyToMany(targetEntity="Cart", mappedBy="tags")
     * @var Collection
     */
    private $carts;
    
    public function __construct() {
        $this->carts = new ArrayCollection();
        $this->menus = new ArrayCollection();
        $this->products = new ArrayCollection();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getProducts(): Collection {
        return $this->products;
    }

    public function getMenus(): Collection {
        return $this->menus;
    }

    public function getCarts(): Collection {
        return $this->carts;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setProducts(Collection $products) {
        $this->products = $products;
        return $this;
    }

    public function setMenus(Collection $menus) {
        $this->menus = $menus;
        return $this;
    }

    public function setCarts(Collection $carts) {
        $this->carts = $carts;
        return $this;
    }


}
