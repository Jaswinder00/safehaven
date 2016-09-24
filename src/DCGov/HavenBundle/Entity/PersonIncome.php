<?php

namespace DCGov\HavenBundle\Entity;

/**
 * PersonIncome
 */
class PersonIncome
{
    /**
     * @var string
     */
    private $incometype;

    /**
     * @var string
     */
    private $wagetype;

    /**
     * @var string
     */
    private $paymentfrequency;

    /**
     * @var string
     */
    private $incomeamount;

    /**
     * @var \DateTime
     */
    private $startdate;

    /**
     * @var \DateTime
     */
    private $enddate;

    /**
     * @var string
     */
    private $annualincome;

    /**
     * @var string
     */
    private $employername;

    /**
     * @var string
     */
    private $employerin;

    /**
     * @var string
     */
    private $employeraddress;

    /**
     * @var string
     */
    private $employercity;

    /**
     * @var string
     */
    private $employerstate;

    /**
     * @var string
     */
    private $employerzipcode;

    /**
     * @var string
     */
    private $employerplancover;

    /**
     * @var string
     */
    private $employerplanminimum;

    /**
     * @var string
     */
    private $emplyeecost;

    /**
     * @var string
     */
    private $employeeiseligible;

    /**
     * @var \DateTime
     */
    private $employeeelidate;

    /**
     * @var integer
     */
    private $employeecostfrequency;

    /**
     * @var integer
     */
    private $incomeid;

    /**
     * @var \DCGov\HavenBundle\Entity\ApplicationPerson
     */
    private $personid;

    /**
     * @var \DCGov\HavenBundle\Entity\Application
     */
    private $applicationid;


    /**
     * Set incometype
     *
     * @param string $incometype
     *
     * @return PersonIncome
     */
    public function setIncometype($incometype)
    {
        $this->incometype = $incometype;

        return $this;
    }

    /**
     * Get incometype
     *
     * @return string
     */
    public function getIncometype()
    {
        return $this->incometype;
    }

    /**
     * Set wagetype
     *
     * @param string $wagetype
     *
     * @return PersonIncome
     */
    public function setWagetype($wagetype)
    {
        $this->wagetype = $wagetype;

        return $this;
    }

    /**
     * Get wagetype
     *
     * @return string
     */
    public function getWagetype()
    {
        return $this->wagetype;
    }

    /**
     * Set paymentfrequency
     *
     * @param string $paymentfrequency
     *
     * @return PersonIncome
     */
    public function setPaymentfrequency($paymentfrequency)
    {
        $this->paymentfrequency = $paymentfrequency;

        return $this;
    }

    /**
     * Get paymentfrequency
     *
     * @return string
     */
    public function getPaymentfrequency()
    {
        return $this->paymentfrequency;
    }

    /**
     * Set incomeamount
     *
     * @param string $incomeamount
     *
     * @return PersonIncome
     */
    public function setIncomeamount($incomeamount)
    {
        $this->incomeamount = $incomeamount;

        return $this;
    }

    /**
     * Get incomeamount
     *
     * @return string
     */
    public function getIncomeamount()
    {
        return $this->incomeamount;
    }

    /**
     * Set startdate
     *
     * @param \DateTime $startdate
     *
     * @return PersonIncome
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return \DateTime
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param \DateTime $enddate
     *
     * @return PersonIncome
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return \DateTime
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set annualincome
     *
     * @param string $annualincome
     *
     * @return PersonIncome
     */
    public function setAnnualincome($annualincome)
    {
        $this->annualincome = $annualincome;

        return $this;
    }

    /**
     * Get annualincome
     *
     * @return string
     */
    public function getAnnualincome()
    {
        return $this->annualincome;
    }

    /**
     * Set employername
     *
     * @param string $employername
     *
     * @return PersonIncome
     */
    public function setEmployername($employername)
    {
        $this->employername = $employername;

        return $this;
    }

    /**
     * Get employername
     *
     * @return string
     */
    public function getEmployername()
    {
        return $this->employername;
    }

    /**
     * Set employerin
     *
     * @param string $employerin
     *
     * @return PersonIncome
     */
    public function setEmployerin($employerin)
    {
        $this->employerin = $employerin;

        return $this;
    }

    /**
     * Get employerin
     *
     * @return string
     */
    public function getEmployerin()
    {
        return $this->employerin;
    }

    /**
     * Set employeraddress
     *
     * @param string $employeraddress
     *
     * @return PersonIncome
     */
    public function setEmployeraddress($employeraddress)
    {
        $this->employeraddress = $employeraddress;

        return $this;
    }

