<?php
class User_model extends CI_Model {

	const TABLE = 'users';

	function __construct() {
		parent::__construct();
	}

	function all() {
		return $this->db->get(User_model::TABLE)->result();
	}

	function create($data) {
		$this->db->insert(User_model::TABLE, $data);
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
		if(userExists($data)){
			$this->db->insert(User_model::TABLE, $data);
		}
	}

	function userExists($data) {
		$query = $this->db->query("SELECT * FROM users WHERE fbid=?;",array($data->fbid));
		if ($query->result()->num_rows() > 0) return true;
		return false;

	}
}