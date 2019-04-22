<?php

// src/UserBundle/Entity/User.php

namespace UserBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Entity
 * @ORM\Table(name="nl_user")
 * @ORM\DiscriminatorColumn(name="disc",type="string")
 * @ORM\DiscriminatorMap({ "user" = "User", "contact" = "Contact"})
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct() {
        parent::__construct();
        // your own logic
    }

    /**
     * exposed
     * @Assert\Choice(choices = {"Mr", "Mme", "Mlle","Dr","Prof"}, message = "Merci de choisir la civilté.")
     * @ORM\Column(name="civility",type="string", nullable = true)
     * @JMS\Expose
     * @var string
     */
    protected $civility;

    /**
     * exposed
     * firstname
     * @Assert\NotBlank(message = "Le champs prénom doit être fourni.")
     * @ORM\Column(name="firstname",type="string")
     * @JMS\Accessor(getter="getFirstname")
     * @JMS\Expose
     *
     */
    protected $firstname;

    /**
     * exposed
     * @Assert\NotBlank(message = "Le champs nom doit être fourni.")
     * @ORM\Column(name="lastname",type="string")
     * @JMS\Accessor(getter="getLastname")
     * @JMS\Expose
     */
    protected $lastname;

    /**
     * exposed
     * @ORM\Column(name="gender",type="integer",nullable=true)
     * @Assert\Choice(choices = {1, 2}, message = "Genre homme ou femme.")
     * @JMS\Accessor(getter="getGender")
     * @JMS\Expose
     */
    protected $gender;

    /**
     * exposed
     * @Assert\Date()
     * @ORM\Column(name="birthdate",type="date",nullable=true)
     */
    protected $birthDate;

    /**
     * exposed
     * email
     * @var string
     * @JMS\Accessor(getter="getEmail")
     * @JMS\Expose
     */
    protected $email;

    /**
     * exposed
     *
     * @ORM\Column(name="phone",type="string" ,nullable=true)
     * @JMS\Accessor(getter="getPhone")
     * @JMS\Expose
     */
    protected $phone;

    /**
     * exposed
     * @ORM\Column(name="mobile_phone",type="string")
     * @JMS\Accessor(getter="getMobilePhone")
     * @JMS\Expose
     */
    protected $mobilePhone;

    /**
     * @var string
     */
    protected $usernameCanonical;

    /**
     * exposed
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     * @JMS\Expose
     */
    private $profession;

    /**
     * @var string
     */
    protected $emailCanonical;

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
     * Set civility
     *
     * @param string $civility
     *
     * @return User
     */
    public function setCivility($civility) {
        $this->civility = $civility;

        return $this;
    }

    /**
     * Get civility
     *
     * @return string
     */
    public function getCivility() {
        return $this->civility;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
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
     * @return User
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
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Set birthDate
     *
     * @param DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return DateTime
     */
    public function getBirthDate() {
        return $this->birthDate;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * $profession
     * @return User
     */
    public function setPhone($phone) {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone() {
        return $this->phone;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     *
     * @return User
     */
    public function setMobilePhone($mobilePhone) {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone() {
        return $this->mobilePhone;
    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return User
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
        $this->setUpdatedAt(new DateTime('now'));

        if ($this->getCreatedAt() == null) {
            $this->setCreatedAt(new DateTime('now'));
        }
    }

}
