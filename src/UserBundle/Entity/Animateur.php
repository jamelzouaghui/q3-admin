<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Animateur
 *
 * @ORM\Table(name="animateur")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\AnimateurRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
class Animateur {

    /**
     * exposed
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *  @JMS\Expose
     */
    private $id;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     *  @JMS\Expose
     */
    private $firstname;

    /**
     * exposed
     * @var string
     * @ORM\Column(name="lastname", type="string", length=255)
     * @JMS\Expose
     */
    private $lastname;

    /**
     * exposed
     * @var string
     * @ORM\Column(name="profession", type="string", length=255)
     * @JMS\Expose
     */
    private $profession;
    
  
    /**
     * exposed
     * @ORM\OneToOne(targetEntity="Media",cascade={"persist","remove"} )
     * @ORM\JoinColumn(name="photo_id", referencedColumnName="id" , nullable=true)
     * @JMS\Expose
     */
    protected $photo;
    
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
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Animateur
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Animateur
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return Animateur
     */
    public function setProfession($profession) {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession() {
        return $this->profession;
    }

     /**
     * Set photo
     *
     * @param Media $photo
     *
     * @return User
     */
    public function setPhoto(Media $photo = null) {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return Media
     */
    public function getPhoto() {
        return $this->photo;
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

}
