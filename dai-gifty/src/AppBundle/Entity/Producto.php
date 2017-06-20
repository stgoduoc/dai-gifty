<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Producto {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=50, unique=false, nullable=false)
     */
    private $nombre;
    
    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;
    
    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $precio;
    
    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $stock;
    
    /**
     * @ORM\ManyToMany(targetEntity="Categoria")
     */
    private $categorias;

    function __construct() {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

}
