<?php
class Club_model extends CI_Model {
	
	const TABLE = 'clubs';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(Club_model::TABLE)->result();
	}
}