<?php
class Score_model extends CI_Model {
	
	const TABLE = 'scores';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(Score_model::TABLE)->result();
	}
}