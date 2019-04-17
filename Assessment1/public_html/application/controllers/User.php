<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is the User controller, used for basic functionality of the program
* @author Kieran D'Arcy <kd333@kent.ac.uk>
* @version 0.1 Written using Notepad++
*/
class User extends CI_Controller {
	
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
	* This function redirects the user to the login screen
	*/
	public function index() {
		header("Location:".base_url("user/login"));
	}
	
	/**
	* This function views the posts of users
	*
	* @param string $name The name of the user whos page you want to view 
	*/
	public function view($name) {		
		$this->load->model('Messages_model');
		$data = $this->Messages_model->getMessagesByPoster($name);
		
		
		if(isset($_SESSION['username']) and count($data) > 0) 
		{
			$sesuser = $_SESSION['username'];
			$this->load->model('Users_model');
			$follows = $this->Users_model->isFollowing($sesuser, $name);
			
			if($follows and $sesuser != $name) 
			{
				$foll['unfollow'] = "<div class=\"follbtn\" ><a href=\"".base_url('user/unfollow/').$name."\" >Unfollow $name</a></div>";
				$viewData = array('results' => $data, 'follow' => $foll['unfollow']);
			} else if(!$follows and $sesuser != $name){
				$foll['follow'] = "<div class=\"follbtn\" ><a href=\"".base_url('user/follow/').$name."\" >Follow $name</a></div>";
				$viewData = array( 'results' => $data, 'follow' => $foll['follow']);
			} else {
				$viewData = array( 'results' => $data);
			}			
			$this->load->view('ViewMessages', $viewData);
			
		} else if(count($data) > 0) {
			$viewData = array( 'results' => $data);
			$this->load->view('ViewMessages', $viewData);}
			else {
			echo 'No information to display, please anter a valid name';
		}
	}
	
	/**
	* This function loads the login view
	*/
	public function login() {
		$this->load->view('Login');
	}
	
	/**
	* This function gets the login details from the login page, creates a session variable and then loads thee posts by that user
	*/
	public function doLogin() {
		if(!isset($_POST['username']) or !isset($_POST['pass'])) {
			header("Location:".base_url("user/login"));
		} else {
			$this->load->model('Users_model');		
			$username = $_POST['username'];
			$check = $this->Users_model->checkLogin($username, $_POST['pass']);
				
			if($check) {	
				$_SESSION["username"] = $username;
				header("Location:".base_url("user/view/").$username);							
			} else {
				echo 'Incorrect username or password';
				header("Location:".base_url("user/login"));
			}
		}
	}
	
	/**
	* This funtion gets the posts of everyone the current user is following
	* 
	* @param string $name Takes the name of the current user and views all the posts from the people the current user follows
	*/
	public function feed($name) {
		$this->load->model('Messages_model');
		$data = $this->Messages_model->getFollowedMessages($name);
		
		if(count($data) > 0) {
			$viewData = array('results' => $data);
			$this->load->view('ViewMessages', $viewData);
		} else {
			echo 'No information to display or invalid name';
		}
	}
	
	/**
	* This function lets the current user follow another user
	*
	* @param string $followed Takes the name of the user the current user would like to follow
	*/
	public function follow($followed) {
		$this->load->model('Users_model');
		$this->Users_model->follow($followed);
		header("Location:".base_url("user/view/").$followed);
	}
	
	/**
	* This function lets the current user unfollow a user that they're already following
	*
	* @param string $followed Takes the name of the user the current user wants to unfollow
	*/
	public function unfollow($followed) {
		$this->load->model('Users_model');
		$this->Users_model->unfollow($followed);
		header("Location:".base_url("user/view/").$followed);
	}
	
	/**
	* Logs the current user out destroys the session and redirects the user to the login screen
	*/
	public function logout() {
		session_destroy();
		header("Location:".base_url("user/login"));
	}
} ?>