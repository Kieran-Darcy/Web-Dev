<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is the Message controller, used for viewing the post page and posting messages
* @author Kieran D'Arcy <kd333@kent.ac.uk>
* @version 0.1 Written using Notepad++
*/
class Message extends CI_Controller {
	
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
	* This function loads the Post page if the user is logged in, otherwise it redirects the user to the login screen
	*/
	public function index() {
		if(isset($_SESSION['username'])) {
			$this->load->view('Post');
		} else {
			header("Location:".base_url("user/login"));		
		}
	}
	
	/**
	* This function called from the form in the Post view
	* This function checks if the user is logged in then posts the message, otherwise redirects the user to the login screen
	*/
	public function doPost() {		
		if(isset($_SESSION["username"])) {
			$user = $_SESSION["username"];
			$this->load->model('Messages_model');
			$this->Messages_model->insertMessage($user, $_POST['mpost']);
			header("Location:".base_url("user/view/").$user);	
		} else {
			header("Location:".base_url("user/login"));
		}
	}
}
?>