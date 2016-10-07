<?php
namespace DCGov\HavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use DCGov\HavenBundle\Utility\Common;

use Monolog\Logger;
use DCGov\HavenBundle\Entity\Application;
use DCGov\HavenBundle\Entity\Person;
use DCGov\HavenBundle\Entity\ApplicationPerson;
use DCGov\HavenBundle\Entity\PersonIncome;

class CustomApplicationController extends Controller
{

	const IMMIGRATION_STATUS_CITIZEN = 1;
	const IMMIGRATION_STATUS_LAWFULLY_PRESENT = 2;
	
	/**
	 * Call this controller action to create new Application
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function newAction(Request $request)
	{
		$applicationid = 0;
		$application = null;
		if(null != $request->query->get('applicationid')) {
			$applicationid = $request->query->get('applicationid');
			//Get the Entity Manager to save the data to db
			$em = $this->getDoctrine()->getManager();
			$application = $em->getRepository('DCGovHavenBundle:Application')->find($applicationid);
		}
		
		//Get unique application request types
		return $this->render('DCGovHavenBundle:Application:index.html.twig',
				array(	'applicationid' => $applicationid,
						'application' => $application,
						'request_types' =>  $this->getRequestTypes()) );
	}
	
	/**
	 * Call this controller action to view Application
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function viewAction(Request $request)
	{
		$applicationid = $request->query->get('applicationid');
		
		//Get unique application request types
		return $this->render('DCGovHavenBundle:Application:view.html.twig',
				array(	'applicationid' => $applicationid,
						'request_types' =>  $this->getRequestTypes()) );
	}
	
	/**
	 * Call this method to save an Application
	 * @param Request $request
	 * @throws NotFoundHttpException
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function saveAction(Request $request) {
		$return_value = "";
		
		try {

			//Read Post Values
			$city = $request->request->get('city');
			$state = $request->request->get('state');
			$street = $request->request->get('street');
			
			$applicationid = intval($request->request->get('applicationid'));
			$application_name = $request->request->get('application_name');
			//Get the Entity Manager to save the data to db
			$em = $this->getDoctrine()->getManager();
			
			if(0 == $applicationid) {
				
				$application_month = $request->request->get('application_month');
				$application_day = $request->request->get('application_day');
				$application_year = $request->request->get('application_year');
				$ic_number = $request->request->get('ic_number');
				$csl_number = $request->request->get('csl_number');
				$request_type = $request->request->get('request_type');
				$comments = $request->request->get('comments');
				
				/**
				 * Application
				 */
				//Create new application
				$application = new Application();
					
				$application->setAddresscity($city);
				$application->setAddressstate($state);
				$application->setAddressstreet($street);
				$application->setIcnumber($ic_number);
				$application->setName($application_name);
				$application->setStatus("P");
				$application->setComments($comments);
					
					
				$application->setCreatedTimestamp(new \DateTime('now'));
				$application->setCreatedBy(Common::getLoggedInUser($this)->getId());
				$application->setStatustimestamp(new \DateTime('now'));
					
				$postdate = new \DateTime('now');
				$postdate->setDate($application_year, $application_month, $application_day);
				$application->setPostdate($postdate);
					
				$application->setRequesttype($request_type);
				$application->setYear($application_year);
					

