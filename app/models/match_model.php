<?php
class Match_model extends CI_Model {
	
	const TABLE = 'matches';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(Match_model::TABLE)->result();
	}

	function get_by_phase($phase_id) {
		return $this->db->get_where(Match_model::TABLE, array(
			'phase_id' => $phase_id,
		));
	}
}