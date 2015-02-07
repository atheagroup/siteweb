<?php

namespace Site\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\FrontendBundle\Repository\ArticleRepository")
 */
class Article
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
     * @ORM\OneToOne(targetEntity="Site\FrontendBundle\Entity\Media" ,cascade={"persist","remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $logo;

    /**
     * @ORM\ManyToMany(targetEntity="Site\FrontendBundle\Entity\Metiers",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $metiers;

    /**
     * @ORM\ManyToMany(targetEntity="Site\FrontendBundle\Entity\NiveauxEtudes",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveauEtudes;

    /**
     * @ORM\ManyToOne(targetEntity="Site\FrontendBundle\Entity\Villes",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="type_offre", type="string", length=255)
     */
    private $typeOffre;

    /**
     * @var \date
     *
     * @ORM\Column(name="date_limite", type="date")
     */
    private $dateLimite;

    /**
     * @var string
     *
     * @ORM\Column(name="experiences", type="string", length=255)
     */
    private $experiences;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var text
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;


    /**
     * @var string
     *
     * @ORM\Column(name="nom_entreprise", type="string", length=255)
     */
    private $nomEntreprise;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime")
     */
    private $creationDate;

    public function __construct()
    {
        $this->creationDate = new \Datetime();
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection() ;
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
     * Set typeOffre
     *
     * @param string $typeOffre
     * @return Article
     */
    public function setTypeOffre($typeOffre)
    {
        $this->typeOffre = $typeOffre;

        return $this;
    }

    /**
     * Get typeOffre
     *
     * @return string 
     */
    public function getTypeOffre()
    {
        return $this->typeOffre;
    }

    /**
     * Set dateLimite
     *
     * @param \DateTime $dateLimite
     * @return Article
     */
    public function setDateLimite($dateLimite)
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * Get dateLimite
     *
     * @return \DateTime 
     */
    public function getDateLimite()
    {
        return $this->dateLimite;
    }

    /**
     * Set niveauEtude
     *
     * @param string $niveauEtude
     * @return Article
     */
    public function setNiveauEtude($niveauEtude)
    {
        $this->niveauEtude = $niveauEtude;

        return $this;
    }

    /**
     * Get niveauEtude
     *
     * @return string 
     */
    public function getNiveauEtude()
    {
        return $this->niveauEtude;
    }

    /**
     * Set experiences
     *
     * @param string $experiences
     * @return Article
     */
    public function setExperiences($experiences)
    {
        $this->experiences = $experiences;

        return $this;
    }

    /**
     * Get experiences
     *
     * @return string 
     */
    public function getExperiences()
    {
        return $this->experiences;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }


    /**
     * Set nomEntreprise
     *
     * @param string $nomEntreprise
     * @return Article
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get nomEntreprise
     *
     * @return string 
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Article
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
     * Set logo
     *
     * @param \Site\FrontendBundle\Entity\Media $logo
     * @return Article
     */
    public function setLogo(\Site\FrontendBundle\Entity\Media $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return \Site\FrontendBundle\Entity\Media 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set metiers
     *
     * @param \Site\FrontendBundle\Entity\Metiers $metiers
     * @return Article
     */
    public function setMetiers(\Site\FrontendBundle\Entity\Metiers $metiers = null)
    {
        $this->metiers = $metiers;

        return $this;
    }

    /**
     * Get metiers
     *
     * @return \Site\FrontendBundle\Entity\Metiers 
     */
    public function getMetiers()
    {
        return $this->metiers;
    }

    /**
     * Add metiers
     *
     * @param \Site\FrontendBundle\Entity\Metiers $metiers
     * @return Article
     */
    public function addMetier(\Site\FrontendBundle\Entity\Metiers $metiers)
    {
        $this->metiers[] = $metiers;

        return $this;
    }

    /**
     * Remove metiers
     *
     * @param \Site\FrontendBundle\Entity\Metiers $metiers
     */
    public function removeMetier(\Site\FrontendBundle\Entity\Metiers $metiers)
    {
        $this->metiers->removeElement($metiers);
    }

    /**
     * Set ville
     *
     * @param \Site\FrontendBundle\Entity\Villes $ville
     * @return Article
     */
    public function setVille(\Site\FrontendBundle\Entity\Villes $ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \Site\FrontendBundle\Entity\Villes 
     */
    public function getVille()
    {
        return $this->ville;
    }


    /**
     * Add niveauEtudes
     *
     * @param \Site\FrontendBundle\Entity\NiveauxEtudes $niveauEtudes
     * @return Article
     */
    public function addNiveauEtude(\Site\FrontendBundle\Entity\NiveauxEtudes $niveauEtudes)
    {
        $this->niveauEtudes[] = $niveauEtudes;

        return $this;
    }

    /**
     * Remove niveauEtudes
     *
     * @param \Site\FrontendBundle\Entity\NiveauxEtudes $niveauEtudes
     */
    public function removeNiveauEtude(\Site\FrontendBundle\Entity\NiveauxEtudes $niveauEtudes)
    {
        $this->niveauEtudes->removeElement($niveauEtudes);
    }

    /**
     * Get niveauEtudes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNiveauEtudes()
    {
        return $this->niveauEtudes;
    }
}
