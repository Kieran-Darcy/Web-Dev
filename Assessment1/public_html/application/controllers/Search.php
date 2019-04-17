<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is the Search controller, used for searching through posts
* @author Kieran D'Arcy <kd333@kent.ac.uk>
* @version 0.1 Written using Notepad++
*/
class Search extends CI_Controller {
	
	/**
	* The contrutor is run upon creation of class
	* everything run in the constructor can be implemented in the class
	* This function starts a session and loads the url helper
	*/
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	
	/**
	* This function is automatically called when this class is called
	* This function loads the Search page
	*/
	public function index()	{
		$this->load->view('Search');
	}
	
	/**
	* Gets the search message from the Search page and then sends the data to the ViewMessages view for display
	*/ 	
	public function dosearch() {
		$this->load->model('Messages_model');
		$data = $this->Messages_model->searchMessages($_GET["search"]);
		
		if(count($data) > 0) {
			$viewData = array('results' => $data);
			$this->load->view('ViewMessages', $viewData);
		} else {
			echo 'No posts with this word or phrase';
			$this->index();
		}
	}
	
} ?>