				//Save data to Application table
				$em->persist($application);
				$em->flush();
			} else {
				$application = $em->getRepository('DCGovHavenBundle:Application')->find($applicationid);
			}
			
			$firstname = $request->request->get('firstname');
			$lastname = $request->request->get('lastname');
			$dob_month = $request->request->get('dob_month');
			$dob_day = $request->request->get('dob_day');
			$dob_year = $request->request->get('dob_year');
			$gender = $request->request->get('gender');
			$ssn = $request->request->get('ssn');
			
			
			/**
			 * Person
			 */
			//Prepare class for Person
			$person = new Person();
			$person->setFirstname($firstname);
			$person->setLastname($lastname);
			$person->setGender($gender);
			$person->setSsn($ssn);
			
			$person->setDateofbirth("$dob_month/$dob_day/$dob_year");
			//Save data to Person table
			$em->persist($person);
			$em->flush();
			
			/**
			 * ApplicationPerson
			 */
			//Prepare class for Application Person
			$applicationPerson = new ApplicationPerson();
			$applicationPerson->setApplicationid($application);
			$applicationPerson->setPersonid($person);
			$applicationPerson->setName($application_name);
			
			if(null != $request->request->get('isapplyinsurance')) {
				$applicationPerson->setIsapplicant('Y');
			} else {
				$applicationPerson->setIsapplicant('N');
			}
			
			if(null != $request->request->get('isstudent')) {
				$applicationPerson->setIsstudent('Y');
			} else {
				$applicationPerson->setIsstudent('N');
			}
			
			if(null != $request->request->get('isdisabled')) {
				$applicationPerson->setIsdisabled('Y');
			} else {
				$applicationPerson->setIsdisabled('N');
			}
			
			if(null != $request->request->get('isclaimedasdependent')) {
				//@TODO Confirm:
				$applicationPerson->setIsclaimedoos('Y');
				$applicationPerson->setIsotherclaimed('Y');
			}
			
			if(null != $request->request->get('iseligibleforinsurance')) {
				$applicationPerson->setIseligible('Y');
			}
			
			if(null != ($request->request->get('insurance_enddate_month'))) {
				$insurance_enddate_month = intval($request->request->get('insurance_enddate_month'));
	
				$insurance_enddate_day = intval($request->request->get('insurance_enddate_day'));
				$insurance_enddate_year = intval($request->request->get('insurance_enddate_year'));
				
				$priorinsuranceenddate = new \DateTime();
				$priorinsuranceenddate->setDate($insurance_enddate_year,$insurance_enddate_month,$insurance_enddate_day);
				
				$applicationPerson->setPriorinsuranceenddate($priorinsuranceenddate);
			
				$applicationPerson->setIspriorinsured('Y');
			}
			
			if(null != ($request->request->get('ispregnantinpast3months'))) {
				$applicationPerson->setIslast3pregnant('Y');
			}
			
			if(null != ($request->request->get('numberofchildren'))) {
				$numberofchildren = intval($request->request->get('numberofchildren'));
				$applicationPerson->setNumchildren($numberofchildren);
			}
			
			if(null != ($request->request->get('isnative'))) {
				$applicationPerson->setNativeamerican('Y');
			}
			
			if(null != ($request->request->get('immigrationstatus'))) {
				$immigrationstatus = $request->request->get('immigrationstatus');
				$applicationPerson->setImmigrationstatus($immigrationstatus);
				
				$applicationPerson->setIsuscitizen($immigrationstatus == self::IMMIGRATION_STATUS_CITIZEN ? '1' : '0');
				
				$applicationPerson->setLawllyfullypresent($immigrationstatus == self::IMMIGRATION_STATUS_LAWFULLY_PRESENT ? '1' : '0');
			}
			
			if(null != ($request->request->get('isincarcerated'))) {
				$applicationPerson->setIsincarcerated('Y');
			}
			
			//@TODO Confirm
			if(null != ($request->request->get('istestapp'))) {
				$applicationPerson->setIsltcattest('Y');
			}
			
			if(null != ($request->request->get('ispregnenant'))) {
				$applicationPerson->setIspregnenant('Y');
			}
			
			if(null != ($request->request->get('iseligibleforinsurance'))) {
				$applicationPerson->setIseligible('Y');
			}
			
			if(null != ($request->request->get('isclaimeroutofstate'))) {
				$applicationPerson->setIsstateresident('Y');
			}
			
			if($state == "md") {
				$applicationPerson->setIsstateresident('Y');
			}
			else {
				$applicationPerson->setIsstateresident('N');
			}
			
			//Lawfully Presence:
			if(null != ($request->request->get('isveteran'))) {
				$applicationPerson->setVetstatus('Y');
			}
				
			if(null != ($request->request->get('isfiveyearbar'))) {
				$applicationPerson->setHadfostermedicaid('Y');
			}
			
			if(null != ($request->request->get('isfiveyearmet'))) {
				//$applicationPerson->('Y');
			}
			
			//Foster Care Information:
			if(null != ($request->request->get('isinfostercare'))) {
				$applicationPerson->setIsfomerfoster('Y');
			}
			
			if(null != ($request->request->get('hadmedicaidinfostercare'))) {
				$applicationPerson->setHadfostermedicaid('Y');
			}
			
			$applicationPerson->setAgeleftfoster(intval($request->request->get('ageleftfostercare')));
			$applicationPerson->setFosterstatecd($request->request->get('fostercarestate'));
			$hrsworked = $request->request->get('hoursworked');
			$applicationPerson->setHrsworked($hrsworked);
			
			//Income
			$wages = $request->request->get('wages');
			$alimony_received = $request->request->get('alimony_received');
			
			$taxable_interest = $request->request->get('taxable_interest');
			$taxexempt_interest = $request->request->get('taxexempt_interest');
			$taxable_refunds = $request->request->get('taxable_refunds');

			$business_income = $request->request->get('business_income');
			$capital_gains = $request->request->get('capital_gains');
			$other_gains = $request->request->get('other_gains');
			$ira_distributions = $request->request->get('ira_distributions');
			$ordinary_dividends = $request->request->get('ordinary_dividends');
			$pensions = $request->request->get('pensions');
			$rental_income = $request->request->get('rental_income');
			$farm_income = $request->request->get('farm_income');
			$unemployment_compensation = $request->request->get('unemployment_compensation');
			$ss_benefits = $request->request->get('ss_benefits');
			$taxable_ss_benefits = $request->request->get('taxable_ss_benefits');
			$other_income = $request->request->get('other_income');
			
			$applicationPerson->setWages($wages);
			$applicationPerson->setAlimony($alimony_received);
			
			$applicationPerson->setTaxableinterest($taxable_interest);
			$applicationPerson->setTaxexemptinterest($taxexempt_interest);
			//@TODO Confirm:
			$applicationPerson->setTaxablerefunds($taxable_refunds);
			
			$applicationPerson->setBusinessincome($business_income);
			$applicationPerson->setCapitalgains($capital_gains);
			$applicationPerson->setOthergains($other_gains);
			$applicationPerson->setIradistributions($ira_distributions);
			$applicationPerson->setOrdinarydividends($ordinary_dividends);
			$applicationPerson->setPensionannuities($pensions);
			$applicationPerson->setRealestateplus($rental_income);
			$applicationPerson->setFarmincome($farm_income);
			$applicationPerson->setUnemployincome($unemployment_compensation);
			//@TODO Confirm:
			$applicationPerson->setSocialsecurity($ss_benefits);
			
			//@TODO Confirm:
			$applicationPerson->setTaxablesocialsecurity($taxable_ss_benefits);
			
			$applicationPerson->setOtherincome($other_income);
			
			//Adjustments
			$educator_expenses = $request->request->get('educator_expenses');
			$business_expenses = $request->request->get('business_expenses');
			$healthsavings_deduction = $request->request->get('healthsavings_deduction');
			$moving_expenses = $request->request->get('moving_expenses');
			$deductible_selfemployment = $request->request->get('deductible_selfemployment');
			$qualified_plans = $request->request->get('qualified_plans');
			$health_insurance_deduction = $request->request->get('health_insurance_deduction');
			$penalty = $request->request->get('penalty');
			$alimony_paid = $request->request->get('alimony_paid');
			$ira_deduction = $request->request->get('ira_deduction');
			$studentloan_deduction = $request->request->get('studentloan_deduction');
			$tution = $request->request->get('tution');
			$domestic_deduction = $request->request->get('domestic_deduction');
			
			$applicationPerson->setEducatorexpenses($educator_expenses);
			$applicationPerson->setBusinessexpenses($business_expenses);
			$applicationPerson->setHealthsavingdeductions($healthsavings_deduction);
			$applicationPerson->setMovingexpenses($moving_expenses);
			$applicationPerson->setSelfemploytaxdeduction($deductible_selfemployment);
			$applicationPerson->setSelfemployplans($qualified_plans);
			$applicationPerson->setSelfemployinsdeductions($health_insurance_deduction);
			$applicationPerson->setWithdrawalpenalty($penalty);
			$applicationPerson->setAlimonypaid($alimony_paid);
			$applicationPerson->setIradeductions($ira_deduction);
			$applicationPerson->setStudentloanintdeductions($studentloan_deduction);
			$applicationPerson->setTution($tution);
			$applicationPerson->setDomproductiondeduction($domestic_deduction);
			
			$applicationPerson->setAddresscity($city);
			$applicationPerson->setAddressstate($state);
			$applicationPerson->setAddressstreet($street);
			$dateofbirth = new \DateTime();
			$dateofbirth->setDate($dob_year,$dob_month,$dob_day);
			$age = Common::computeAge($dateofbirth);
			$applicationPerson->setAge($age);
			
			if($age > 90) {
				$applicationPerson->setAgegt90('Y');
			}
			
			
			
			/*
			
			
			 $applicationPerson->setAmericanstatus($americanstatus);
			 $applicationPerson->setTobaccouser($tobaccouser);
			 $applicationPerson->setTrafffickingvictim($trafffickingvictim);
			
			 $applicationPerson->setIsmedicareentitled($ismedicareentitled);
			
			
			 $applicationPerson->setIspublicempbenefit($ispublicempbenefit);
			
			$applicationPerson->setIstaxrequied($istaxrequied);
			$applicationPerson->setIstempoos($istempoos);
			$applicationPerson->setIsinsured('1');
	
			$applicationPerson->setDod($dod);
			
			
			
			$applicationPerson->setFfalimony($ffalimony);
			$applicationPerson->setFfcapitalgains($ffcapitalgains);
			$applicationPerson->setFfmagideductions($ffmagideductions);
			$applicationPerson->setFfotherincome($ffotherincome);
			$applicationPerson->setFfpentionannuities($ffpentionannuities);
			$applicationPerson->setFftaxableinterest($fftaxableinterest);
			$applicationPerson->setFftaxexemptinterest($fftaxexemptinterest);
			$applicationPerson->setFftaxrefunds($fftaxrefunds);
			$applicationPerson->setFfunemploymentincome($ffunemploymentincome);
			$applicationPerson->setFfwages($ffwages);
			$applicationPerson->setFiveyearbar($fiveyearbar);
			$applicationPerson->setFiveyearbarmet($fiveyearbarmet);
			$applicationPerson->setFortyquaters($fortyquaters);

			
			
			$applicationPerson->setImmigrationdate($immigrationdate);
			$applicationPerson->setImmigrationdatetype($immigrationdatetype);
			
			
			
			$applicationPerson->setMagideductions($magideductions);
			$applicationPerson->setMcmalimony($mcmalimony);
			$applicationPerson->setMcmbusinessincome($mcmbusinessincome);
			$applicationPerson->setMcmcapitalgains($mcmcapitalgains);
			$applicationPerson->setMcmfarmincome($mcmfarmincome);
			$applicationPerson->setMcmiradistributions($mcmiradistributions);
			$applicationPerson->setMcmmagideductions($mcmmagideductions);
			$applicationPerson->setMcmordinarydividends($mcmordinarydividends);
			$applicationPerson->setMcmothergains($mcmothergains);
			$applicationPerson->setMcmotherincome($mcmotherincome);
			$applicationPerson->setMcmpentionannuities($mcmpentionannuities);
			$applicationPerson->setMcmrealestateplus($mcmrealestateplus);
			$applicationPerson->setMcmsocialsecurity($mcmsocialsecurity);
			$applicationPerson->setMcmtaxableinterest($mcmtaxableinterest);
			$applicationPerson->setMcmtaxablerefunds($mcmtaxablerefunds);
			$applicationPerson->setMcmtaxablesocialsecurity($mcmtaxablesocialsecurity);
			$applicationPerson->setMcmtaxexemptinterest($mcmtaxexemptinterest);
			$applicationPerson->setMcmtaxrefunds($mcmtaxrefunds);
			$applicationPerson->setMcmunemployment($mcmunemployment);
			$applicationPerson->setMcmunemploymentincome($mcmunemploymentincome);
			$applicationPerson->setMcmwages($mcmwages);
			
			
			$applicationPerson->setNofixedaddress($nofixedaddress);
			
			
			$applicationPerson->setUnemployment($unemployment);
			$applicationPerson->setVetstatus($vetstatus);
			
			
			*/
			$applicationPerson->setCreatedTimestamp(new \DateTime('now'));
			
			
			//Save data to Application table
			$em->persist($applicationPerson);
			$em->flush();
			
			/**
			 * PersonIncome
			 */
			$payment_entries = $request->request->get("cal_paymentamount");
			if(null != $payment_entries) {
				for($i = 0; $i < count($payment_entries); $i++) {
					$this->addPersonIncome($request, $i, $application, $person);
				}
			}
			
			/**
			 * Adjustments
			 */
			
			
			$return_value = Common::createJsonReturnMessage("SUCCESS",$application->getApplicationid(),"");
			
		} catch(DBALException $ex) {
			$return_value = Common::createJsonReturnMessage("FAILED",0,$ex->getMessage());
		} catch (Exception $ex) {
			$return_value = Common::createJsonReturnMessage("FAILED",0,$ex->getMessage());
		}
		
		
		
		//Call DB to fetch a list of DB Users
		$applicationperson = $em->getRepository('DCGovHavenBundle:ApplicationPerson')->findByApplicationid($application->getApplicationid());
		
		
		$em->clear();
		
		//Get unique application request types
		return $this->render('DCGovHavenBundle:Application:submission.html.twig',
				array('return_value'=>$return_value,
						'applicationperson' => $applicationperson
				));
	}

	/**
	 * Call this method to get unique list of request types
	 */
	private function getRequestTypes() {
		$em = $this->getDoctrine()->getManager();
	
		$query = $em->createQuery("SELECT DISTINCT a.requesttype from DCGovHavenBundle:Application a where a.requesttype is not null and a.requesttype <> ''");
	
		return $query->getResult();
	}
	
	/**
	 * Call this method to add new entry of PersonIncome
	 * @param Request $request
	 * @param Application $application
	 * @param Person $person
	 * @return boolean issaved
	 */
	private function addPersonIncome($request, $pi_index, $application, $person) {
		try {
			$personIncome = new PersonIncome();
			$personIncome->setApplicationid($application);
			$personIncome->setPersonid($person);
				
			$incomeType = $request->request->get("cal_incometype")[$pi_index];
			$wageType = $request->request->get("cal_wagetype")[$pi_index];
			$personIncome->setIncometype($incomeType);
			$personIncome->setWagetype($wageType);
			
			$personIncome->setAnnualincome($request->request->get("cal_annualincome")[$pi_index]);
			$personIncome->setIncomeamount($request->request->get("cal_paymentamount[$pi_index]"));
				
			$personIncome->setPaymentfrequency($request->request->get("cal_paymentfrequency")[$pi_index]);
			$startDate = $request->request->get("cal_startdate")[$pi_index];
			if(null != $startDate) {
				$personIncome->setStartdate(Common::convertDate($startDate,"-"));
			}
			
			$endDate = $request->request->get("cal_enddate")[$pi_index];
			if(null != $endDate) {
				$personIncome->setEnddate(Common::convertDate($endDate),"-");
			}
			
			if("wages" == $incomeType and "w2wages" == $wageType) {
				//Read Employer Information
				$personIncome->setEmployername($request->request->get("cal_employername")[$pi_index]);
				$personIncome->setEmployerid($request->request->get("cal_employerid")[$pi_index]);
				$personIncome->setEmployeraddress($request->request->get("cal_employeraddress")[$pi_index]);
			
				$personIncome->setEmployercity($request->request->get("cal_employercity")[$pi_index]);
				$personIncome->setEmployerstate($request->request->get("cal_employerstate")[$pi_index]);
				$personIncome->setEmployerzipcode($request->request->get("cal_employerzip")[$pi_index]);
				
				$isemployeeEligible = $request->request->get("cal_isemployeeeligible")[$pi_index];
				$personIncome->setEmployeeiseligible($isemployeeEligible);
				
				if("Yes" == $isemployeeEligible || "3" == $isemployeeEligible) {
					//Save Employee Plan information
					$personIncome->setEmployerplancover($request->request->get("cal_employerplancoverage")[$pi_index]);
					$personIncome->setEmployerplanminimum($request->request->get("cal_employerplancoverage")[$pi_index]);
					$personIncome->setEmployeecostfrequency($request->request->get("cal_planfrequency")[$pi_index]);
					$personIncome->setEmplyeecost($request->request->get("cal_employeecost")[$pi_index]);
				}
				
				
			}
			
			$em = $this->getDoctrine()->getManager();
			//Save data to Application table
			$em->persist($personIncome);
			$em->flush();
		} catch(DBALException $ex) {
			return false;
		} catch (Exception $ex) {
			//Log Exception to DB
			return false;
		}
			
	}
	
}