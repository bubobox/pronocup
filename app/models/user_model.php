<?php
class User_model extends CI_Model {
	
	const TABLE = 'users';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(User_model::TABLE)->result();
	}
}