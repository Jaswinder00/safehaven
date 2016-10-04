<?php

namespace DCGov\HavenBundle\Entity;

/**
 * ApplicationServiceLog
 */
class ApplicationServiceLog
{
    /**
     * @var integer
     */
    private $serviceid;

    /**
     * @var boolean
     */
    private $isrequest;

    /**
     * @var boolean
     */
    private $isreponse;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $value;

    /**
     * @var \DateTime
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $performedby;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set serviceid
     *
     * @param integer $serviceid
     *
     * @return ApplicationServiceLog
     */
    public function setServiceid($serviceid)
    {
        $this->serviceid = $serviceid;

        return $this;
    }

    /**
     * Get serviceid
     *
     * @return integer
     */
    public function getServiceid()
    {
        return $this->serviceid;
    }

    /**
     * Set isrequest
     *
     * @param boolean $isrequest
     *
     * @return ApplicationServiceLog
     */
    public function setIsrequest($isrequest)
    {
        $this->isrequest = $isrequest;

        return $this;
    }

    /**
     * Get isrequest
     *
     * @return boolean
     */
    public function getIsrequest()
    {
        return $this->isrequest;
    }

    /**
     * Set isreponse
     *
     * @param boolean $isreponse
     *
     * @return ApplicationServiceLog
     */
    public function setIsreponse($isreponse)
    {
        $this->isreponse = $isreponse;

        return $this;
    }

    /**
     * Get isreponse
     *
     * @return boolean
     */
    public function getIsreponse()
    {
        return $this->isreponse;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return ApplicationServiceLog
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return ApplicationServiceLog
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return ApplicationServiceLog
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set performedby
     *
     * @param string $performedby
     *
     * @return ApplicationServiceLog
     */
    public function setPerformedby($performedby)
    {
        $this->performedby = $performedby;

        return $this;
    }

    /**
     * Get performedby
     *
     * @return string
     */
    public function getPerformedby()
    {
        return $this->performedby;
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
