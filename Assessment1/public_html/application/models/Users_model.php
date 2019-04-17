<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is the Users model, used for proccessing all the queries
* @author Kieran D'Arcy <kd333@kent.ac.uk>
* @version 0.1 Written using Notepad++
*/
class Users_model extends CI_Model {
	
	/**
	* The contrutor is run upon creation of class
	* everything run in the constructor can be implemented in the class
	* This function loads the database and starts a session for use in the rest of the class
	*/
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}
		
	/**
	* This function checks if the details the user put in are the same as the details from the database
	*
	* @param string $username This parameter is the username of the person trying to login
	* @param string $pass This parameter is the password of the user trying to login
	* @return boolean Returns TRUE or FALSE depending on if the details match the details in the database
	*/
	public function checkLogin($username, $pass) {
		$sql = "SELECT * FROM Users WHERE username = ? AND password = sha1(?);";
		$query = $this->db->query($sql, array($username, $pass));
		
		if(count($query->result_array()) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/**
	* This function check if the current user is following another user
	*
	* @param string $follower This parameter is of the current user
	* @param string $followed This parameter is of the person the user is checking if they follow
	* @return boolean Return TRUE or FALSE depending on if the current user follows the specified user
	*/
	public function isFollowing($follower, $followed) {
		$sql = "SELECT * FROM User_Follows WHERE follower_username = ? AND followed_username = ?;";
		$query = $this->db->query($sql, array($follower, $followed));
		if(count($query->result_array()) > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	/**
	* This function makes the current user follow the specified user by updating the database
	* 
	* @param string $followed This parameter is the user the current user wants to follow
	*/
	public function follow($followed) {
		$sql = "INSERT INTO User_Follows (follower_username, followed_username) VALUES (?, ?);";	
		$this->db->query($sql, array($_SESSION['username'], $followed));
	}
	
	/**
	* This function makes the current user unfollow the speified user by updating the database
	* 
	* @param string $followed This parameter is the user the current user want to unfollow
	*/
	public function unfollow($followed) {
		$sql = "DELETE FROM User_Follows WHERE follower_username = ? AND followed_username = ?;";
		$this->db->query($sql, array($_SESSION['username'], $followed));
	}
}