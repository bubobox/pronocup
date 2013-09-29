<?php
class User_model extends CI_Model {

	const TABLE = 'users';

	function __construct() {
		parent::__construct();
	}

	function all() {
		return $this->db->get(User_model::TABLE)->result();
	}

	function get_by_fbid($fbid) {
		$result = $this->db->get_where(User_model::TABLE, array(
				'fbid' => $fbid,
		))->result();
		if(count($result) == 1) {
			return $result[0];
		}
	}

	function create($data) {
		if(!$this->userExists($data)){
			$this->db->insert(User_model::TABLE, $data);
			$user = $this->get_by_fbid($data['fbid']);
			$this->create_predictions_for_user($user->id);
		}
	}

	function create_predictions_for_user($userId) {
		$matches = $this->db->get(Match_model::TABLE)->result();
		for($i = 0; $i < count($matches); $i++) {
			$prediction = array(
				'user_id' => $userId,
				'match_id' => $matches[$i]->id,
				'score1' => 0,
				'score1' => 0,
				'is_processed' => 0,
			);
			$this->db->insert(Prediction_model::TABLE, $prediction);
		}
		//var_dump($matches);
	}

	function userExists($data) {
		$res = $this->db->get_where(User_model::TABLE, array(
			'fbid' => $data['fbid'],
		))->result();
		return count($res) == 1;
	}
}