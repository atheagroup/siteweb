<?php

namespace Site\ContactUSBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact_us")
 * @ORM\Entity(repositoryClass="Site\ContactUSBundle\Repository\ContactRepository")
 */
class Contact
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     * @Assert\Length(
     *      min = "3",
     *      max = "16",
     *      minMessage = "Ce champ doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Ce champ ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=255)
     * @Assert\Range(
     *      min = 8,
     *      min = 9,
     *      maxMessage = "Merci de donner un numéro valide.",
     *      minMessage = "Merci de donner un numéro valide.",
     *      invalidMessage = "Merci de donner un numéro valide."
     * )
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email(
     *     message = "'{{ value }}' n'est pas un email valide.",
     *     checkMX = true
     * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="suijet", type="string", length=255)
     * @Assert\Length(
     *      min = "8",
     *      max = "16",
     *      minMessage = "Ce champ doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Ce champ ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $suijet;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     * @Assert\Length(
     *      min = "20",
     *      max = "1200",
     *      minMessage = "Ce champ doit faire au moins {{ limit }} caractères.",
     *      maxMessage = "Ce champ ne peut pas être plus long que {{ limit }} caractères."
     * )
     */
    private $message;

    /**
     * @var integer
     *
     * @ORM\Column(name="activated", type="integer")
     */
    private $activated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreation", type="datetime")
     */
    private $dateCreation;

    public function __construct(){
        $this->dateCreation = new \DateTime();
        $this->activated = 0;
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
     * @return Contact
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
     * Set telephone
     *
     * @param string $telephone
     * @return Contact
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
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
     * Set suijet
     *
     * @param string $suijet
     * @return Contact
     */
    public function setSuijet($suijet)
    {
        $this->suijet = $suijet;

        return $this;
    }

    /**
     * Get suijet
     *
     * @return string 
     */
    public function getSuijet()
    {
        return $this->suijet;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set activated
     *
     * @param integer $activated
     * @return Contact
     */
    public function setActivated($activated)
    {
        $this->activated = $activated;

        return $this;
    }

    /**
     * Get activated
     *
     * @return integer 
     */
    public function getActivated()
    {
        return $this->activated;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Contact
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
}
