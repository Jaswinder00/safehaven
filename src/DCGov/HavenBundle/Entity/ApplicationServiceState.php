<?php

namespace DCGov\HavenBundle\Entity;

/**
 * ApplicationServiceState
 */
class ApplicationServiceState
{
    /**
     * @var integer
     */
    private $serviceLogid;

    /**
     * @var integer
     */
    private $applicationid;

    /**
     * @var string
     */
    private $logtype;

    /**
     * @var string
     */
    private $logkey;

    /**
     * @var string
     */
    private $action;

    /**
     * @var string
     */
    private $state;

    /**
     * @var integer
     */
    private $atempts;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set serviceLogid
     *
     * @param integer $serviceLogid
     *
     * @return ApplicationServiceState
     */
    public function setServiceLogid($serviceLogid)
    {
        $this->serviceLogid = $serviceLogid;

        return $this;
    }

    /**
     * Get serviceLogid
     *
     * @return integer
     */
    public function getServiceLogid()
    {
        return $this->serviceLogid;
    }

    /**
     * Set applicationid
     *
     * @param integer $applicationid
     *
     * @return ApplicationServiceState
     */
    public function setApplicationid($applicationid)
    {
        $this->applicationid = $applicationid;

        return $this;
    }

    /**
     * Get applicationid
     *
     * @return integer
     */
    public function getApplicationid()
    {
        return $this->applicationid;
    }

    /**
     * Set logtype
     *
     * @param string $logtype
     *
     * @return ApplicationServiceState
     */
    public function setLogtype($logtype)
    {
        $this->logtype = $logtype;

        return $this;
    }

    /**
     * Get logtype
     *
     * @return string
     */
    public function getLogtype()
    {
        return $this->logtype;
    }

    /**
     * Set logkey
     *
     * @param string $logkey
     *
     * @return ApplicationServiceState
     */
    public function setLogkey($logkey)
    {
        $this->logkey = $logkey;

        return $this;
    }

    /**
     * Get logkey
     *
     * @return string
     */
    public function getLogkey()
    {
        return $this->logkey;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return ApplicationServiceState
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
     * Set state
     *
     * @param string $state
     *
     * @return ApplicationServiceState
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set atempts
     *
     * @param integer $atempts
     *
     * @return ApplicationServiceState
     */
    public function setAtempts($atempts)
    {
        $this->atempts = $atempts;

        return $this;
    }

    /**
     * Get atempts
     *
     * @return integer
     */
    public function getAtempts()
    {
        return $this->atempts;
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
