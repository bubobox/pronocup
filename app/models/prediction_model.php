<?php
class Prediction_model extends CI_Model {
	
	const TABLE = 'predictions';

	function __construct() {
		parent::__construct();
	}
	
	function all() {
		return $this->db->get(Prediction_model::TABLE)->result();
	}
}