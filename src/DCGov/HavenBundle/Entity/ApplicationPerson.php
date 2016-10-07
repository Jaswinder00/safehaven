<?php

namespace DCGov\HavenBundle\Entity;

/**
 * ApplicationPerson
 */
class ApplicationPerson
{
    /**
     * @var string
     */
    private $isapplicant;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var integer
     */
    private $hrsworked;

    /**
     * @var string
     */
    private $isdisabled;

    /**
     * @var string
     */
    private $isstudent;

    /**
     * @var string
     */
    private $ismedicareentitled;

    /**
     * @var string
     */
    private $isstateresident;

    /**
     * @var string
     */
    private $isltcattest;

    /**
     * @var string
     */
    private $isotherclaimed;

    /**
     * @var string
     */
    private $isinsured;

    /**
     * @var string
     */
    private $ispriorinsured;

    /**
     * @var string
     */
    private $ispublicempbenefit;

    /**
     * @var string
     */
    private $isfomerfoster;

    /**
     * @var string
     */
    private $ispregnenant;

    /**
     * @var string
     */
    private $islast3pregnant;

    /**
     * @var string
     */
    private $isuscitizen;

    /**
     * @var string
     */
    private $isincarcerated;

    /**
     * @var string
     */
    private $istaxrequied;

    /**
     * @var string
     */
    private $dod;

    /**
     * @var integer
     */
    private $numchildren;

    /**
     * @var string
     */
    private $isclaimedoos;

    /**
     * @var \DateTime
     */
    private $priorinsuranceenddate;

    /**
     * @var string
     */
    private $hadfostermedicaid;

    /**
     * @var integer
     */
    private $ageleftfoster;

    /**
     * @var string
     */
    private $fosterstatecd;

    /**
     * @var string
     */
    private $lawllyfullypresent;

    /**
     * @var string
     */
    private $immigrationstatus;

    /**
     * @var string
     */
    private $iseligible;

    /**
     * @var string
     */
    private $americanstatus;

    /**
     * @var string
     */
    private $vetstatus;

    /**
     * @var string
     */
    private $trafffickingvictim;

    /**
     * @var \DateTime
     */
    private $immigrationdate;

    /**
     * @var string
     */
    private $fiveyearbar;

    /**
     * @var string
     */
    private $fiveyearbarmet;

    /**
     * @var string
     */
    private $fortyquaters;

    /**
     * @var string
     */
    private $immigrationdatetype;

    /**
     * @var string
     */
    private $ffcapitalgains;

    /**
     * @var string
     */
    private $capitalgains;

    /**
     * @var string
     */
    private $mcmcapitalgains;

    /**
     * @var string
     */
    private $agegt90;

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
    private $istempoos;

    /**
     * @var string
     */
    private $nofixedaddress;

    /**
     * @var \DateTime
     */
    private $createdTimestamp = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     */
    private $nativeamerican;

    /**
     * @var string
     */
    private $tobaccouser;

    /**
     * @var string
     */
    private $addresszip;

    /**
     * @var string
     */
    private $lastupdateUserid;

    /**
     * @var string
     */
    private $lastupdateTimestamp;

    /**
     * @var string
     */
    private $projectedAmount;

    /**
     * @var string
     */
    private $citStatNull;

    /**
     * @var \DCGov\HavenBundle\Entity\Application
     */
    private $applicationid;

    /**
     * @var \DCGov\HavenBundle\Entity\Person
     */
    private $personid;


    /**
     * Set isapplicant
     *
     * @param string $isapplicant
     *
     * @return ApplicationPerson
     */
    public function setIsapplicant($isapplicant)
    {
        $this->isapplicant = $isapplicant;

        return $this;
    }

