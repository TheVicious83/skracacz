<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cutter
 *
 * @ORM\Table(name="cutter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\cutterRepository")
 */
class cutter
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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="prefix", type="string", length=255)
     */
     private $prefix;

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
     * Set url
     *
     * @param string $url
     *
     * @return cutter
     */
    public function seturl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function geturl()
    {
        return $this->url;

    }

    /**
     * Set prefix
     *
     * @param string $prefix
     *
     * @return cutter
     */
    public function setprefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string
     */
    public function getprefix()
    {
        return $this->prefix;
    }

}
