<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use DateTime;

/**
 * Panel
 *
 * @ORM\Table(name="panel_entity")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\PanelRepository")
 */
class Panel {

   const OptOutTemporaire = 1;
    const OptOutDefinitif = 2;
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255, nullable=true)
     */
    private $prenom;


    /**
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     * @Assert\NotNull(message="Veuillez renseigner l'adresse email")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", length=255, nullable=true)
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="taille", type="string", length=255, nullable=true)
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="corpeOne", type="string", length=255, nullable=true)
     */
    private $corpeOne;

    /**
     * @var string
     *
     * @ORM\Column(name="corpeToo", type="string", length=255, nullable=true)
     */
    private $corpeToo;

    /**
     * @var string
     *
     * @ORM\Column(name="corpeThree", type="string", length=255, nullable=true)
     */
    private $corpeThree;

    /**
     * @var string
     *
     * @ORM\Column(name="verbatim", type="string", length=255, nullable=true)
     */
    private $verbatim;

    /**
     * @var integer
     *
     * @ORM\Column(name="q1", type="integer", nullable=true)
     */
    private $q1;

    /**
     * @var integer
     *
     * @ORM\Column(name="q2", type="integer", nullable=true)
     */
    private $q2;

    /**
     * @var integer
     *
     * @ORM\Column(name="q3", type="integer", nullable=true)
     */
    private $q3;

    /**
     * @var integer
     *
     * @ORM\Column(name="q4", type="integer", nullable=true)
     */
    private $q4;

    /**
     * @var integer
     *
     * @ORM\Column(name="q5", type="integer", nullable=true)
     */
    private $q5;

    /**
     * @var integer
     *
     * @ORM\Column(name="noteGlobale", type="integer", nullable=true)
     */
    private $noteGlobale;

    /**
     * @var integer
     *
     * @ORM\Column(name="moyenneEvaluation", type="integer", nullable=true)
     */
    private $moyenneEvaluation;
    

    /**
     * @var string
     *
     * @ORM\Column(name="classification", type="string", length=255, nullable=true)
     */
    private $classification;

    /**
     * @var string
     *
     * @ORM\Column(name="marque", type="string", length=255, nullable=true)
     */
    private $marque;


    /**
     * @var string
     *
     * @ORM\Column(name="solution", type="string", length=255, nullable=true)
     */
    private $solution;

    /**
     * @var string
     *
     * @ORM\Column(name="application", type="string", length=255, nullable=true)
     */
    private $application;


    /**
     * @var string
     *
     * @ORM\Column(name="distribution", type="string", length=255, nullable=true)
     */
    private $distribution;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=255, nullable=true)
     */
    private $departement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime", nullable=true)
     */
    private $dateCreation;
    

    /**
     * @var integer
     *
     * @ORM\Column(name="recommandation", type="integer", nullable=true)
     */
    private $recommandation;


    /**
     * @var integer
     *
     * @ORM\Column(name="refuseDiscussion", type="integer", nullable=true)
     */
    private $refuseDiscussion = 0;

    /**
     * @var int
     *
     * @ORM\Column(name="registerFB", type="integer", nullable=true)
     */
    private $registerFB;

    /**
     * @var int
     *
     * @ORM\Column(name="registerLI", type="integer", nullable=true)
     */
    private $registerLI;
    

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source= "Ajout manuel";

