<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animateur
 *
 * @ORM\Table(name="nl_categorie")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\CategorieRepository")
 */
class Categorie {

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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;


    /**
     * @var string
     *
     * @ORM\Column(name="imgPicto", type="string", length=255, nullable=true)
     */
    private $imgPicto;
    
    /**
     * @var string
     *
     * @ORM\Column(name="textePicto", type="string", length=255, nullable=true)
     */
    private $textePicto;

    /**
     * @var int
     *
     * @ORM\Column(name="afficherPicto", type="integer", nullable=true)
     */
    private $afficherPicto;
    
    
     /**
     * Many Categories have Many produits.
     * @ORM\ManyToMany(targetEntity="Produits", inversedBy="categories")
     * @ORM\JoinTable(name="categories_produits")
     */
    private $produits;
    

    public function __construct() {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }



    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Categorie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set imgPicto
     *
     * @param string $imgPicto
     *
     * @return Categorie
     */
    public function setImgPicto($imgPicto)
    {
        $this->imgPicto = $imgPicto;

        return $this;
    }

    /**
     * Get imgPicto
     *
     * @return string
     */
    public function getImgPicto()
    {
        return $this->imgPicto;
    }

    /**
     * Set textePicto
     *
     * @param string $textePicto
     *
     * @return Categorie
     */
    public function setTextePicto($textePicto)
    {
        $this->textePicto = $textePicto;

        return $this;
    }

    /**
     * Get textePicto
     *
     * @return string
     */
    public function getTextePicto()
    {
        return $this->textePicto;
    }

    /**
     * Set afficherPicto
     *
     * @param integer $afficherPicto
     *
     * @return Categorie
     */
    public function setAfficherPicto($afficherPicto)
    {
        $this->afficherPicto = $afficherPicto;

        return $this;
    }

    /**
     * Get afficherPicto
     *
     * @return integer
     */
    public function getAfficherPicto()
    {
        return $this->afficherPicto;
    }

    /**
     * Add produit
     *
     * @param \UserBundle\Entity\Produits $produit
     *
     * @return Categorie
     */
    public function addProduit(\UserBundle\Entity\Produits $produit)
    {
        $this->produits[] = $produit;

        return $this;
    }

    /**
     * Remove produit
     *
     * @param \UserBundle\Entity\Produits $produit
     */
    public function removeProduit(\UserBundle\Entity\Produits $produit)
    {
        $this->produits->removeElement($produit);
    }

    /**
     * Get produits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduits()
    {
        return $this->produits;
    }
}
