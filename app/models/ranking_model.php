<?php
class Ranking_model extends CI_Model {
	
	const TABLE = 'rankings';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(Ranking_model::TABLE)->result();
	}
}