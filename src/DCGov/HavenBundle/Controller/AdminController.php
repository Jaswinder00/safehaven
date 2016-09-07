<?php
namespace DCGov\HavenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use DCGov\HavenBundle\Utility\Common;


class AdminController extends Controller
{
	public function indexAction(Request $request)
	{
		
		return $this->render('DCGovHavenBundle:Admin:index.html.twig');
	}
	
	public function manageReportsAction(Request $request)
	{
		return $this->render('DCGovHavenBundle:Admin:managereports.html.twig');
	}
	
	public function manageReportSettingsAction(Request $request)
	{
		$reportid = $request->query->get('reportid');
		
		$em = $this->getDoctrine()->getManager();
		$report = $em->getRepository('DCGovHavenBundle:Report')->find($reportid);
		
		if (!$report) {
			//Redirect the user to manager reports page
			return $this->render('DCGovHavenBundle:Admin:managereports.html.twig');
		}
		
		//Instantiate the Custom Report Controller to call getReportColumns method
		$custom_report = new CustomReportController($this->container);
		
		return $this->render('DCGovHavenBundle:Admin:reportsettings.html.twig',
			array("report" => $report, "report_columns" => $custom_report->getReportColumns($reportid))
		);
	}
	
	/**
	 * Call this function to get the Reports in a json format
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getReportsAction(Request $request) {
		
		$report = new CustomReportController($this->container);
		$json = $report->getReportsAsJsonString();
		 
		$response = new Response();
		$response->setContent($json);
		$response->headers->set('Content-Type', 'application/json');
		 
		return $response;
	}
	
	
	/**
	 * Call this method to save report
	 * @param Request $request
	 * @throws NotFoundHttpException
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function saveReportAction(Request $request) {
	
		Common::checkRequest($request);
		 
		//Get the Post Values
		$post_action = $request->request->get('action');
		$post_data = $request->request->get('data'); //Get the post data
		
		$report = new CustomReportController($this->container);
		$json = $report->saveReport($post_action, $post_data);
		 
		$response = new Response();
		$response->setContent($json);
		 
		return $response;
	}
	
	/**
	 * Call this method save report settings in the following format:
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
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function saveReportSettingsAction(Request $request) {
		Common::checkRequest($request);
		$settings_as_json_string = "";
		$return_value = "";
		
		$settings_array = array();
		$datatable_settings = array();
		$column_options = array();
		
		//Read the Post Values
		$reportid = $request->request->get('reportid');
		$showexporttoexcel = $request->request->get('showexporttoexcel');
		
		//Handle the open that displays Export to excel option
		if($showexporttoexcel) {
			$datatable_settings['showexporttoexcel'] = "1";
		}
		
		//Read All of the columns as an array
		$columns = $request->request->get('column');
		for($i = 0; $i < count($columns); $i++ ) {
			if("none" != $columns[$i]) {
				$column_options[] = ["columnindex" => "$i", "columnfilteroption" => "$columns[$i]"];
			}
		}
		
		//Add Column Options Array
		$datatable_settings['column_options'] = $column_options; 
		//Add Data Settings Array		
		$settings_array['datatable_settings'] = $datatable_settings;
		
		//Conver the Settings Array into Json String
		$settings_as_json_string = json_encode($settings_array);
		
		
		try {
			$report = new CustomReportController($this->container);
			if($report->saveReportSettings($reportid, $settings_as_json_string)) {
				$return_value = Common::createJsonReturnMessage("SUCCESS");
			} else {
				$return_value = Common::createJsonReturnMessage("FAILED");
			}
		} catch(Exception $ex) {
			$return_value = Common::createJsonReturnMessage("FAILED",0,$ex->getMessage());
		}
		
		
		$response = new Response();
		$response->setContent($return_value);
			
		return $response;
	}
	
	/**
	 * Handle User Management
	 */
	public function manageUsersAction(Request $request) {
		return $this->render('DCGovHavenBundle:Admin:manageusers.html.twig');
	}

	/**
	 * 
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function getUsersAction(Request $request) {
		$users = new CustomUserController($this->container);
		$json = $users->getUsersAsJsonString();
			
		$response = new Response();
		$response->setContent($json);
		$response->headers->set('Content-Type', 'application/json');
			
		return $response;
	}
	
	/**
	 * Call this method to save User: Add/Update/Delete
	 * @param Request $request
	 * @throws NotFoundHttpException
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function saveUserAction(Request $request) {
		Common::checkRequest($request);
			
		//Get the Post Values
		$post_action = $request->request->get('action');
		$post_data = $request->request->get('data'); //Get the post data
		
		$user = new CustomUserController($this->container);
		$json = $user->saveUser($post_action, $post_data);
			
		$response = new Response();
		$response->setContent($json);
		$response->headers->set('Content-Type', 'application/json');
		
		return $response;
	}
 	
}