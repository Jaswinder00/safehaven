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
    private $ffwages;

    /**
     * @var string
     */
    private $wages;

    /**
     * @var string
     */
    private $mcmwages;

    /**
     * @var string
     */
    private $fftaxableinterest;

    /**
     * @var string
     */
    private $taxableinterest;

    /**
     * @var string
     */
    private $mcmtaxableinterest;

    /**
     * @var string
     */
    private $ffpentionannuities;

    /**
     * @var string
     */
    private $pensionannuities;

    /**
     * @var string
     */
    private $mcmpentionannuities;

    /**
     * @var string
     */
    private $fftaxexemptinterest;

    /**
     * @var string
     */
    private $taxexemptinterest;

    /**
     * @var string
     */
    private $mcmtaxexemptinterest;

    /**
     * @var string
     */
    private $fffarmincome;

    /**
     * @var string
     */
    private $farmincome;

    /**
     * @var string
     */
    private $mcmfarmincome;

    /**
     * @var string
     */
    private $fftaxrefunds;

    /**
     * @var string
     */
    private $taxrefunds;

    /**
     * @var string
     */
    private $mcmtaxrefunds;

    /**
     * @var string
     */
    private $ffunemploymentincome;

    /**
     * @var string
     */
    private $unemployincome;

    /**
     * @var string
     */
    private $mcmunemploymentincome;

    /**
     * @var string
     */
    private $ffalimony;

    /**
     * @var string
     */
    private $alimony;

    /**
     * @var string
     */
    private $mcmalimony;

    /**
     * @var string
     */
    private $ffotherincome;

    /**
     * @var string
     */
    private $otherincome;

    /**
     * @var string
     */
    private $mcmotherincome;

    /**
     * @var string
     */
    private $ffmagideductions;

    /**
     * @var string
     */
    private $magideductions;

    /**
     * @var string
     */
    private $mcmmagideductions;

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
     * @var string
     */
    private $ordinarydividends;

    /**
     * @var string
     */
    private $mcmordinarydividends;

    /**
     * @var string
     */
    private $taxablerefunds;

    /**
     * @var string
     */
    private $mcmtaxablerefunds;

    /**
     * @var string
     */
    private $businessincome;

    /**
     * @var string
     */
    private $mcmbusinessincome;

    /**
     * @var string
     */
    private $othergains;

    /**
     * @var string
     */
    private $mcmothergains;

    /**
     * @var string
     */
    private $iradistributions;

    /**
     * @var string
     */
    private $mcmiradistributions;

    /**
     * @var string
     */
    private $realestateplus;

    /**
     * @var string
     */
    private $mcmrealestateplus;

    /**
     * @var string
     */
    private $unemployment;

    /**
     * @var string
     */
    private $mcmunemployment;

    /**
     * @var string
     */
    private $socialsecurity;

    /**
     * @var string
     */
    private $mcmsocialsecurity;

    /**
     * @var string
     */
    private $taxablesocialsecurity;

    /**
     * @var string
     */
    private $mcmtaxablesocialsecurity;

    /**
     * @var string
     */
    private $educatorexpenses;

    /**
     * @var string
     */
    private $businessexpenses;

    /**
     * @var string
     */
    private $healthsavingdeductions;

    /**
     * @var string
     */
    private $movingexpenses;

    /**
     * @var string
     */
    private $selfemploytaxdeduction;

    /**
     * @var string
     */
    private $selfemployplans;

    /**
     * @var string
     */
    private $selfemployinsdeductions;

    /**
     * @var string
     */
    private $withdrawalpenalty;

    /**
     * @var string
     */
    private $alimonypaid;

    /**
     * @var string
     */
    private $iradeductions;

    /**
     * @var string
     */
    private $studentloanintdeductions;

    /**
     * @var string
     */
    private $tution;

    /**
     * @var string
     */
    private $domproductiondeduction;

    /**
     * @var \DateTime
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

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
     * @var Person
     */
    private $personid;

    /**
     * @var \DCGov\HavenBundle\Entity\Application
     */
    private $applicationid;


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
     * Set ffwages
     *
     * @param string $ffwages
     *
     * @return ApplicationPerson
     */
    public function setFfwages($ffwages)
    {
        $this->ffwages = $ffwages;

        return $this;
    }

    /**
     * Get ffwages
     *
     * @return string
     */
    public function getFfwages()
    {
        return $this->ffwages;
    }

    /**
     * Set wages
     *
     * @param string $wages
     *
     * @return ApplicationPerson
     */
    public function setWages($wages)
    {
        $this->wages = $wages;

        return $this;
    }

    /**
     * Get wages
     *
     * @return string
     */
    public function getWages()
    {
        return $this->wages;
    }

    /**
     * Set mcmwages
     *
     * @param string $mcmwages
     *
     * @return ApplicationPerson
     */
    public function setMcmwages($mcmwages)
    {
        $this->mcmwages = $mcmwages;

        return $this;
    }

    /**
     * Get mcmwages
     *
     * @return string
     */
    public function getMcmwages()
    {
        return $this->mcmwages;
    }

    /**
     * Set fftaxableinterest
     *
     * @param string $fftaxableinterest
     *
     * @return ApplicationPerson
     */
    public function setFftaxableinterest($fftaxableinterest)
    {
        $this->fftaxableinterest = $fftaxableinterest;

        return $this;
    }

    /**
     * Get fftaxableinterest
     *
     * @return string
     */
    public function getFftaxableinterest()
    {
        return $this->fftaxableinterest;
    }

    /**
     * Set taxableinterest
     *
     * @param string $taxableinterest
     *
     * @return ApplicationPerson
     */
    public function setTaxableinterest($taxableinterest)
    {
        $this->taxableinterest = $taxableinterest;

        return $this;
    }

    /**
     * Get taxableinterest
     *
     * @return string
     */
    public function getTaxableinterest()
    {
        return $this->taxableinterest;
    }

    /**
     * Set mcmtaxableinterest
     *
     * @param string $mcmtaxableinterest
     *
     * @return ApplicationPerson
     */
    public function setMcmtaxableinterest($mcmtaxableinterest)
    {
        $this->mcmtaxableinterest = $mcmtaxableinterest;

        return $this;
    }

    /**
     * Get mcmtaxableinterest
     *
     * @return string
     */
    public function getMcmtaxableinterest()
    {
        return $this->mcmtaxableinterest;
    }

    /**
     * Set ffpentionannuities
     *
     * @param string $ffpentionannuities
     *
     * @return ApplicationPerson
     */
    public function setFfpentionannuities($ffpentionannuities)
    {
        $this->ffpentionannuities = $ffpentionannuities;

        return $this;
    }

    /**
     * Get ffpentionannuities
     *
     * @return string
     */
    public function getFfpentionannuities()
    {
        return $this->ffpentionannuities;
    }

    /**
     * Set pensionannuities
     *
     * @param string $pensionannuities
     *
     * @return ApplicationPerson
     */
    public function setPensionannuities($pensionannuities)
    {
        $this->pensionannuities = $pensionannuities;

        return $this;
    }

    /**
     * Get pensionannuities
     *
     * @return string
     */
    public function getPensionannuities()
    {
        return $this->pensionannuities;
    }

    /**
     * Set mcmpentionannuities
     *
     * @param string $mcmpentionannuities
     *
     * @return ApplicationPerson
     */
    public function setMcmpentionannuities($mcmpentionannuities)
    {
        $this->mcmpentionannuities = $mcmpentionannuities;

        return $this;
    }

    /**
     * Get mcmpentionannuities
     *
     * @return string
     */
    public function getMcmpentionannuities()
    {
        return $this->mcmpentionannuities;
    }

    /**
     * Set fftaxexemptinterest
     *
     * @param string $fftaxexemptinterest
     *
     * @return ApplicationPerson
     */
    public function setFftaxexemptinterest($fftaxexemptinterest)
    {
        $this->fftaxexemptinterest = $fftaxexemptinterest;

        return $this;
    }

    /**
     * Get fftaxexemptinterest
     *
     * @return string
     */
    public function getFftaxexemptinterest()
    {
        return $this->fftaxexemptinterest;
    }

    /**
     * Set taxexemptinterest
     *
     * @param string $taxexemptinterest
     *
     * @return ApplicationPerson
     */
    public function setTaxexemptinterest($taxexemptinterest)
    {
        $this->taxexemptinterest = $taxexemptinterest;

        return $this;
    }

    /**
     * Get taxexemptinterest
     *
     * @return string
     */
    public function getTaxexemptinterest()
    {
        return $this->taxexemptinterest;
    }

    /**
     * Set mcmtaxexemptinterest
     *
     * @param string $mcmtaxexemptinterest
     *
     * @return ApplicationPerson
     */
    public function setMcmtaxexemptinterest($mcmtaxexemptinterest)
    {
        $this->mcmtaxexemptinterest = $mcmtaxexemptinterest;

        return $this;
    }

    /**
     * Get mcmtaxexemptinterest
     *
     * @return string
     */
    public function getMcmtaxexemptinterest()
    {
        return $this->mcmtaxexemptinterest;
    }

    /**
     * Set fffarmincome
     *
     * @param string $fffarmincome
     *
     * @return ApplicationPerson
     */
    public function setFffarmincome($fffarmincome)
    {
        $this->fffarmincome = $fffarmincome;

        return $this;
    }

    /**
     * Get fffarmincome
     *
     * @return string
     */
    public function getFffarmincome()
    {
        return $this->fffarmincome;
    }

    /**
     * Set farmincome
     *
     * @param string $farmincome
     *
     * @return ApplicationPerson
     */
    public function setFarmincome($farmincome)
    {
        $this->farmincome = $farmincome;

        return $this;
    }

    /**
     * Get farmincome
     *
     * @return string
     */
    public function getFarmincome()
    {
        return $this->farmincome;
    }

    /**
     * Set mcmfarmincome
     *
     * @param string $mcmfarmincome
     *
     * @return ApplicationPerson
     */
    public function setMcmfarmincome($mcmfarmincome)
    {
        $this->mcmfarmincome = $mcmfarmincome;

        return $this;
    }

    /**
     * Get mcmfarmincome
     *
     * @return string
     */
    public function getMcmfarmincome()
    {
        return $this->mcmfarmincome;
    }

    /**
     * Set fftaxrefunds
     *
     * @param string $fftaxrefunds
     *
     * @return ApplicationPerson
     */
    public function setFftaxrefunds($fftaxrefunds)
    {
        $this->fftaxrefunds = $fftaxrefunds;

        return $this;
    }

    /**
     * Get fftaxrefunds
     *
     * @return string
     */
    public function getFftaxrefunds()
    {
        return $this->fftaxrefunds;
    }

    /**
     * Set taxrefunds
     *
     * @param string $taxrefunds
     *
     * @return ApplicationPerson
     */
    public function setTaxrefunds($taxrefunds)
    {
        $this->taxrefunds = $taxrefunds;

        return $this;
    }

    /**
     * Get taxrefunds
     *
     * @return string
     */
    public function getTaxrefunds()
    {
        return $this->taxrefunds;
    }

    /**
     * Set mcmtaxrefunds
     *
     * @param string $mcmtaxrefunds
     *
     * @return ApplicationPerson
     */
    public function setMcmtaxrefunds($mcmtaxrefunds)
    {
        $this->mcmtaxrefunds = $mcmtaxrefunds;

        return $this;
    }

    /**
     * Get mcmtaxrefunds
     *
     * @return string
     */
    public function getMcmtaxrefunds()
    {
        return $this->mcmtaxrefunds;
    }

    /**
     * Set ffunemploymentincome
     *
     * @param string $ffunemploymentincome
     *
     * @return ApplicationPerson
     */
    public function setFfunemploymentincome($ffunemploymentincome)
    {
        $this->ffunemploymentincome = $ffunemploymentincome;

        return $this;
    }

    /**
     * Get ffunemploymentincome
     *
     * @return string
     */
    public function getFfunemploymentincome()
    {
        return $this->ffunemploymentincome;
    }

    /**
     * Set unemployincome
     *
     * @param string $unemployincome
     *
     * @return ApplicationPerson
     */
    public function setUnemployincome($unemployincome)
    {
        $this->unemployincome = $unemployincome;

        return $this;
    }

    /**
     * Get unemployincome
     *
     * @return string
     */
    public function getUnemployincome()
    {
        return $this->unemployincome;
    }

    /**
     * Set mcmunemploymentincome
     *
     * @param string $mcmunemploymentincome
     *
     * @return ApplicationPerson
     */
    public function setMcmunemploymentincome($mcmunemploymentincome)
    {
        $this->mcmunemploymentincome = $mcmunemploymentincome;

        return $this;
    }

    /**
     * Get mcmunemploymentincome
     *
     * @return string
     */
    public function getMcmunemploymentincome()
    {
        return $this->mcmunemploymentincome;
    }

    /**
     * Set ffalimony
     *
     * @param string $ffalimony
     *
     * @return ApplicationPerson
     */
    public function setFfalimony($ffalimony)
    {
        $this->ffalimony = $ffalimony;

        return $this;
    }

    /**
     * Get ffalimony
     *
     * @return string
     */
    public function getFfalimony()
    {
        return $this->ffalimony;
    }

    /**
     * Set alimony
     *
     * @param string $alimony
     *
     * @return ApplicationPerson
     */
    public function setAlimony($alimony)
    {
        $this->alimony = $alimony;

        return $this;
    }

    /**
     * Get alimony
     *
     * @return string
     */
    public function getAlimony()
    {
        return $this->alimony;
    }

    /**
     * Set mcmalimony
     *
     * @param string $mcmalimony
     *
     * @return ApplicationPerson
     */
    public function setMcmalimony($mcmalimony)
    {
        $this->mcmalimony = $mcmalimony;

        return $this;
    }

    /**
     * Get mcmalimony
     *
     * @return string
     */
    public function getMcmalimony()
    {
        return $this->mcmalimony;
    }

    /**
     * Set ffotherincome
     *
     * @param string $ffotherincome
     *
     * @return ApplicationPerson
     */
    public function setFfotherincome($ffotherincome)
    {
        $this->ffotherincome = $ffotherincome;

        return $this;
    }

    /**
     * Get ffotherincome
     *
     * @return string
     */
    public function getFfotherincome()
    {
        return $this->ffotherincome;
    }

    /**
     * Set otherincome
     *
     * @param string $otherincome
     *
     * @return ApplicationPerson
     */
    public function setOtherincome($otherincome)
    {
        $this->otherincome = $otherincome;

        return $this;
    }

    /**
     * Get otherincome
     *
     * @return string
     */
    public function getOtherincome()
    {
        return $this->otherincome;
    }

    /**
     * Set mcmotherincome
     *
     * @param string $mcmotherincome
     *
     * @return ApplicationPerson
     */
    public function setMcmotherincome($mcmotherincome)
    {
        $this->mcmotherincome = $mcmotherincome;

        return $this;
    }

    /**
     * Get mcmotherincome
     *
     * @return string
     */
    public function getMcmotherincome()
    {
        return $this->mcmotherincome;
    }

    /**
     * Set ffmagideductions
     *
     * @param string $ffmagideductions
     *
     * @return ApplicationPerson
     */
    public function setFfmagideductions($ffmagideductions)
    {
        $this->ffmagideductions = $ffmagideductions;

        return $this;
    }

    /**
     * Get ffmagideductions
     *
     * @return string
     */
    public function getFfmagideductions()
    {
        return $this->ffmagideductions;
    }

    /**
     * Set magideductions
     *
     * @param string $magideductions
     *
     * @return ApplicationPerson
     */
    public function setMagideductions($magideductions)
    {
        $this->magideductions = $magideductions;

        return $this;
    }

    /**
     * Get magideductions
     *
     * @return string
     */
    public function getMagideductions()
    {
        return $this->magideductions;
    }

    /**
     * Set mcmmagideductions
     *
     * @param string $mcmmagideductions
     *
     * @return ApplicationPerson
     */
    public function setMcmmagideductions($mcmmagideductions)
    {
        $this->mcmmagideductions = $mcmmagideductions;

        return $this;
    }

    /**
     * Get mcmmagideductions
     *
     * @return string
     */
    public function getMcmmagideductions()
    {
        return $this->mcmmagideductions;
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
     * Set ordinarydividends
     *
     * @param string $ordinarydividends
     *
     * @return ApplicationPerson
     */
    public function setOrdinarydividends($ordinarydividends)
    {
        $this->ordinarydividends = $ordinarydividends;

        return $this;
    }

    /**
     * Get ordinarydividends
     *
     * @return string
     */
    public function getOrdinarydividends()
    {
        return $this->ordinarydividends;
    }

    /**
     * Set mcmordinarydividends
     *
     * @param string $mcmordinarydividends
     *
     * @return ApplicationPerson
     */
    public function setMcmordinarydividends($mcmordinarydividends)
    {
        $this->mcmordinarydividends = $mcmordinarydividends;

        return $this;
    }

    /**
     * Get mcmordinarydividends
     *
     * @return string
     */
    public function getMcmordinarydividends()
    {
        return $this->mcmordinarydividends;
    }

    /**
     * Set taxablerefunds
     *
     * @param string $taxablerefunds
     *
     * @return ApplicationPerson
     */
    public function setTaxablerefunds($taxablerefunds)
    {
        $this->taxablerefunds = $taxablerefunds;

        return $this;
    }

    /**
     * Get taxablerefunds
     *
     * @return string
     */
    public function getTaxablerefunds()
    {
        return $this->taxablerefunds;
    }

    /**
     * Set mcmtaxablerefunds
     *
     * @param string $mcmtaxablerefunds
     *
     * @return ApplicationPerson
     */
    public function setMcmtaxablerefunds($mcmtaxablerefunds)
    {
        $this->mcmtaxablerefunds = $mcmtaxablerefunds;

        return $this;
    }

    /**
     * Get mcmtaxablerefunds
     *
     * @return string
     */
    public function getMcmtaxablerefunds()
    {
        return $this->mcmtaxablerefunds;
    }

    /**
     * Set businessincome
     *
     * @param string $businessincome
     *
     * @return ApplicationPerson
     */
    public function setBusinessincome($businessincome)
    {
        $this->businessincome = $businessincome;

        return $this;
    }

    /**
     * Get businessincome
     *
     * @return string
     */
    public function getBusinessincome()
    {
        return $this->businessincome;
    }

    /**
     * Set mcmbusinessincome
     *
     * @param string $mcmbusinessincome
     *
     * @return ApplicationPerson
     */
    public function setMcmbusinessincome($mcmbusinessincome)
    {
        $this->mcmbusinessincome = $mcmbusinessincome;

        return $this;
    }

    /**
     * Get mcmbusinessincome
     *
     * @return string
     */
    public function getMcmbusinessincome()
    {
        return $this->mcmbusinessincome;
    }

    /**
     * Set othergains
     *
     * @param string $othergains
     *
     * @return ApplicationPerson
     */
    public function setOthergains($othergains)
    {
        $this->othergains = $othergains;

        return $this;
    }

    /**
     * Get othergains
     *
     * @return string
     */
    public function getOthergains()
    {
        return $this->othergains;
    }

    /**
     * Set mcmothergains
     *
     * @param string $mcmothergains
     *
     * @return ApplicationPerson
     */
    public function setMcmothergains($mcmothergains)
    {
        $this->mcmothergains = $mcmothergains;

        return $this;
    }

    /**
     * Get mcmothergains
     *
     * @return string
     */
    public function getMcmothergains()
    {
        return $this->mcmothergains;
    }

    /**
     * Set iradistributions
     *
     * @param string $iradistributions
     *
     * @return ApplicationPerson
     */
    public function setIradistributions($iradistributions)
    {
        $this->iradistributions = $iradistributions;

        return $this;
    }

    /**
     * Get iradistributions
     *
     * @return string
     */
    public function getIradistributions()
    {
        return $this->iradistributions;
    }

    /**
     * Set mcmiradistributions
     *
     * @param string $mcmiradistributions
     *
     * @return ApplicationPerson
     */
    public function setMcmiradistributions($mcmiradistributions)
    {
        $this->mcmiradistributions = $mcmiradistributions;

        return $this;
    }

    /**
     * Get mcmiradistributions
     *
     * @return string
     */
    public function getMcmiradistributions()
    {
        return $this->mcmiradistributions;
    }

    /**
     * Set realestateplus
     *
     * @param string $realestateplus
     *
     * @return ApplicationPerson
     */
    public function setRealestateplus($realestateplus)
    {
        $this->realestateplus = $realestateplus;

        return $this;
    }

    /**
     * Get realestateplus
     *
     * @return string
     */
    public function getRealestateplus()
    {
        return $this->realestateplus;
    }

    /**
     * Set mcmrealestateplus
     *
     * @param string $mcmrealestateplus
     *
     * @return ApplicationPerson
     */
    public function setMcmrealestateplus($mcmrealestateplus)
    {
        $this->mcmrealestateplus = $mcmrealestateplus;

        return $this;
    }

    /**
     * Get mcmrealestateplus
     *
     * @return string
     */
    public function getMcmrealestateplus()
    {
        return $this->mcmrealestateplus;
    }

    /**
     * Set unemployment
     *
     * @param string $unemployment
     *
     * @return ApplicationPerson
     */
    public function setUnemployment($unemployment)
    {
        $this->unemployment = $unemployment;

        return $this;
    }

    /**
     * Get unemployment
     *
     * @return string
     */
    public function getUnemployment()
    {
        return $this->unemployment;
    }

    /**
     * Set mcmunemployment
     *
     * @param string $mcmunemployment
     *
     * @return ApplicationPerson
     */
    public function setMcmunemployment($mcmunemployment)
    {
        $this->mcmunemployment = $mcmunemployment;

        return $this;
    }

    /**
     * Get mcmunemployment
     *
     * @return string
     */
    public function getMcmunemployment()
    {
        return $this->mcmunemployment;
    }

    /**
     * Set socialsecurity
     *
     * @param string $socialsecurity
     *
     * @return ApplicationPerson
     */
    public function setSocialsecurity($socialsecurity)
    {
        $this->socialsecurity = $socialsecurity;

        return $this;
    }

    /**
     * Get socialsecurity
     *
     * @return string
     */
    public function getSocialsecurity()
    {
        return $this->socialsecurity;
    }

    /**
     * Set mcmsocialsecurity
     *
     * @param string $mcmsocialsecurity
     *
     * @return ApplicationPerson
     */
    public function setMcmsocialsecurity($mcmsocialsecurity)
    {
        $this->mcmsocialsecurity = $mcmsocialsecurity;

        return $this;
    }

    /**
     * Get mcmsocialsecurity
     *
     * @return string
     */
    public function getMcmsocialsecurity()
    {
        return $this->mcmsocialsecurity;
    }

    /**
     * Set taxablesocialsecurity
     *
     * @param string $taxablesocialsecurity
     *
     * @return ApplicationPerson
     */
    public function setTaxablesocialsecurity($taxablesocialsecurity)
    {
        $this->taxablesocialsecurity = $taxablesocialsecurity;

        return $this;
    }

    /**
     * Get taxablesocialsecurity
     *
     * @return string
     */
    public function getTaxablesocialsecurity()
    {
        return $this->taxablesocialsecurity;
    }

    /**
     * Set mcmtaxablesocialsecurity
     *
     * @param string $mcmtaxablesocialsecurity
     *
     * @return ApplicationPerson
     */
    public function setMcmtaxablesocialsecurity($mcmtaxablesocialsecurity)
    {
        $this->mcmtaxablesocialsecurity = $mcmtaxablesocialsecurity;

        return $this;
    }

    /**
     * Get mcmtaxablesocialsecurity
     *
     * @return string
     */
    public function getMcmtaxablesocialsecurity()
    {
        return $this->mcmtaxablesocialsecurity;
    }

    /**
     * Set educatorexpenses
     *
     * @param string $educatorexpenses
     *
     * @return ApplicationPerson
     */
    public function setEducatorexpenses($educatorexpenses)
    {
        $this->educatorexpenses = $educatorexpenses;

        return $this;
    }

    /**
     * Get educatorexpenses
     *
     * @return string
     */
    public function getEducatorexpenses()
    {
        return $this->educatorexpenses;
    }

    /**
     * Set businessexpenses
     *
     * @param string $businessexpenses
     *
     * @return ApplicationPerson
     */
    public function setBusinessexpenses($businessexpenses)
    {
        $this->businessexpenses = $businessexpenses;

        return $this;
    }

    /**
     * Get businessexpenses
     *
     * @return string
     */
    public function getBusinessexpenses()
    {
        return $this->businessexpenses;
    }

    /**
     * Set healthsavingdeductions
     *
     * @param string $healthsavingdeductions
     *
     * @return ApplicationPerson
     */
    public function setHealthsavingdeductions($healthsavingdeductions)
    {
        $this->healthsavingdeductions = $healthsavingdeductions;

        return $this;
    }

    /**
     * Get healthsavingdeductions
     *
     * @return string
     */
    public function getHealthsavingdeductions()
    {
        return $this->healthsavingdeductions;
    }

    /**
     * Set movingexpenses
     *
     * @param string $movingexpenses
     *
     * @return ApplicationPerson
     */
    public function setMovingexpenses($movingexpenses)
    {
        $this->movingexpenses = $movingexpenses;

        return $this;
    }

    /**
     * Get movingexpenses
     *
     * @return string
     */
    public function getMovingexpenses()
    {
        return $this->movingexpenses;
    }

    /**
     * Set selfemploytaxdeduction
     *
     * @param string $selfemploytaxdeduction
     *
     * @return ApplicationPerson
     */
    public function setSelfemploytaxdeduction($selfemploytaxdeduction)
    {
        $this->selfemploytaxdeduction = $selfemploytaxdeduction;

        return $this;
    }

    /**
     * Get selfemploytaxdeduction
     *
     * @return string
     */
    public function getSelfemploytaxdeduction()
    {
        return $this->selfemploytaxdeduction;
    }

    /**
     * Set selfemployplans
     *
     * @param string $selfemployplans
     *
     * @return ApplicationPerson
     */
    public function setSelfemployplans($selfemployplans)
    {
        $this->selfemployplans = $selfemployplans;

        return $this;
    }

    /**
     * Get selfemployplans
     *
     * @return string
     */
    public function getSelfemployplans()
    {
        return $this->selfemployplans;
    }

    /**
     * Set selfemployinsdeductions
     *
     * @param string $selfemployinsdeductions
     *
     * @return ApplicationPerson
     */
    public function setSelfemployinsdeductions($selfemployinsdeductions)
    {
        $this->selfemployinsdeductions = $selfemployinsdeductions;

        return $this;
    }

    /**
     * Get selfemployinsdeductions
     *
     * @return string
     */
    public function getSelfemployinsdeductions()
    {
        return $this->selfemployinsdeductions;
    }

    /**
     * Set withdrawalpenalty
     *
     * @param string $withdrawalpenalty
     *
     * @return ApplicationPerson
     */
    public function setWithdrawalpenalty($withdrawalpenalty)
    {
        $this->withdrawalpenalty = $withdrawalpenalty;

        return $this;
    }

    /**
     * Get withdrawalpenalty
     *
     * @return string
     */
    public function getWithdrawalpenalty()
    {
        return $this->withdrawalpenalty;
    }

    /**
     * Set alimonypaid
     *
     * @param string $alimonypaid
     *
     * @return ApplicationPerson
     */
    public function setAlimonypaid($alimonypaid)
    {
        $this->alimonypaid = $alimonypaid;

        return $this;
    }

    /**
     * Get alimonypaid
     *
     * @return string
     */
    public function getAlimonypaid()
    {
        return $this->alimonypaid;
    }

    /**
     * Set iradeductions
     *
     * @param string $iradeductions
     *
     * @return ApplicationPerson
     */
    public function setIradeductions($iradeductions)
    {
        $this->iradeductions = $iradeductions;

        return $this;
    }

    /**
     * Get iradeductions
     *
     * @return string
     */
    public function getIradeductions()
    {
        return $this->iradeductions;
    }

    /**
     * Set studentloanintdeductions
     *
     * @param string $studentloanintdeductions
     *
     * @return ApplicationPerson
     */
    public function setStudentloanintdeductions($studentloanintdeductions)
    {
        $this->studentloanintdeductions = $studentloanintdeductions;

        return $this;
    }

    /**
     * Get studentloanintdeductions
     *
     * @return string
     */
    public function getStudentloanintdeductions()
    {
        return $this->studentloanintdeductions;
    }

    /**
     * Set tution
     *
     * @param string $tution
     *
     * @return ApplicationPerson
     */
    public function setTution($tution)
    {
        $this->tution = $tution;

        return $this;
    }

    /**
     * Get tution
     *
     * @return string
     */
    public function getTution()
    {
        return $this->tution;
    }

    /**
     * Set domproductiondeduction
     *
     * @param string $domproductiondeduction
     *
     * @return ApplicationPerson
     */
    public function setDomproductiondeduction($domproductiondeduction)
    {
        $this->domproductiondeduction = $domproductiondeduction;

        return $this;
    }

    /**
     * Get domproductiondeduction
     *
     * @return string
     */
    public function getDomproductiondeduction()
    {
        return $this->domproductiondeduction;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return ApplicationPerson
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
     * Set personid
     * 
     * @param \DCGov\HavenBundle\Entity\Person $personid
     * 
     * @return ApplicationPerson
     */
    public function setPersonid(\DCGov\HavenBundle\Entity\Person $personid = null) {
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

    /**
     * Set applicationid
     *
     * @param \DCGov\HavenBundle\Entity\Application $applicationid
     *
     * @return ApplicationPerson
     */
    public function setApplicationid(\DCGov\HavenBundle\Entity\Application $applicationid = null)
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
}
