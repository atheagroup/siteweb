<?php

namespace Site\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Clients
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\FrontendBundle\Repository\ClientsRepository")
 */
class Clients
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User\UtilisateursBundle\Entity\User", inversedBy="client")
     * @ORM\JoinColumn(nullable=true)
     */
    private $utilisateur;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      max = "12",
     *      minMessage = "Votre nom doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Votre nom ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenoms", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      max = "50",
     *      minMessage = "Votre Prénom doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Vos Prénom ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $prenoms;

    /**
     * @var \Date
     *
     * @ORM\Column(name="date_naissance", type="date")
     * @Assert\Date()
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=20)
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="nationalite", type="string", length=30)
     */
    private $nationalite;

    /**
     * @var string
     *
     * @ORM\Column(name="profession", type="string", length=255)
     * @Assert\Length(
     *      min = "6",
     *      max = "16",
     *      minMessage = "Votre Profession doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Vos Profession ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $profession;

    /**
     * @var string
     *
     * @ORM\Column(name="email_perso", type="string", length=255)
     * @Assert\Email(
     *     message = "'{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     */
    private $emailPerso;

    /**
     * @var string
     *
     * @ORM\Column(name="employeur", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      max = "16",
     *      minMessage = "Le Nom de votre employeur doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Le Nom de votre employeur ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $employeur;

    /**
     * @var string
     *
     * @ORM\Column(name="dernier_diplome", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      max = "20",
     *      minMessage = "Le Nom de votre dernier diplome doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Le Nom de votre dernier diplome ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $dernierDiplome;

    /**
     * @var string
     *
     * @ORM\Column(name="universite_ecole", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      max = "30",
     *      minMessage = "Le Nom de votre universite école doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Le Nom de votre universite école ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $universiteEcole;

    /**
     * @var integer
     *
     * @ORM\Column(name="annee_obtention", type="integer")
     * @Assert\Range(
     *      min = 4,
     *      minMessage = "Merci de choisir une année valide.",
     *      invalidMessage = "Merci de donner une année valide."
     * )
     */
    private $anneeObtention;

    /**
     * @var string
     *
     * @ORM\Column(name="fonction_actu", type="string", length=255)
     * @Assert\Length(
     *      min = "6",
     *      max = "16",
     *      minMessage = "Le Nom de votre fonction_actuelle doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Le Nom de votre fonction_actuelle ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $fonctionActu;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=255)
     * @Assert\Range(
     *      min = 8,
     *      maxMessage = "Merci de donner un numéro valide.",
     *      invalidMessage = "Merci de donner un numéro valide."
     * )
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone_bureau", type="string", length=255)
     * @Assert\Range(
     *      min = 8,
     *      maxMessage = "Merci de donner un numéro valide.",
     *      invalidMessage = "Merci de donner un numéro valide."
     * )
     */
    private $telephoneBureau;

    /**
     * @var string
     *
     * @ORM\Column(name="email_professionel", type="string", length=255)
     * @Assert\Email(
     *    message = "'{{ value }}' n'est pas un email valide.",
     *    checkMX = true
     * )
     */
    private $emailProfessionel;

    /**
     * @var string
     *
     * @ORM\Column(name="pays_residence", type="string", length=255)
     *  @Assert\Country
     */
    private $paysResidence;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      max = "16",
     *      minMessage = "Le Nom de votre ville doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Le Nom de votre ville ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="type_formation", type="string", length=255)
     */
    private $typeFormation;

    /**
     * @var string
     *
     * @ORM\Column(name="periode", type="string", length=255)
     */
    private $periode;

    /**
     * @var string
     *
     * @ORM\Column(name="methode_reglement", type="string", length=255)
     */
    private $methodeReglement;
    /**
     * @var Integer
     *
     * @ORM\Column(name="consulter", type="integer")
     */
    private $consulter;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     * @Assert\DateTime()
     */
    private $creationDate;

    public function __construct(){
        $this->creationDate = new \Datetime();
        $this->consulter = 0;
    }

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
     * @return Clients
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenoms
     *
     * @param string $prenoms
     * @return Clients
     */
    public function setPrenoms($prenoms)
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    /**
     * Get prenoms
     *
     * @return string 
     */
    public function getPrenoms()
    {
        return $this->prenoms;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     * @return Clients
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime 
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Clients
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set nationalite
     *
     * @param string $nationalite
     * @return Clients
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    /**
     * Get nationalite
     *
     * @return string 
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * Set profession
     *
     * @param string $profession
     * @return Clients
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

    /**
     * Set emailPerso
     *
     * @param string $emailPerso
     * @return Clients
     */
    public function setEmailPerso($emailPerso)
    {
        $this->emailPerso = $emailPerso;

        return $this;
    }

    /**
     * Get emailPerso
     *
     * @return string 
     */
    public function getEmailPerso()
    {
        return $this->emailPerso;
    }

    /**
     * Set employeur
     *
     * @param string $employeur
     * @return Clients
     */
    public function setEmployeur($employeur)
    {
        $this->employeur = $employeur;

        return $this;
    }

    /**
     * Get employeur
     *
     * @return string 
     */
    public function getEmployeur()
    {
        return $this->employeur;
    }

    /**
     * Set dernierDiplome
     *
     * @param string $dernierDiplome
     * @return Clients
     */
    public function setDernierDiplome($dernierDiplome)
    {
        $this->dernierDiplome = $dernierDiplome;

        return $this;
    }

    /**
     * Get dernierDiplome
     *
     * @return string 
     */
    public function getDernierDiplome()
    {
        return $this->dernierDiplome;
    }

    /**
     * Set universiteEcole
     *
     * @param string $universiteEcole
     * @return Clients
     */
    public function setUniversiteEcole($universiteEcole)
    {
        $this->universiteEcole = $universiteEcole;

        return $this;
    }

    /**
     * Get universiteEcole
     *
     * @return string 
     */
    public function getUniversiteEcole()
    {
        return $this->universiteEcole;
    }

    /**
     * Set anneeObtention
     *
     * @param integer $anneeObtention
     * @return Clients
     */
    public function setAnneeObtention($anneeObtention)
    {
        $this->anneeObtention = $anneeObtention;

        return $this;
    }

    /**
     * Get anneeObtention
     *
     * @return integer 
     */
    public function getAnneeObtention()
    {
        return $this->anneeObtention;
    }

    /**
     * Set fonctionActu
     *
     * @param string $fonctionActu
     * @return Clients
     */
    public function setFonctionActu($fonctionActu)
    {
        $this->fonctionActu = $fonctionActu;

        return $this;
    }

    /**
     * Get fonctionActu
     *
     * @return string 
     */
    public function getFonctionActu()
    {
        return $this->fonctionActu;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Clients
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set telephoneBureau
     *
     * @param string $telephoneBureau
     * @return Clients
     */
    public function setTelephoneBureau($telephoneBureau)
    {
        $this->telephoneBureau = $telephoneBureau;

        return $this;
    }

    /**
     * Get telephoneBureau
     *
     * @return string 
     */
    public function getTelephoneBureau()
    {
        return $this->telephoneBureau;
    }

    /**
     * Set emailProfessionel
     *
     * @param string $emailProfessionel
     * @return Clients
     */
    public function setEmailProfessionel($emailProfessionel)
    {
        $this->emailProfessionel = $emailProfessionel;

        return $this;
    }

    /**
     * Get emailProfessionel
     *
     * @return string 
     */
    public function getEmailProfessionel()
    {
        return $this->emailProfessionel;
    }

    /**
     * Set paysResidence
     *
     * @param string $paysResidence
     * @return Clients
     */
    public function setPaysResidence($paysResidence)
    {
        $this->paysResidence = $paysResidence;

        return $this;
    }

    /**
     * Get paysResidence
     *
     * @return string 
     */
    public function getPaysResidence()
    {
        return $this->paysResidence;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Clients
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set typeFormation
     *
     * @param string $typeFormation
     * @return Clients
     */
    public function setTypeFormation($typeFormation)
    {
        $this->typeFormation = $typeFormation;

        return $this;
    }

    /**
     * Get typeFormation
     *
     * @return string 
     */
    public function getTypeFormation()
    {
        return $this->typeFormation;
    }

    /**
     * Set periode
     *
     * @param string $periode
     * @return Clients
     */
    public function setPeriode($periode)
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * Get periode
     *
     * @return string 
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * Set methodeReglement
     *
     * @param string $methodeReglement
     * @return Clients
     */
    public function setMethodeReglement($methodeReglement)
    {
        $this->methodeReglement = $methodeReglement;

        return $this;
    }

    /**
     * Get methodeReglement
     *
     * @return string 
     */
    public function getMethodeReglement()
    {
        return $this->methodeReglement;
    }

    /**
     * Set offreAg
     *
     * @param string $offreAg
     * @return Clients
     */
    public function setOffreAg($offreAg)
    {
        $this->offreAg = $offreAg;

        return $this;
    }

    /**
     * Get offreAg
     *
     * @return string 
     */
    public function getOffreAg()
    {
        return $this->offreAg;
    }

    /**
     * Set offrePartenaire
     *
     * @param string $offrePartenaire
     * @return Clients
     */
    public function setOffrePartenaire($offrePartenaire)
    {
        $this->offrePartenaire = $offrePartenaire;

        return $this;
    }

    /**
     * Get offrePartenaire
     *
     * @return string 
     */
    public function getOffrePartenaire()
    {
        return $this->offrePartenaire;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Clients
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set utilisateur
     *
     * @param \User\UtilisateursBundle\Entity\User $utilisateur
     * @return Clients
     */
    public function setUtilisateur(\User\UtilisateursBundle\Entity\User $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \User\UtilisateursBundle\Entity\User 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set consulter
     *
     * @param integer $consulter
     * @return Clients
     */
    public function setConsulter($consulter)
    {
        $this->consulter = $consulter;

        return $this;
    }

    /**
     * Get consulter
     *
     * @return integer 
     */
    public function getConsulter()
    {
        return $this->consulter;
    }
}
