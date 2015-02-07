<?php

namespace Site\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partenaires
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Site\FrontendBundle\Repository\PartenairesRepository")
 */
class Partenaires
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="lien_siteweb", type="string", length=255)
     */
    private $lienSiteweb;


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
     * @return Partenaires
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
     * Set lienSiteweb
     *
     * @param string $lienSiteweb
     * @return Partenaires
     */
    public function setLienSiteweb($lienSiteweb)
    {
        $this->lienSiteweb = $lienSiteweb;

        return $this;
    }

    /**
     * Get lienSiteweb
     *
     * @return string 
     */
    public function getLienSiteweb()
    {
        return $this->lienSiteweb;
    }


    /**
     * Set logo
     *
     * @param \Site\FrontendBundle\Entity\Media $logo
     * @return Partenaires
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
}
