<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Administrateur
 *
 * @ORM\Table(name="adm_administrateur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdministrateurRepository")
 * @Vich\Uploadable
 */
class Administrateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="adm_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adm_firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="adm_phoneNumber", type="string", length=255, nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $contract;

    /**
     * @Vich\UploadableField(mapping="user_contracts", fileNameProperty="contract")
     * @var File
     */
    private $contractFile;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Administrateur
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set phoneNumber
     *
     * @param integer $phoneNumber
     *
     * @return Administrateur
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return int
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}