    /**
     * Get employeraddress
     *
     * @return string
     */
    public function getEmployeraddress()
    {
        return $this->employeraddress;
    }

    /**
     * Set employercity
     *
     * @param string $employercity
     *
     * @return PersonIncome
     */
    public function setEmployercity($employercity)
    {
        $this->employercity = $employercity;

        return $this;
    }

    /**
     * Get employercity
     *
     * @return string
     */
    public function getEmployercity()
    {
        return $this->employercity;
    }

    /**
     * Set employerstate
     *
     * @param string $employerstate
     *
     * @return PersonIncome
     */
    public function setEmployerstate($employerstate)
    {
        $this->employerstate = $employerstate;

        return $this;
    }

    /**
     * Get employerstate
     *
     * @return string
     */
    public function getEmployerstate()
    {
        return $this->employerstate;
    }

    /**
     * Set employerzipcode
     *
     * @param string $employerzipcode
     *
     * @return PersonIncome
     */
    public function setEmployerzipcode($employerzipcode)
    {
        $this->employerzipcode = $employerzipcode;

        return $this;
    }

    /**
     * Get employerzipcode
     *
     * @return string
     */
    public function getEmployerzipcode()
    {
        return $this->employerzipcode;
    }

    /**
     * Set employerplancover
     *
     * @param string $employerplancover
     *
     * @return PersonIncome
     */
    public function setEmployerplancover($employerplancover)
    {
        $this->employerplancover = $employerplancover;

        return $this;
    }

    /**
     * Get employerplancover
     *
     * @return string
     */
    public function getEmployerplancover()
    {
        return $this->employerplancover;
    }

    /**
     * Set employerplanminimum
     *
     * @param string $employerplanminimum
     *
     * @return PersonIncome
     */
    public function setEmployerplanminimum($employerplanminimum)
    {
        $this->employerplanminimum = $employerplanminimum;

        return $this;
    }

    /**
     * Get employerplanminimum
     *
     * @return string
     */
    public function getEmployerplanminimum()
    {
        return $this->employerplanminimum;
    }

    /**
     * Set emplyeecost
     *
     * @param string $emplyeecost
     *
     * @return PersonIncome
     */
    public function setEmplyeecost($emplyeecost)
    {
        $this->emplyeecost = $emplyeecost;

        return $this;
    }

    /**
     * Get emplyeecost
     *
     * @return string
     */
    public function getEmplyeecost()
    {
        return $this->emplyeecost;
    }

    /**
     * Set employeeiseligible
     *
     * @param string $employeeiseligible
     *
     * @return PersonIncome
     */
    public function setEmployeeiseligible($employeeiseligible)
    {
        $this->employeeiseligible = $employeeiseligible;

        return $this;
    }

    /**
     * Get employeeiseligible
     *
     * @return string
     */
    public function getEmployeeiseligible()
    {
        return $this->employeeiseligible;
    }

    /**
     * Set employeeelidate
     *
     * @param \DateTime $employeeelidate
     *
     * @return PersonIncome
     */
    public function setEmployeeelidate($employeeelidate)
    {
        $this->employeeelidate = $employeeelidate;

        return $this;
    }

    /**
     * Get employeeelidate
     *
     * @return \DateTime
     */
    public function getEmployeeelidate()
    {
        return $this->employeeelidate;
    }

    /**
     * Set employeecostfrequency
     *
     * @param integer $employeecostfrequency
     *
     * @return PersonIncome
     */
    public function setEmployeecostfrequency($employeecostfrequency)
    {
        $this->employeecostfrequency = $employeecostfrequency;

        return $this;
    }

    /**
     * Get employeecostfrequency
     *
     * @return integer
     */
    public function getEmployeecostfrequency()
    {
        return $this->employeecostfrequency;
    }

    /**
     * Get incomeid
     *
     * @return integer
     */
    public function getIncomeid()
    {
        return $this->incomeid;
    }

    /**
     * Set personid
     *
     * @param \DCGov\HavenBundle\Entity\ApplicationPerson $personid
     *
     * @return PersonIncome
     */
    public function setPersonid(\DCGov\HavenBundle\Entity\ApplicationPerson $personid = null)
    {
        $this->personid = $personid;

        return $this;
    }

    /**
     * Get personid
     *
     * @return \DCGov\HavenBundle\Entity\ApplicationPerson
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
     * @return PersonIncome
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
