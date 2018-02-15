<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;
use Doctrine\ORM\Mapping\Index;

/**
 * @ORM\Entity(repositoryClass="ProductRepository")
 * @Table(indexes={
 *      @Index(name="type_index", columns={"type"}),
 *      @Index(name="garnish_index", columns={"garnish"}),
 *      @Index(name="status_index", columns={"status"})
 * })
 */
class Product
{
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
    private $name;
    
     /**
     * @ORM\Column(type="string", length=25)
     * @Assert\Choice({"dishes", "dessert", "drink"})
     * @var string
     */
    private $type;
    
     /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Choice({"beef", "chicken", "tofu", "mortadella"})
     * @var string
     */
    private $garnish;
    
     /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Image(minWidth=200, minHeight=200, maxSize="1024k")
     */
    private $image;
    
     /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=20, max=2500)
     */
    private $description;
    
     /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    private $price;
    
     /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Choice({"active", "inactive"})
     * @var string
     */
    private $status;
    
     /**
     * @ORM\ManyToMany(targetEntity="Menu", inversedBy="products")
     * @var Collection
     */
    private $menus;
    
    
    /**
     * @ORM\ManyToMany(targetEntity="Cart", mappedBy="products")
     * @var Collection
     */
    private $carts;
    
     /**
     * @ORM\ManyToMany(targetEntity="Tag", mappedBy="products")
     * @var Collection
     */
    private $tags;

    public function __construct() {
        $this->menus = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->carts = new ArrayCollection();
    }
    
    
    public function getTags(): Collection {
        return $this->tags;
    }

    public function setTags(Collection $tags) {
        $this->tags = $tags;
        return $this;
    }


    public function getMenus(): Collection {
        return $this->menus;
    }

    public function getCarts(): Collection {
        return $this->carts;
    }

    public function setMenus(Collection $menus) {
        $this->menus = $menus;
        return $this;
    }

    public function setCarts(Collection $carts) {
        $this->carts = $carts;
        return $this;
    }

    

    //getter
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getType() {
        return $this->type;
    }

    public function getGarnish() {
        return $this->garnish;
    }

    public function getImage() {
        return $this->image;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getStatus() {
        return $this->status;
    }

    //setter
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function setGarnish($garnish) {
        $this->garnish = $garnish;
        return $this;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }


          
}