/**
     * @var string
     *
     * @ORM\Column(name="etat", type="integer", length=255, nullable=false, options={"default": 1})
     */
    private $etat = 1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateInscription", type="datetime", nullable=true)
     */
    private $dateInscription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDerniereMiseAJour", type="datetime", nullable=true)
     */
    private $dateDerniereMiseAJour;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return PanelEntity
     */
    public function setNom($nom)
    {
        $this->nom = utf8_encode($nom);

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return utf8_decode($this->nom);
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return PanelEntity
     */
    public function setPrenom($prenom)
    {
        $this->prenom = utf8_encode($prenom);

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return utf8_decode($this->prenom);
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return PanelEntity
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set societe
     *
     * @param string $societe
     *
     * @return PanelEntity
     */
    public function setSociete($societe)
    {
        $this->societe = utf8_encode($societe);

        return $this;
    }

    /**
     * Get societe
     *
     * @return string
     */
    public function getSociete()
    {
        return utf8_decode($this->societe);
    }

    /**
     * Set taille
     *
     * @param string $taille
     *
     * @return PanelEntity
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return string
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set corpeOne
     *
     * @param string $corpeOne
     *
     * @return PanelEntity
     */
    public function setCorpeOne($corpeOne)
    {
        $this->corpeOne = utf8_encode($corpeOne);

        return $this;
    }

    /**
     * Get corpeOne
     *
     * @return string
     */
    public function getCorpeOne()
    {
        return utf8_decode($this->corpeOne);
    }

    /**
     * Set corpeToo
     *
     * @param string $corpeToo
     *
     * @return PanelEntity
     */
    public function setCorpeToo($corpeToo)
    {
        $this->corpeToo = utf8_encode($corpeToo);

        return $this;
    }

    /**
     * Get corpeToo
     *
     * @return string
     */
    public function getCorpeToo()
    {
        return utf8_decode($this->corpeToo);
    }

    /**
     * Set corpeThree
     *
     * @param string $corpeThree
     *
     * @return PanelEntity
     */
    public function setCorpeThree($corpeThree)
    {
        $this->corpeThree = utf8_encode($corpeThree);

        return $this;
    }

    /**
     * Get corpeThree
     *
     * @return string
     */
    public function getCorpeThree()
    {
        return utf8_decode($this->corpeThree);
    }

    /**
     * Set verbatim
     *
     * @param string $verbatim
     *
     * @return PanelEntity
     */
    public function setVerbatim($verbatim)
    {
        $this->verbatim = $verbatim;

        return $this;
    }

    /**
     * Get verbatim
     *
     * @return string
     */
    public function getVerbatim()
    {
        return $this->verbatim;
    }

    /**
     * Set q1
     *
     * @param integer $q1
     *
     * @return PanelEntity
     */
    public function setQ1($q1)
    {
        $this->q1 = $q1;

        return $this;
    }

    /**
     * Get q1
     *
     * @return integer
     */
    public function getQ1()
    {
        return $this->q1;
    }

    /**
     * Set q2
     *
     * @param integer $q2
     *
     * @return PanelEntity
     */
    public function setQ2($q2)
    {
        $this->q2 = $q2;

        return $this;
    }

    /**
     * Get q2
     *
     * @return integer
     */
    public function getQ2()
    {
        return $this->q2;
    }

    /**
     * Set q3
     *
     * @param integer $q3
     *
     * @return PanelEntity
     */
    public function setQ3($q3)
    {
        $this->q3 = $q3;

        return $this;
    }

    /**
     * Get q3
     *
     * @return integer
     */
    public function getQ3()
    {
        return $this->q3;
    }

    /**
     * Set q4
     *
     * @param integer $q4
     *
     * @return PanelEntity
     */
    public function setQ4($q4)
    {
        $this->q4 = $q4;

        return $this;
    }

    /**
     * Get q4
     *
     * @return integer
     */
    public function getQ4()
    {
        return $this->q4;
    }

    /**
     * Set q5
     *
     * @param integer $q5
     *
     * @return PanelEntity
     */
    public function setQ5($q5)
    {
        $this->q5 = $q5;

        return $this;
    }

    /**
     * Get q5
     *
     * @return integer
     */
    public function getQ5()
    {
        return $this->q5;
    }

    /**
     * Set noteGlobale
     *
     * @param integer $noteGlobale
     *
     * @return PanelEntity
     */
    public function setNoteGlobale($noteGlobale)
    {
        $this->noteGlobale = $noteGlobale;

        return $this;
    }

    /**
     * Get noteGlobale
     *
     * @return integer
     */
    public function getNoteGlobale()
    {
        return $this->noteGlobale;
    }

    /**
     * Set moyenneEvaluation
     *
     * @param integer $moyenneEvaluation
     *
     * @return PanelEntity
     */
    public function setMoyenneEvaluation($moyenneEvaluation)
    {
        $this->moyenneEvaluation = $moyenneEvaluation;

        return $this;
    }

    /**
     * Get moyenneEvaluation
     *
     * @return integer
     */
    public function getMoyenneEvaluation()
    {
        return $this->moyenneEvaluation;
    }

    /**
     * Set classification
     *
     * @param string $classification
     *
     * @return PanelEntity
     */
    public function setClassification($classification)
    {
        $this->classification = $classification;

        return $this;
    }

    /**
     * Get classification
     *
     * @return string
     */
    public function getClassification()
    {
        return $this->classification;
    }

    /**
     * Set marque
     *
     * @param string $marque
     *
     * @return PanelEntity
     */
    public function setMarque($marque)
    {
        $this->marque = utf8_encode($marque);

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return utf8_decode($this->marque);
    }

    /**
     * Set solution
     *
     * @param string $solution
     *
     * @return PanelEntity
     */
    public function setSolution($solution)
    {
        $this->solution = utf8_encode($solution);

        return $this;
    }

    /**
     * Get solution
     *
     * @return string
     */
    public function getSolution()
    {
        return utf8_decode($this->solution);
    }

    /**
     * Set application
     *
     * @param string $application
     *
     * @return PanelEntity
     */
    public function setApplication($application)
    {
        $this->application = utf8_encode($application);

        return $this;
    }

    /**
     * Get application
     *
     * @return string
     */
    public function getApplication()
    {
        return utf8_decode($this->application);
    }

    /**
     * Set distribution
     *
     * @param string $distribution
     *
     * @return PanelEntity
     */
    public function setDistribution($distribution)
    {
        $this->distribution = utf8_encode($distribution);

        return $this;
    }

    /**
     * Get distribution
     *
     * @return string
     */
    public function getDistribution()
    {
        return utf8_decode($this->distribution);
    }

    /**
     * Set departement
     *
     * @param string $departement
     *
     * @return PanelEntity
     */
    public function setDepartement($departement)
    {
        $this->departement = utf8_encode($departement);

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return utf8_decode($this->departement);
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return PanelEntity
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set recommandation
     *
     * @param integer $recommandation
     *
     * @return PanelEntity
     */
    public function setRecommandation($recommandation)
    {
        $this->recommandation = $recommandation;

        return $this;
    }

    /**
     * Get recommandation
     *
     * @return integer
     */
    public function getRecommandation()
    {
        return $this->recommandation;
    }
    public function __toString()
    {
        return (string) $this->getNom();
    }
    

    /**
     * Set refuseDiscussion
     *
     * @param integer $refuseDiscussion
     *
     * @return PanelEntity
     */
    public function setRefuseDiscussion($refuseDiscussion)
    {
        $this->refuseDiscussion = $refuseDiscussion;

        return $this;
    }

    /**
     * Get refuseDiscussion
     *
     * @return integer
     */
    public function getRefuseDiscussion()
    {
        return $this->refuseDiscussion;
    }

    /**
     * Set photo
     *
     * @param string $photo
     *
     * @return PanelEntity
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set registerFB
     *
     * @param integer $registerFB
     *
     * @return PanelGroupeClient
     */
    public function setRegisterFB($registerFB)
    {
        $this->registerFB = $registerFB;

        return $this;
    }

    /**
     * Get registerFB
     *
     * @return integer
     */
    public function getRegisterFB()
    {
        return $this->registerFB;
    }

    /**
     * Set registerLI
     *
     * @param integer $registerLI
     *
     * @return PanelEntity
     */
    public function setRegisterLI($registerLI)
    {
        $this->registerLI = $registerLI;

        return $this;
    }

    /**
     * Get registerLI
     *
     * @return integer
     */
    public function getRegisterLI()
    {
        return $this->registerLI;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return PanelEntity
     */
    public function setSource($source)
    {
        $this->source = utf8_encode($source);

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return utf8_decode($this->source);
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return PanelEntity
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer
     */
    public function getEtat()
    {
        return $this->etat;
    }

}
