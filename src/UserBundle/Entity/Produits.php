<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animateur
 *
 * @ORM\Table(name="nl_produits")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\ProduitsRepository")
 */
class Produits {

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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="siteWeb", type="text", nullable=true)
     */
    private $siteWeb;
    /**
     * @var int
     *
     * @ORM\Column(name="statut", type="integer", nullable=true)
     */
    private $statut;

    public $file;

   
    /**
     * @var string
     *
     * @ORM\Column(name="labelFilterPrd", type="string", length=255, nullable=true)
     */
    private $labelFilterPrd;

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

    public $picto;
    
    
    /**
     * Many produits have Many categories.
     * @ORM\ManyToMany(targetEntity="Categorie", mappedBy="produits")
     */
    private $categories;

    public function __construct() {
        $this->$categories = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Produits
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
     * Set reference
     *
     * @param string $reference
     *
     * @return Produits
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produits
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Produits
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Produits
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set labelFilterPrd
     *
     * @param string $labelFilterPrd
     *
     * @return Produits
     */
    public function setLabelFilterPrd($labelFilterPrd)
    {
        $this->labelFilterPrd = $labelFilterPrd;

        return $this;
    }

    /**
     * Get labelFilterPrd
     *
     * @return string
     */
    public function getLabelFilterPrd()
    {
        return $this->labelFilterPrd;
    }

    /**
     * Set imgPicto
     *
     * @param string $imgPicto
     *
     * @return Produits
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
     * @return Produits
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
     * @return Produits
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
     * Add category
     *
     * @param \UserBundle\Entity\Categorie $category
     *
     * @return Produits
     */
    public function addCategory(\UserBundle\Entity\Categorie $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \UserBundle\Entity\Categorie $category
     */
    public function removeCategory(\UserBundle\Entity\Categorie $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }
}
