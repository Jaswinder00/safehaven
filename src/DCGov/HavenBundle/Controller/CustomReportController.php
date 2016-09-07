<?php
namespace DCGov\HavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use DCGov\HavenBundle\Utility\Common;
use DCGov\HavenBundle\Entity\Report;
use Monolog\Logger;

class CustomReportController extends ReportController
{
	
	public function __construct($container = null) {
		$this->setContainer($container);
	}
	
	/**
	 * Call this function to get the Reports in a json format
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getReportsAsJsonString() {

		$entities = $this->getReports();
		
		$json = '{"draw": 1,
         "recordsTotal":'.count($entities).',
         "recordsFiltered":10,
         "data":[';
		 
		foreach ($entities as $entity) {
			$report_settings_link = $this->generateUrl('dc_gov_haven_admin_managereport_settings',
					array('reportid' => $entity->getId() ));
			
			$sql = preg_replace("/[\n\r]/"," ",addcslashes($entity->getSqlStatement(),'"')); 
			
			$json .= '{ "DT_RowId":"'.Common::ID_PREFIX . $entity->getId() . 
				'","name":"'.$entity->getName().
				'","reportlink":"'.'<a href=\"'. $report_settings_link .'\">'.$entity->getName().'</a>'.
    			'","displayname":"'.$entity->getHeader().
                '","sql":"'.$sql.
                '","isactive":"'.$entity->getIsactive() . '" },';
		}
		 
		$json = rtrim($json, ",");
		$json .= '], "options": [], "files": [] }';
		 
		 
		return $json;
	}
	
	/**
	 * Call this method to save report
	 * @param Request $request
	 * @throws NotFoundHttpException
	 * @return string - JSon string
	 */
	public function saveReport($post_action,$post_data) {
	
		$json = "";
		$reportid = 0;
		
		foreach ($post_data as $id => $values) {
			$reportid = str_replace( Common::ID_PREFIX, '', $id );
		}

		if("edit" == $post_action) {	//Update
			$json = $this->updateReport($post_data, $reportid);
		
		} elseif ("remove" == $post_action) {	//Remove
			$common = new CommonController($this->container);
			$common->removeEntity($reportid, 'DCGovHavenBundle:Report');
			$json = '{ "data": [] }';
	
		} elseif ("create" == $post_action) {	//New
			$json = $this->createReport($post_data);
		} else {
			throw new NotFoundHttpException("Page not found");
		}
		 
		return $json;
	}
	
	/**
	 * Call this method to create Report entry in the database
	 * @param string $post_data
	 * @param integer $reportid
	 * @return string - Json String
	 */
	public function createReport($post_data) {
			
		$em = $this->getDoctrine()->getManager();
		$entity = new Report();
		$reportid = 0;

		$entity->setName($post_data[$reportid]["name"]);		
		$entity->setHeader($post_data[$reportid]["displayname"]);
		$entity->setSqlStatement($post_data[$reportid]["sql"]);

	
		$entity->setIsactive( (int) $post_data[$reportid]["isactive"]);

		$entity->setModifiedBy(Common::getLoggedInUsername($this));
		$entity->setModifiedTimestamp(new \DateTime("now"));
		
		$entity->setCreatedBy(Common::getLoggedInUsername($this));
		$entity->setCreatedTimestamp(new \DateTime("now"));
		
		$em->persist($entity);
		$em->flush();
		
		$report_settings_link = $this->generateUrl('gap_admin_managereport_settings',
				array('reportid' => $entity->getId() ));
		$sql = preg_replace("/[\n\r]/"," ",addcslashes($entity->getSqlStatement(),'"'));
		//Prepare and return JSON for Datatable to display correctly
		$json = '{ "data": [ '.
	
				'{ "DT_RowId":"'.Common::ID_PREFIX . $entity->getId() .
				'","name":"'.$entity->getName().
				'","reportlink":"'.'<a href=\"'. $report_settings_link .'\">'.$entity->getName().'</a>'.
				'","displayname":"'.$entity->getHeader().
				'","sql":"'.$sql.
				'","isactive":"'.$entity->getIsactive().
				'" } ] , "options": [], "files": [] }';
	
		return $json;
	}
	
	/**
	 * Call this method to update the Contenant Economics Information
	 * @param Request $request
	 * @param integer $cotentant_id
	 */
	public function updateReport($post_data, $reportid) {
		 
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('DCGovHavenBundle:Report')->find($reportid);
	
		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Report entity.');
		}
		
