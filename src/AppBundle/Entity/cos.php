<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cos
 *
 * @ORM\Table(name="cos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\cosRepository")
 */
class cos
{
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
     * @ORM\Column(name="imie", type="string", length=255)
     */
    private $imie;

    /**
     * @var int
     *
     * @ORM\Column(name="wzrost", type="integer")
     */
    private $wzrost;

    /**
     * @var bool
     *
     * @ORM\Column(name="ispedal", type="boolean")
     */
    private $ispedal;

    /**
     * @var bool
     *
     * @ORM\Column(name="islubi", type="boolean", nullable=true)
     */
    private $islubi;


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
     * Set imie
     *
     * @param string $imie
     *
     * @return cos
     */
    public function setImie($imie)
    {
        $this->imie = $imie;

        return $this;
    }

    /**
     * Get imie
     *
     * @return string
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * Set wzrost
     *
     * @param integer $wzrost
     *
     * @return cos
     */
    public function setWzrost($wzrost)
    {
        $this->wzrost = $wzrost;

        return $this;
    }

    /**
     * Get wzrost
     *
     * @return int
     */
    public function getWzrost()
    {
        return $this->wzrost;
    }

    /**
     * Set ispedal
     *
     * @param boolean $ispedal
     *
     * @return cos
     */
    public function setIspedal($ispedal)
    {
        $this->ispedal = $ispedal;

        return $this;
    }

    /**
     * Get ispedal
     *
     * @return bool
     */
    public function getIspedal()
    {
        return $this->ispedal;
    }

    /**
     * @return mixed
     */
    public function getIslubi()
    {
        return $this->islubi;
    }

    /**
     * @param mixed $islubi
     */
    public function setIslubi($islubi)
    {
        $this->islubi = $islubi;
    }

}

