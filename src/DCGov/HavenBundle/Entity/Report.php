<?php

namespace DCGov\HavenBundle\Entity;

/**
 * Report
 */
class Report
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $header;

    /**
     * @var string
     */
    private $sqlStatement;

    /**
     * @var string
     */
    private $settings;

    /**
     * @var boolean
     */
    private $isactive = '1';

    /**
     * @var string
     */
    private $modifiedBy;

    /**
     * @var \DateTime
     */
    private $modifiedTimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $createdTimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $createdBy;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Report
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set header
     *
     * @param string $header
     *
     * @return Report
     */
    public function setHeader($header)
    {
        $this->header = $header;

        return $this;
    }

    /**
     * Get header
     *
     * @return string
     */
    public function getHeader()
    {
        return $this->header;
    }

    /**
     * Set sqlStatement
     *
     * @param string $sqlStatement
     *
     * @return Report
     */
    public function setSqlStatement($sqlStatement)
    {
        $this->sqlStatement = $sqlStatement;

        return $this;
    }

    /**
     * Get sqlStatement
     *
     * @return string
     */
    public function getSqlStatement()
    {
        return $this->sqlStatement;
    }

    /**
     * Set settings
     *
     * @param string $settings
     *
     * @return Report
     */
    public function setSettings($settings)
    {
        $this->settings = $settings;

        return $this;
    }

    /**
     * Get settings
     *
     * @return string
     */
    public function getSettings()
    {
        return $this->settings;
    }

    /**
     * Set isactive
     *
     * @param boolean $isactive
     *
     * @return Report
     */
    public function setIsactive($isactive)
    {
        $this->isactive = $isactive;

        return $this;
    }

    /**
     * Get isactive
     *
     * @return boolean
     */
    public function getIsactive()
    {
        return $this->isactive;
    }

    /**
     * Set modifiedBy
     *
     * @param string $modifiedBy
     *
     * @return Report
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set modifiedTimestamp
     *
     * @param \DateTime $modifiedTimestamp
     *
     * @return Report
     */
    public function setModifiedTimestamp($modifiedTimestamp)
    {
        $this->modifiedTimestamp = $modifiedTimestamp;

        return $this;
    }

    /**
     * Get modifiedTimestamp
     *
     * @return \DateTime
     */
    public function getModifiedTimestamp()
    {
        return $this->modifiedTimestamp;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     *
     * @return Report
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get createdTimestamp
     *
     * @return \DateTime
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return Report
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
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
}