		if($entity) {
			if(isset($post_data[Common::ID_PREFIX.$reportid]["name"]))
				$entity->setName($post_data[Common::ID_PREFIX.$reportid]["name"]);
			
			if(isset($post_data[Common::ID_PREFIX.$reportid]["displayname"]))
				$entity->setHeader($post_data[Common::ID_PREFIX.$reportid]["displayname"]);
			
			if(isset($post_data[Common::ID_PREFIX.$reportid]["sql"])) {
				$entity->setSqlStatement( $post_data[Common::ID_PREFIX.$reportid]["sql"]);

				
				//Reset Report Settings
				$entity->setSettings("");
			}
				
			if(isset($post_data[Common::ID_PREFIX.$reportid]["isactive"]))
				$entity->setIsactive( (int) $post_data[Common::ID_PREFIX.$reportid]["isactive"]);
			
			$entity->setModifiedBy(Common::getLoggedInUsername($this));
			$entity->setModifiedTimestamp(new \DateTime("now"));
			
			
			
			$em->persist($entity);
			$em->flush();
		}
		
		$report_settings_link = $this->generateUrl('gap_admin_managereport_settings',
				array('reportid' => $entity->getId() ));
		
		$sql = preg_replace("/[\n\r]/"," ",addcslashes($entity->getSqlStatement(),'"'));
		//Prepare and return JSON for Datatable to display correctly
		$json = '{ "data": [ '.

				'{ "DT_RowId":"'.Common::ID_PREFIX . $entity->getId() . 
				'","name":"'.$entity->getName().
				'","reportlink":"'.'<a href=\"'. $report_settings_link .'\">'.$entity->getName().'</a>'.
				'","displayname":"'.$entity->getHeader().
				'","sql":"'.$sql.
				'","isactive":"'.$entity->getIsactive().
				'" } ] , "options": [], "files": [] }';

		return $json;
	}
	
	/**
	 * Call this method to get Report Columns based on Report ID
	 * @param int $reportid
	 * @return array - Array consist of Column Names will be returned.
	 */
	public function getReportColumns($reportid) {
		$report_columns = array();
	
		if($reportid > 0) {
			$em = $this->getDoctrine()->getManager();
			$entity_Report = $em->getRepository('DCGovHavenBundle:Report')->find($reportid);
			if($entity_Report) {
				try {
					$query = $em->getConnection()->prepare($entity_Report->getSqlStatement());
					$query->execute();
				
					$entities = $query->fetchAll();
					if(count($entities) > 0 ) {
							
						$firstrow = $entities[0];
						//Iterate through 1st row and get column data
						foreach ($firstrow as $key => $value) {
								
							$report_columns[] = $key;
						}
					}
				} catch(\Doctrine\DBAL\DBALException $ex) {
					$logger = $this->get('logger');
					$logger->error("Unable to to execute query: ".$ex->getMessage());		
				}					
			}
		}
	
		return $report_columns;
	}
	
	/**
	 * Call this method to get existing reports in the system
	 */
	public function getReports() {
		$em = $this->getDoctrine()->getManager();
		return $em->getRepository('DCGovHavenBundle:Report')->findAll();
	}
	
	/**
	 * Call this method to save the report settings as a JSON string(input):
	 * 
	 * {
			"datatable_settings": {
				"column_options": [{
					"columnfilteroption": "input",
					"columnindex": "2",
					"columnwidth": "200px"
				}, {
					"columnfilteroption": "dropdown",
					"columnindex": "3",
					"columnwidth": "100px"
				}, {
					"columnfilteroption": "input",
					"columnindex": "4"
				}],
				"showexporttoexcel": "1"
			}
		}
	 * @param integer $reportid
	 * @param string $settings
	 */
	/**
	 * 
	 * @param unknown $reportid
	 * @param unknown $settings_as_json_string
	 * @return boolean
	 * @throws Exception
	 */
	public function saveReportSettings($reportid, $settings_as_json_string) {
		
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('DCGovHavenBundle:Report')->find($reportid);
		
		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Report entity.');
		} else {
			$entity->setSettings($settings_as_json_string);
								
			$entity->setModifiedBy(Common::getLoggedInUsername($this));
			$entity->setModifiedTimestamp(new \DateTime("now"));
				
			$em->persist($entity);
			$em->flush();
			
			return true;
		}
		
	}
	
	/**
	 * Call this function to get a Report in a json format
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response as JSON Object
	 */
	public function getReportSettingsAction(Request $request) {
	
		$reportid = $request->query->get('reportid');
		$json = "{}";
	
		$em = $this->getDoctrine()->getManager();
		$report = $em->getRepository('DCGovHavenBundle:Report')->find($reportid);
	
		if ($report and $report->getSettings() != null) {
			$json = $report->getSettings();
		}
	
			
		$response = new Response();
		$response->setContent($json);
		$response->headers->set('Content-Type', 'application/json');
			
		return $response;
	}
	
	
}