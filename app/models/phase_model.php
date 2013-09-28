<?php
class Phase_model extends CI_Model {
	
	const TABLE = 'phases';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(Phase_model::TABLE)->result();
	}
}