<?php
// src/UserBundle/Entity/User.php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="nl_user")
 * @ORM\DiscriminatorColumn(name="disc",type="string")
 * @ORM\DiscriminatorMap({ "user" = "User", "contact" = "Contact"})
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 * @JMS\ExclusionPolicy("all")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
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
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     */
    private $profession;

    /**
     * @var string
     */
    protected $emailCanonical;
   /**
     * @ORM\Column(type="string")
     * @Assert\File(maxSize="10000000")
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     *
     */
    private $photo;

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Set civility
     *
     * @param string $civility
     *
     * @return User
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * Get civility
     *
     * @return string
     */
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return integer
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return User
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *$profession
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobilePhone
     *
     * @param string $mobilePhone
     *
     * @return User
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get mobilePhone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

//    /**
//     * Set photo
//     *
//     * @param \UserBundle\Entity\Media $photo
//     *
//     * @return User
//     */
//    public function setPhoto(\UserBundle\Entity\Media $photo = null)
//    {
//        $this->photo = $photo;
//
//        return $this;
//    }
//
//    /**
//     * Get photo
//     *
//     * @return \UserBundle\Entity\Media
//     */
//    public function getPhoto()
//    {
//        return $this->photo;
//    }

    /**
     * Set profession
     *
     * @param string $profession
     *
     * @return User
     */
    public function setProfession($profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return string
     */
    public function getProfession()
    {
        return $this->profession;
    }
}
