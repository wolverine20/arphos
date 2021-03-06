<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ProductoRepository")
 * @ORM\HasLifecycleCallbacks()
 * @Vich\Uploadable
 */
class Producto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="precio", type="float", length=255)
     */
    private $precio;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

     /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


     /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text",nullable=true)
     */
    private $descripcion;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaCreacion", type="datetime", nullable=true)
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaModificacion", type="datetime", nullable=true)
     */
    private $fechaModificacion;

    /**
     * @var int
     *
     * @ORM\Column(name="stock", type="integer")
     */
    private $stock;

    /**
     * @var bool
     *
     * @ORM\Column(name="esNovedad", type="boolean")
     */
    private $esNovedad;

  
     /**
     * Many User have Many Phonenumbers.
     * @ORM\ManyToMany(targetEntity="\BackendBundle\Entity\Categoria")
     * @ORM\JoinTable(name="categorias_productos",
     *      joinColumns={@ORM\JoinColumn(name="producto_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categoria_id", referencedColumnName="id")}
     *      )
     */
    private $categorias;

    /**
     * Many Users have Many Groups.
     * @ORM\ManyToMany(targetEntity="\BackendBundle\Entity\Talle")
     * @ORM\JoinTable(name="talle_producto",
     *      joinColumns={@ORM\JoinColumn(name="talle_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="producto_id", referencedColumnName="id")}
     *      )
     */
    private $talles;


    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    private $imagen;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="producto_image", fileNameProperty="imagen")
     * 
     * @var File
     */
    private $imageFile;

     /**
     * @ORM\OneToMany(targetEntity="\BackendBundle\Entity\Resource", mappedBy="producto", orphanRemoval=true, cascade={"persist", "remove"})
     * @Assert\Valid
     */
    private $resources;

       /**
     * @var string
     *
     * @ORM\Column(name="coleccion", type="string", length=255)
     */
    private $coleccion;


     public function __toString() {
        return $this->getNombre();
    }

      public function __construct() {
        $this->categorias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->talles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        //seteo la fecha de creacion
        $this->fechaCreacion = new \DateTime();
    }


    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        //seteo la fecha de modificacion
        $this->fechaModificacion = new \DateTime();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set precio
     *
     * @param float $double
     *
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Producto
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

     /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }


    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Producto
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     *
     * @return Producto
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set stock
     *
     * @param integer $stock
     *
     * @return Producto
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return int
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set esNovedad
     *
     * @param boolean $esNovedad
     *
     * @return Producto
     */
    public function setEsNovedad($esNovedad)
    {
        $this->esNovedad = $esNovedad;

        return $this;
    }

    /**
     * Get esNovedad
     *
     * @return bool
     */
    public function getEsNovedad()
    {
        return $this->esNovedad;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return Product
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }

        return $this;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     *
     * @return Pagina
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Add resource
     *
     * @param \BackendBundle\Entity\Resource $resource
     *
     * @return Producto
     */
    public function addResource(\BackendBundle\Entity\Resource $resource)
    {
        $resource->setProducto($this);
        $this->resources[] = $resource;

        return $this;
    }

    /**
     * Remove resource
     *
     * @param \BackendBundle\Entity\Resource $resource
     */
    public function removeResource(\BackendBundle\Entity\Resource $resource)
    {
        $this->resources->removeElement($resource);
    }

    /**
     * Get resources
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResources()
    {
        return $this->resources;
    }

      public function addCategoria(\BackendBundle\Entity\Categoria $categoria)
    {
        // $categoria->addProducto($this); // synchronously updating inverse side
        $this->categorias[] = $categoria;
    }

    /**
     * Remove categoria
     *
     * @param \BackendBundle\Entity\Categoria $categoria
     */
    public function removeCategoria(\BackendBundle\Entity\Categoria $categoria)
    {
        $this->categorias->removeElement($categoria);
    }

    /**
     * Get categorias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorias()
    {
        return $this->categorias;
    }



      public function addTalle(\BackendBundle\Entity\Talle $talle)
    {
        // $categoria->addProducto($this);
        $this->talles[] = $talle;
    }

    /**
     * Remove talle
     *
     * @param \BackendBundle\Entity\Talle $talle
     */
    public function removeTalle(\BackendBundle\Entity\Talle $talle)
    {
        $this->talles->removeElement($talle);
    }

    /**
     * Get talles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTalles()
    {
        return $this->talles;
    }

    /**
     * Set coleccion
     *
     * @param string $coleccion
     *
     * @return Producto
     */
    public function setColeccion($coleccion)
    {
        $this->coleccion = $coleccion;

        return $this;
    }

    /**
     * Get coleccion
     *
     * @return string
     */
    public function getColeccion()
    {
        return $this->coleccion;
    }


   

}

