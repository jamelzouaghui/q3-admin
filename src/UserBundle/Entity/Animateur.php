<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Animateur
 *
 * @ORM\Table(name="animateur")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\AnimateurRepository")
 */
class Animateur {

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
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     */
    private $profession;

    

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
     * Set focusgroupe
     *
     * @param \UserBundle\Entity\FocusGroupe $focusgroupe
     *
     * @return Animateur
     */
    public function setFocusgroupe(\UserBundle\Entity\FocusGroupe $focusgroupe = null)
    {
        $this->focusgroupe = $focusgroupe;

        return $this;
    }

    /**
     * Get focusgroupe
     *
     * @return \UserBundle\Entity\FocusGroupe
     */
    public function getFocusgroupe()
    {
        return $this->focusgroupe;
    }
}
