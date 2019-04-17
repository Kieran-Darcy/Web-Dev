<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* This is the Messages model, used for proccessing all the queries
* @author Kieran D'Arcy <kd333@kent.ac.uk>
* @version 0.1 Written using Notepad++
*/
class Messages_model extends CI_Model {
	
	/**
	* The contrutor is run upon creation of class
	* everything run in the constructor can be implemented in the class
	* This function loads the database for use in the rest of the class
	*/
	public function __construct() {
		$this->load->database();
	}
		
	/**
	* This function retrieves the posts from the database of the user whos name is inserted
	*
	* @param string $name Takes the name of the person whos posts need to be retrieved
	* @return array Returns the array of posts from the database
	*/
	public function getMessagesByPoster($name) {
		$sql = "SELECT * FROM Messages WHERE user_username = ? ORDER BY posted_at DESC;";
		$query = $this->db->query($sql, $name);
		return $query->result_array();
	}
	
	/**
	* This function searches the database looking for any message that mathes the string given
	* 
	* @param string $string Is a word or phrase that will be used to find matches in the database
	* @return array Returns the array of matching details to the string given by the user
	*/
	public function searchMessages($string){	
		$string = ('%'.$string.'%');
		$sql = "select * from Messages where text like ? ORDER BY posted_at DESC;";
		$query = $this->db->query($sql, $string);
		return $query->result_array();
	}
	
	/**
	* This funtion inserts a message into the database with the given message and name
	*
	* @param string $poster This parameter takes the name of the person making the posted
	* @param string $string This parameter takes the message that the user wants to upload
	*/
	public function insertMessage($poster, $string) {
		$this->load->helper('date');
		$now = time();
		$time = unix_to_human($now, TRUE, 'uk');
		$sql = "INSERT INTO Messages (user_username, text, posted_at) VALUES (?, ?, ?);";
		$this->db->query($sql, array($poster, $string, $time));
	}

	/**
	* This function gets the messages of the people that the current user follows
	*
	* @param string $name This parameter is the name of the user that you want to retrieve all of the people they follows messages
	* @return array This returns all the messages of the people that the current user follows
	*/
	public function getFollowedMessages($name) {
		$sql = "SELECT * FROM Messages WHERE user_username IN 
		(SELECT followed_username FROM User_Follows WHERE follower_username = ?) ORDER BY posted_at desc;";
		$query = $this->db->query($sql, $name);
		return $query->result_array();
	}
} ?>