<?php

namespace DCGov\HavenBundle\Entity;

/**
 * Application
 */
class Application
{
    /**
     * @var string
     */
    private $statecd;

    /**
     * @var string
     */
    private $year;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $postdate;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $statustimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $addressstreet;

    /**
     * @var string
     */
    private $addresscity;

    /**
     * @var string
     */
    private $addressstate;

    /**
     * @var string
     */
    private $requesttype;

    /**
     * @var string
     */
    private $erFlag;

    /**
     * @var string
     */
    private $edpFlag;

    /**
     * @var string
     */
    private $icnumber;

    /**
     * @var string
     */
    private $comments;

    /**
     * @var \DateTime
     */
    private $createdTimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    private $createdBy = '1';

    /**
     * @var integer
     */
    private $applicationid;


    /**
     * Set statecd
     *
     * @param string $statecd
     *
     * @return Application
     */
    public function setStatecd($statecd)
    {
        $this->statecd = $statecd;

        return $this;
    }

    /**
     * Get statecd
     *
     * @return string
     */
    public function getStatecd()
    {
        return $this->statecd;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return Application
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Application
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
     * Set postdate
     *
     * @param \DateTime $postdate
     *
     * @return Application
     */
    public function setPostdate($postdate)
    {
        $this->postdate = $postdate;

        return $this;
    }

    /**
     * Get postdate
     *
     * @return \DateTime
     */
    public function getPostdate()
    {
        return $this->postdate;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Application
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set statustimestamp
     *
     * @param \DateTime $statustimestamp
     *
     * @return Application
     */
    public function setStatustimestamp($statustimestamp)
    {
        $this->statustimestamp = $statustimestamp;

        return $this;
    }

    /**
     * Get statustimestamp
     *
     * @return \DateTime
     */
    public function getStatustimestamp()
    {
        return $this->statustimestamp;
    }

    /**
     * Set addressstreet
     *
     * @param string $addressstreet
     *
     * @return Application
     */
    public function setAddressstreet($addressstreet)
    {
        $this->addressstreet = $addressstreet;

        return $this;
    }

    /**
     * Get addressstreet
     *
     * @return string
     */
    public function getAddressstreet()
    {
        return $this->addressstreet;
    }

    /**
     * Set addresscity
     *
     * @param string $addresscity
     *
     * @return Application
     */
    public function setAddresscity($addresscity)
    {
        $this->addresscity = $addresscity;

        return $this;
    }

    /**
     * Get addresscity
     *
     * @return string
     */
    public function getAddresscity()
    {
        return $this->addresscity;
    }

    /**
     * Set addressstate
     *
     * @param string $addressstate
     *
     * @return Application
     */
    public function setAddressstate($addressstate)
    {
        $this->addressstate = $addressstate;

        return $this;
    }

    /**
     * Get addressstate
     *
     * @return string
     */
    public function getAddressstate()
    {
        return $this->addressstate;
    }

    /**
     * Set requesttype
     *
     * @param string $requesttype
     *
     * @return Application
     */
    public function setRequesttype($requesttype)
    {
        $this->requesttype = $requesttype;

        return $this;
    }

    /**
     * Get requesttype
     *
     * @return string
     */
    public function getRequesttype()
    {
        return $this->requesttype;
    }

    /**
     * Set erFlag
     *
     * @param string $erFlag
     *
     * @return Application
     */
    public function setErFlag($erFlag)
    {
        $this->erFlag = $erFlag;

        return $this;
    }

    /**
     * Get erFlag
     *
     * @return string
     */
    public function getErFlag()
    {
        return $this->erFlag;
    }

    /**
     * Set edpFlag
     *
     * @param string $edpFlag
     *
     * @return Application
     */
    public function setEdpFlag($edpFlag)
    {
        $this->edpFlag = $edpFlag;

        return $this;
    }

    /**
     * Get edpFlag
     *
     * @return string
     */
    public function getEdpFlag()
    {
        return $this->edpFlag;
    }

    /**
     * Set icnumber
     *
     * @param string $icnumber
     *
     * @return Application
     */
    public function setIcnumber($icnumber)
    {
        $this->icnumber = $icnumber;

        return $this;
    }

    /**
     * Get icnumber
     *
     * @return string
     */
    public function getIcnumber()
    {
        return $this->icnumber;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Application
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     *
     * @return Application
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
     * @param integer $createdBy
     *
     * @return Application
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
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
}

