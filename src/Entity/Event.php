<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Table;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 * @Table( indexes={@Index(name="status_index", columns={"status"}) } )
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    
     /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(min=2, max=100)
     * @var string
     */
    private $title;
    
     /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=20, max=2500)
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Choice({"active", "inactive"})
     * @var string
     */
    private $status;
    
    
    
    
    public function setStatus($status) {
        $this->status = $status;
        return $this;
    }

    
    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }
    
    public function getStatus() {
        return $this->status;
    }

    
    
    

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }
    
    public function getId() {
        return $this->id;
    }


}