    /**
     * Get isapplicant
     *
     * @return string
     */
    public function getIsapplicant()
    {
        return $this->isapplicant;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return ApplicationPerson
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
     * Set age
     *
     * @param integer $age
     *
     * @return ApplicationPerson
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set hrsworked
     *
     * @param integer $hrsworked
     *
     * @return ApplicationPerson
     */
    public function setHrsworked($hrsworked)
    {
        $this->hrsworked = $hrsworked;

        return $this;
    }

    /**
     * Get hrsworked
     *
     * @return integer
     */
    public function getHrsworked()
    {
        return $this->hrsworked;
    }

    /**
     * Set isdisabled
     *
     * @param string $isdisabled
     *
     * @return ApplicationPerson
     */
    public function setIsdisabled($isdisabled)
    {
        $this->isdisabled = $isdisabled;

        return $this;
    }

    /**
     * Get isdisabled
     *
     * @return string
     */
    public function getIsdisabled()
    {
        return $this->isdisabled;
    }

    /**
     * Set isstudent
     *
     * @param string $isstudent
     *
     * @return ApplicationPerson
     */
    public function setIsstudent($isstudent)
    {
        $this->isstudent = $isstudent;

        return $this;
    }

    /**
     * Get isstudent
     *
     * @return string
     */
    public function getIsstudent()
    {
        return $this->isstudent;
    }

    /**
     * Set ismedicareentitled
     *
     * @param string $ismedicareentitled
     *
     * @return ApplicationPerson
     */
    public function setIsmedicareentitled($ismedicareentitled)
    {
        $this->ismedicareentitled = $ismedicareentitled;

        return $this;
    }

    /**
     * Get ismedicareentitled
     *
     * @return string
     */
    public function getIsmedicareentitled()
    {
        return $this->ismedicareentitled;
    }

    /**
     * Set isstateresident
     *
     * @param string $isstateresident
     *
     * @return ApplicationPerson
     */
    public function setIsstateresident($isstateresident)
    {
        $this->isstateresident = $isstateresident;

        return $this;
    }

    /**
     * Get isstateresident
     *
     * @return string
     */
    public function getIsstateresident()
    {
        return $this->isstateresident;
    }

    /**
     * Set isltcattest
     *
     * @param string $isltcattest
     *
     * @return ApplicationPerson
     */
    public function setIsltcattest($isltcattest)
    {
        $this->isltcattest = $isltcattest;

        return $this;
    }

    /**
     * Get isltcattest
     *
     * @return string
     */
    public function getIsltcattest()
    {
        return $this->isltcattest;
    }

    /**
     * Set isotherclaimed
     *
     * @param string $isotherclaimed
     *
     * @return ApplicationPerson
     */
    public function setIsotherclaimed($isotherclaimed)
    {
        $this->isotherclaimed = $isotherclaimed;

        return $this;
    }

    /**
     * Get isotherclaimed
     *
     * @return string
     */
    public function getIsotherclaimed()
    {
        return $this->isotherclaimed;
    }

    /**
     * Set isinsured
     *
     * @param string $isinsured
     *
     * @return ApplicationPerson
     */
    public function setIsinsured($isinsured)
    {
        $this->isinsured = $isinsured;

        return $this;
    }

    /**
     * Get isinsured
     *
     * @return string
     */
    public function getIsinsured()
    {
        return $this->isinsured;
    }

    /**
     * Set ispriorinsured
     *
     * @param string $ispriorinsured
     *
     * @return ApplicationPerson
     */
    public function setIspriorinsured($ispriorinsured)
    {
        $this->ispriorinsured = $ispriorinsured;

        return $this;
    }

    /**
     * Get ispriorinsured
     *
     * @return string
     */
    public function getIspriorinsured()
    {
        return $this->ispriorinsured;
    }

    /**
     * Set ispublicempbenefit
     *
     * @param string $ispublicempbenefit
     *
     * @return ApplicationPerson
     */
    public function setIspublicempbenefit($ispublicempbenefit)
    {
        $this->ispublicempbenefit = $ispublicempbenefit;

        return $this;
    }

    /**
     * Get ispublicempbenefit
     *
     * @return string
     */
    public function getIspublicempbenefit()
    {
        return $this->ispublicempbenefit;
    }

    /**
     * Set isfomerfoster
     *
     * @param string $isfomerfoster
     *
     * @return ApplicationPerson
     */
    public function setIsfomerfoster($isfomerfoster)
    {
        $this->isfomerfoster = $isfomerfoster;

        return $this;
    }

    /**
     * Get isfomerfoster
     *
     * @return string
     */
    public function getIsfomerfoster()
    {
        return $this->isfomerfoster;
    }

    /**
     * Set ispregnenant
     *
     * @param string $ispregnenant
     *
     * @return ApplicationPerson
     */
    public function setIspregnenant($ispregnenant)
    {
        $this->ispregnenant = $ispregnenant;

        return $this;
    }

    /**
     * Get ispregnenant
     *
     * @return string
     */
    public function getIspregnenant()
    {
        return $this->ispregnenant;
    }

    /**
     * Set islast3pregnant
     *
     * @param string $islast3pregnant
     *
     * @return ApplicationPerson
     */
    public function setIslast3pregnant($islast3pregnant)
    {
        $this->islast3pregnant = $islast3pregnant;

        return $this;
    }

    /**
     * Get islast3pregnant
     *
     * @return string
     */
    public function getIslast3pregnant()
    {
        return $this->islast3pregnant;
    }

    /**
     * Set isuscitizen
     *
     * @param string $isuscitizen
     *
     * @return ApplicationPerson
     */
    public function setIsuscitizen($isuscitizen)
    {
        $this->isuscitizen = $isuscitizen;

        return $this;
    }

    /**
     * Get isuscitizen
     *
     * @return string
     */
    public function getIsuscitizen()
    {
        return $this->isuscitizen;
    }

    /**
     * Set isincarcerated
     *
     * @param string $isincarcerated
     *
     * @return ApplicationPerson
     */
    public function setIsincarcerated($isincarcerated)
    {
        $this->isincarcerated = $isincarcerated;

        return $this;
    }

    /**
     * Get isincarcerated
     *
     * @return string
     */
    public function getIsincarcerated()
    {
        return $this->isincarcerated;
    }

    /**
     * Set istaxrequied
     *
     * @param string $istaxrequied
     *
     * @return ApplicationPerson
     */
    public function setIstaxrequied($istaxrequied)
    {
        $this->istaxrequied = $istaxrequied;

        return $this;
    }

    /**
     * Get istaxrequied
     *
     * @return string
     */
    public function getIstaxrequied()
    {
        return $this->istaxrequied;
    }

    /**
     * Set dod
     *
     * @param string $dod
     *
     * @return ApplicationPerson
     */
    public function setDod($dod)
    {
        $this->dod = $dod;

        return $this;
    }

    /**
     * Get dod
     *
     * @return string
     */
    public function getDod()
    {
        return $this->dod;
    }

    /**
     * Set numchildren
     *
     * @param integer $numchildren
     *
     * @return ApplicationPerson
     */
    public function setNumchildren($numchildren)
    {
        $this->numchildren = $numchildren;

        return $this;
    }

    /**
     * Get numchildren
     *
     * @return integer
     */
    public function getNumchildren()
    {
        return $this->numchildren;
    }

    /**
     * Set isclaimedoos
     *
     * @param string $isclaimedoos
     *
     * @return ApplicationPerson
     */
    public function setIsclaimedoos($isclaimedoos)
    {
        $this->isclaimedoos = $isclaimedoos;

        return $this;
    }

    /**
     * Get isclaimedoos
     *
     * @return string
     */
    public function getIsclaimedoos()
    {
        return $this->isclaimedoos;
    }

    /**
     * Set priorinsuranceenddate
     *
     * @param \DateTime $priorinsuranceenddate
     *
     * @return ApplicationPerson
     */
    public function setPriorinsuranceenddate($priorinsuranceenddate)
    {
        $this->priorinsuranceenddate = $priorinsuranceenddate;

        return $this;
    }

    /**
     * Get priorinsuranceenddate
     *
     * @return \DateTime
     */
    public function getPriorinsuranceenddate()
    {
        return $this->priorinsuranceenddate;
    }

    /**
     * Set hadfostermedicaid
     *
     * @param string $hadfostermedicaid
     *
     * @return ApplicationPerson
     */
    public function setHadfostermedicaid($hadfostermedicaid)
    {
        $this->hadfostermedicaid = $hadfostermedicaid;

        return $this;
    }

    /**
     * Get hadfostermedicaid
     *
     * @return string
     */
    public function getHadfostermedicaid()
    {
        return $this->hadfostermedicaid;
    }

    /**
     * Set ageleftfoster
     *
     * @param integer $ageleftfoster
     *
     * @return ApplicationPerson
     */
    public function setAgeleftfoster($ageleftfoster)
    {
        $this->ageleftfoster = $ageleftfoster;

        return $this;
    }

    /**
     * Get ageleftfoster
     *
     * @return integer
     */
    public function getAgeleftfoster()
    {
        return $this->ageleftfoster;
    }

    /**
     * Set fosterstatecd
     *
     * @param string $fosterstatecd
     *
     * @return ApplicationPerson
     */
    public function setFosterstatecd($fosterstatecd)
    {
        $this->fosterstatecd = $fosterstatecd;

        return $this;
    }

    /**
     * Get fosterstatecd
     *
     * @return string
     */
    public function getFosterstatecd()
    {
        return $this->fosterstatecd;
    }

    /**
     * Set lawllyfullypresent
     *
     * @param string $lawllyfullypresent
     *
     * @return ApplicationPerson
     */
    public function setLawllyfullypresent($lawllyfullypresent)
    {
        $this->lawllyfullypresent = $lawllyfullypresent;

        return $this;
    }

    /**
     * Get lawllyfullypresent
     *
     * @return string
     */
    public function getLawllyfullypresent()
    {
        return $this->lawllyfullypresent;
    }

    /**
     * Set immigrationstatus
     *
     * @param string $immigrationstatus
     *
     * @return ApplicationPerson
     */
    public function setImmigrationstatus($immigrationstatus)
    {
        $this->immigrationstatus = $immigrationstatus;

        return $this;
    }

    /**
     * Get immigrationstatus
     *
     * @return string
     */
    public function getImmigrationstatus()
    {
        return $this->immigrationstatus;
    }

    /**
     * Set iseligible
     *
     * @param string $iseligible
     *
     * @return ApplicationPerson
     */
    public function setIseligible($iseligible)
    {
        $this->iseligible = $iseligible;

        return $this;
    }

    /**
     * Get iseligible
     *
     * @return string
     */
    public function getIseligible()
    {
        return $this->iseligible;
    }

    /**
     * Set americanstatus
     *
     * @param string $americanstatus
     *
     * @return ApplicationPerson
     */
    public function setAmericanstatus($americanstatus)
    {
        $this->americanstatus = $americanstatus;

        return $this;
    }

    /**
     * Get americanstatus
     *
     * @return string
     */
    public function getAmericanstatus()
    {
        return $this->americanstatus;
    }

    /**
     * Set vetstatus
     *
     * @param string $vetstatus
     *
     * @return ApplicationPerson
     */
    public function setVetstatus($vetstatus)
    {
        $this->vetstatus = $vetstatus;

        return $this;
    }

    /**
     * Get vetstatus
     *
     * @return string
     */
    public function getVetstatus()
    {
        return $this->vetstatus;
    }

    /**
     * Set trafffickingvictim
     *
     * @param string $trafffickingvictim
     *
     * @return ApplicationPerson
     */
    public function setTrafffickingvictim($trafffickingvictim)
    {
        $this->trafffickingvictim = $trafffickingvictim;

        return $this;
    }

    /**
     * Get trafffickingvictim
     *
     * @return string
     */
    public function getTrafffickingvictim()
    {
        return $this->trafffickingvictim;
    }

    /**
     * Set immigrationdate
     *
     * @param \DateTime $immigrationdate
     *
     * @return ApplicationPerson
     */
    public function setImmigrationdate($immigrationdate)
    {
        $this->immigrationdate = $immigrationdate;

        return $this;
    }

    /**
     * Get immigrationdate
     *
     * @return \DateTime
     */
    public function getImmigrationdate()
    {
        return $this->immigrationdate;
    }

    /**
     * Set fiveyearbar
     *
     * @param string $fiveyearbar
     *
     * @return ApplicationPerson
     */
    public function setFiveyearbar($fiveyearbar)
    {
        $this->fiveyearbar = $fiveyearbar;

        return $this;
    }

    /**
     * Get fiveyearbar
     *
     * @return string
     */
    public function getFiveyearbar()
    {
        return $this->fiveyearbar;
    }

    /**
     * Set fiveyearbarmet
     *
     * @param string $fiveyearbarmet
     *
     * @return ApplicationPerson
     */
    public function setFiveyearbarmet($fiveyearbarmet)
    {
        $this->fiveyearbarmet = $fiveyearbarmet;

        return $this;
    }

    /**
     * Get fiveyearbarmet
     *
     * @return string
     */
    public function getFiveyearbarmet()
    {
        return $this->fiveyearbarmet;
    }

    /**
     * Set fortyquaters
     *
     * @param string $fortyquaters
     *
     * @return ApplicationPerson
     */
    public function setFortyquaters($fortyquaters)
    {
        $this->fortyquaters = $fortyquaters;

        return $this;
    }

    /**
     * Get fortyquaters
     *
     * @return string
     */
    public function getFortyquaters()
    {
        return $this->fortyquaters;
    }

    /**
     * Set immigrationdatetype
     *
     * @param string $immigrationdatetype
     *
     * @return ApplicationPerson
     */
    public function setImmigrationdatetype($immigrationdatetype)
    {
        $this->immigrationdatetype = $immigrationdatetype;

        return $this;
    }

    /**
     * Get immigrationdatetype
     *
     * @return string
     */
    public function getImmigrationdatetype()
    {
        return $this->immigrationdatetype;
    }

    /**
     * Set ffcapitalgains
     *
     * @param string $ffcapitalgains
     *
     * @return ApplicationPerson
     */
    public function setFfcapitalgains($ffcapitalgains)
    {
        $this->ffcapitalgains = $ffcapitalgains;

        return $this;
    }

    /**
     * Get ffcapitalgains
     *
     * @return string
     */
    public function getFfcapitalgains()
    {
        return $this->ffcapitalgains;
    }

    /**
     * Set capitalgains
     *
     * @param string $capitalgains
     *
     * @return ApplicationPerson
     */
    public function setCapitalgains($capitalgains)
    {
        $this->capitalgains = $capitalgains;

        return $this;
    }

    /**
     * Get capitalgains
     *
     * @return string
     */
    public function getCapitalgains()
    {
        return $this->capitalgains;
    }

    /**
     * Set mcmcapitalgains
     *
     * @param string $mcmcapitalgains
     *
     * @return ApplicationPerson
     */
    public function setMcmcapitalgains($mcmcapitalgains)
    {
        $this->mcmcapitalgains = $mcmcapitalgains;

        return $this;
    }

    /**
     * Get mcmcapitalgains
     *
     * @return string
     */
    public function getMcmcapitalgains()
    {
        return $this->mcmcapitalgains;
    }

    /**
     * Set agegt90
     *
     * @param string $agegt90
     *
     * @return ApplicationPerson
     */
    public function setAgegt90($agegt90)
    {
        $this->agegt90 = $agegt90;

        return $this;
    }

    /**
     * Get agegt90
     *
     * @return string
     */
    public function getAgegt90()
    {
        return $this->agegt90;
    }

    /**
     * Set addressstreet
     *
     * @param string $addressstreet
     *
     * @return ApplicationPerson
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
     * @return ApplicationPerson
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
     * @return ApplicationPerson
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
     * Set istempoos
     *
     * @param string $istempoos
     *
     * @return ApplicationPerson
     */
    public function setIstempoos($istempoos)
    {
        $this->istempoos = $istempoos;

        return $this;
    }

    /**
     * Get istempoos
     *
     * @return string
     */
    public function getIstempoos()
    {
        return $this->istempoos;
    }

    /**
     * Set nofixedaddress
     *
     * @param string $nofixedaddress
     *
     * @return ApplicationPerson
     */
    public function setNofixedaddress($nofixedaddress)
    {
        $this->nofixedaddress = $nofixedaddress;

        return $this;
    }

    /**
     * Get nofixedaddress
     *
     * @return string
     */
    public function getNofixedaddress()
    {
        return $this->nofixedaddress;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     *
     * @return ApplicationPerson
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
     * Set nativeamerican
     *
     * @param string $nativeamerican
     *
     * @return ApplicationPerson
     */
    public function setNativeamerican($nativeamerican)
    {
        $this->nativeamerican = $nativeamerican;

        return $this;
    }

    /**
     * Get nativeamerican
     *
     * @return string
     */
    public function getNativeamerican()
    {
        return $this->nativeamerican;
    }

    /**
     * Set tobaccouser
     *
     * @param string $tobaccouser
     *
     * @return ApplicationPerson
     */
    public function setTobaccouser($tobaccouser)
    {
        $this->tobaccouser = $tobaccouser;

        return $this;
    }

    /**
     * Get tobaccouser
     *
     * @return string
     */
    public function getTobaccouser()
    {
        return $this->tobaccouser;
    }

    /**
     * Set addresszip
     *
     * @param string $addresszip
     *
     * @return ApplicationPerson
     */
    public function setAddresszip($addresszip)
    {
        $this->addresszip = $addresszip;

        return $this;
    }

    /**
     * Get addresszip
     *
     * @return string
     */
    public function getAddresszip()
    {
        return $this->addresszip;
    }

    /**
     * Set lastupdateUserid
     *
     * @param string $lastupdateUserid
     *
     * @return ApplicationPerson
     */
    public function setLastupdateUserid($lastupdateUserid)
    {
        $this->lastupdateUserid = $lastupdateUserid;

        return $this;
    }

    /**
     * Get lastupdateUserid
     *
     * @return string
     */
    public function getLastupdateUserid()
    {
        return $this->lastupdateUserid;
    }

    /**
     * Set lastupdateTimestamp
     *
     * @param string $lastupdateTimestamp
     *
     * @return ApplicationPerson
     */
    public function setLastupdateTimestamp($lastupdateTimestamp)
    {
        $this->lastupdateTimestamp = $lastupdateTimestamp;

        return $this;
    }

    /**
     * Get lastupdateTimestamp
     *
     * @return string
     */
    public function getLastupdateTimestamp()
    {
        return $this->lastupdateTimestamp;
    }

    /**
     * Set projectedAmount
     *
     * @param string $projectedAmount
     *
     * @return ApplicationPerson
     */
    public function setProjectedAmount($projectedAmount)
    {
        $this->projectedAmount = $projectedAmount;

        return $this;
    }

    /**
     * Get projectedAmount
     *
     * @return string
     */
    public function getProjectedAmount()
    {
        return $this->projectedAmount;
    }

    /**
     * Set citStatNull
     *
     * @param string $citStatNull
     *
     * @return ApplicationPerson
     */
    public function setCitStatNull($citStatNull)
    {
        $this->citStatNull = $citStatNull;

        return $this;
    }

    /**
     * Get citStatNull
     *
     * @return string
     */
    public function getCitStatNull()
    {
        return $this->citStatNull;
    }

    /**
     * Set applicationid
     *
     * @param \DCGov\HavenBundle\Entity\Application $applicationid
     *
     * @return ApplicationPerson
     */
    public function setApplicationid(\DCGov\HavenBundle\Entity\Application $applicationid)
    {
        $this->applicationid = $applicationid;

        return $this;
    }

    /**
     * Get applicationid
     *
     * @return \DCGov\HavenBundle\Entity\Application
     */
    public function getApplicationid()
    {
        return $this->applicationid;
    }

    /**
     * Set personid
     *
     * @param \DCGov\HavenBundle\Entity\Person $personid
     *
     * @return ApplicationPerson
     */
    public function setPersonid(\DCGov\HavenBundle\Entity\Person $personid = null)
    {
        $this->personid = $personid;

        return $this;
    }

    /**
     * Get personid
     *
     * @return \DCGov\HavenBundle\Entity\Person
     */
    public function getPersonid()
    {
        return $this->personid;
    }
}

