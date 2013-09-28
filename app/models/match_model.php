<?php
class Match_model extends CI_Model {
	
	const TABLE = 'matches';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(Match_model::TABLE)->result();
	}
}