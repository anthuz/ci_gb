<?php
class Guestbook_model extends CI_Model {
	
	function _construct()
	{
		// Call the Model constructor
		parent::_construct();
	}
	
	function addMessage($name = null, $message = null) {
		$sql = "INSERT INTO guestbook(name, message) VALUES (?, ?)";
		
		$result = $this->db->query($sql, array($name, $message));
		
		if ($result) {
			echo 'Message have been added!';
		}
		else {
			echo 'Something went wrong!';
		}
	}
	
	function getMessages() {
		$sql = "SELECT * from guestbook ORDER BY id DESC";
		
		$result = $this->db->query($sql);
		
		if($result->num_rows() > 0) {
			return $result->result_array();
		}
		else {
			return FALSE;
		}
	}
	
	function deleteMessages() {
		$sql = "DELETE from guestbook";
		
		$result = $this->db->query($sql);
		
		if ($result) {
			echo 'All messages have been deleted!';
		}
		else {
			echo 'Something went wrong!';
		}
	}
}
?>