<?php
class Prediction_model extends CI_Model {

	const TABLE = 'predictions';

	function __construct() {
		parent::__construct();
	}

	function all() {
		return $this->db->get(Prediction_model::TABLE)->result();
	}

	function get_predictions_by_user($userId) {
		return $this->db->get_where(Prediction_model::TABLE, array(
			'user_id' => $userId,
		))->result();
	}

	function update($data, $id) {
		$this->db->where('id', $id);
		$this->db->update(Prediction_model::TABLE, $data);
	}

	function get_by_match_and_user($matchId, $userId) {
		$predictions = $this->db->get_where(Prediction_model::TABLE, array(
			'match_id' => $matchId,
			'user_id' => $userId,
		))->result();
		if(count($predictions) > 0) {
			return $predictions[0];
		}
	}
}