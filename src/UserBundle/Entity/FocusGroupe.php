<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * FocusGroupe
 *
 * @ORM\Table(name="focus_groupe")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\FocusGroupeRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
class FocusGroupe {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * exposed
     * @var int
     *
     * @ORM\Column(name="statut", type="integer")
     * @JMS\Expose
     */
    private $statut;

    /**
     * exposed
     * @var int
     *
     * @ORM\Column(name="oldStatut", type="integer",nullable= true)
     * @JMS\Expose
     */
    private $oldStatut;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255,nullable= true)
     * @JMS\Expose
     */
    private $nom;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="raison", type="string", length=255)
     *  @JMS\Expose
     */
    private $raison;

    /**
     * exposed
     * @var DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     * @JMS\Expose
     */
    protected $createdAt;

    /**
     * exposed
     * @var DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     * @JMS\Expose
     */
    protected $updatedAt;

    /**
     * exposed
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebutDiscussion", type="datetime",nullable= true)
     *  @JMS\Expose
     */
    private $dateDebutDiscussion;

    /**
     * exposed
     * @var \DateTime
     *
     * @ORM\Column(name="dateFinDiscussion", type="datetime",nullable= true)
     * @JMS\Expose
     */
    private $dateFinDiscussion;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255,nullable= true)
     * @JMS\Expose
     */
    private $slug;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="photoGroupe", type="string", length=255,nullable= true)
     * @JMS\Expose
     */
    private $photoGroupe;

    /**
     * exposed
     * @var string
     * @ORM\Column(name="photoCouverture", type="string", length=255,nullable= true)
     * @JMS\Expose
     */
    private $photoCouverture;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="description1", type="string", length=255)
     * @JMS\Expose
     */
    private $description1;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="description2", type="string", length=255)
     * @JMS\Expose
     */
    private $description2;

    /**
     * exposed
     * 
     * @ORM\OneToOne(targetEntity="Animateur")
     * @ORM\JoinColumn(name="animateur_id", referencedColumnName="id")
     * @JMS\Expose
     */
    private $animateur;

    /**
     * exposed
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="createdBy_id", referencedColumnName="id")
     * @JMS\Expose
     */
    private $createdBy;

    /**
     * exposed
     * @var int
     *
     * @ORM\Column(name="activerTchate", type="integer", nullable=true)
     * @JMS\Expose
     */
    private $activerTchate;

    /**
     * exposed
     * @var \DateTime
     *
     * @ORM\Column(name="dateCloture", type="datetime" , nullable=true)
     * @JMS\Expose
     */
    private $dateCloture;

    /**
     * exposed
     * @var \DateTime
     *
     * @ORM\Column(name="dateArchive", type="datetime" , nullable=true)
     * @JMS\Expose
     */
    private $dateArchive;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return FocusGroupe
     */
    public function setStatut($statut) {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return int
     */
    public function getStatut() {
        return $this->statut;
    }

    /**
     * Set oldStatut
     *
     * @param integer $oldStatut
     *
     * @return FocusGroupe
     */
    public function setOldStatut($oldStatut) {
        $this->oldStatut = $oldStatut;

        return $this;
    }

    /**
     * Get oldStatut
     *
     * @return int
     */
    public function getOldStatut() {
        return $this->oldStatut;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return FocusGroupe
     */
    public function setNom($nom) {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * Set raison
     *
     * @param string $raison
     *
     * @return FocusGroupe
     */
    public function setRaison($raison) {
        $this->raison = $raison;

        return $this;
    }

    /**
     * Get raison
     *
     * @return string
     */
    public function getRaison() {
        return $this->raison;
    }

    /**
     * Set createdAt.
     *
     * @param DateTime $createdAt
     *
     * @return User
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param DateTime $updatedAt
     *
     * @return User
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps() {
        $this->setUpdatedAt(new \DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new \DateTime('now'));
        }
    }

    /**
     * Set dateDebutDiscussion
     *
     * @param \DateTime $dateDebutDiscussion
     *
     * @return FocusGroupe
     */
    public function setDateDebutDiscussion($dateDebutDiscussion) {
        $this->dateDebutDiscussion = $dateDebutDiscussion;

        return $this;
    }

    /**
     * Get dateDebutDiscussion
     *
     * @return \DateTime
     */
    public function getDateDebutDiscussion() {
        return $this->dateDebutDiscussion;
    }

    /**
     * Set dateFinDiscussion
     *
     * @param \DateTime $dateFinDiscussion
     *
     * @return FocusGroupe
     */
    public function setDateFinDiscussion($dateFinDiscussion) {
        $this->dateFinDiscussion = $dateFinDiscussion;

        return $this;
    }

    /**
     * Get dateFinDiscussion
     *
     * @return \DateTime
     */
    public function getDateFinDiscussion() {
        return $this->dateFinDiscussion;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return FocusGroupe
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set photoGroupe
     *
     * @param string $photoGroupe
     *
     * @return FocusGroupe
     */
    public function setPhotoGroupe($photoGroupe) {
        $this->photoGroupe = $photoGroupe;

        return $this;
    }

    /**
     * Get photoGroupe
     *
     * @return string
     */
    public function getPhotoGroupe() {
        return $this->photoGroupe;
    }

    /**
     * Set photoCouverture
     *
     * @param string $photoCouverture
     *
     * @return FocusCouverture
     */
    public function setPhotoCouverture($photoCouverture) {
        $this->photoCouverture = $photoCouverture;

        return $this;
    }

    /**
     * Get photoCouverture
     *
     * @return string
     */
    public function getPhotoCouverture() {
        return $this->photoCouverture;
    }

    /**
     * Set description1
     *
     * @param string $description1
     *
     * @return FocusGroupe
     */
    public function setDescription1($description1) {
        $this->description1 = $description1;

        return $this;
    }

    /**
     * Get description1
     *
     * @return string
     */
    public function getDescription1() {
        return $this->description1;
    }

    /**
     * Set description2
     *
     * @param string $description2
     *
     * @return FocusGroupe
     */
    public function setDescription2($description2) {
        $this->description2 = $description2;

        return $this;
    }

    /**
     * Get description2
     *
     * @return string
     */
    public function getDescription2() {
        return $this->description2;
    }

    /**
     * Set animateur
     *
     * @param \UserBundle\Entity\Animateur $animateur
     *
     * @return FocusGroupe
     */
    public function setAnimateur(\UserBundle\Entity\Animateur $animateur = null) {
        $this->animateur = $animateur;

        return $this;
    }

    /**
     * Get animateur
     *
     * @return \UserBundle\Entity\Animateur
     */
    public function getAnimateur() {
        return $this->animateur;
    }

    /**
     * Set createdBy
     *
     * @param \UserBundle\Entity\User $createdBy
     *
     * @return FocusGroupe
     */
    public function setCreatedBy(\UserBundle\Entity\User $createdBy = null) {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \UserBundle\Entity\User
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }


    /**
     * Set activerTchate
     *
     * @param integer $activerTchate
     *
     * @return FocusGroupe
     */
    public function setActiverTchate($activerTchate)
    {
        $this->activerTchate = $activerTchate;

        return $this;
    }

    /**
     * Get activerTchate
     *
     * @return integer
     */
    public function getActiverTchate()
    {
        return $this->activerTchate;
    }

    /**
     * Set dateCloture
     *
     * @param \DateTime $dateCloture
     *
     * @return FocusGroupe
     */
    public function setDateCloture($dateCloture)
    {
        $this->dateCloture = $dateCloture;

        return $this;
    }

    /**
     * Get dateCloture
     *
     * @return \DateTime
     */
    public function getDateCloture()
    {
        return $this->dateCloture;
    }

    /**
     * Set dateArchive
     *
     * @param \DateTime $dateArchive
     *
     * @return FocusGroupe
     */
    public function setDateArchive($dateArchive)
    {
        $this->dateArchive = $dateArchive;

        return $this;
    }

    /**
     * Get dateArchive
     *
     * @return \DateTime
     */
    public function getDateArchive()
    {
        return $this->dateArchive;
    }
}
