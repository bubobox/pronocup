<?php
class XController extends CI_Controller {

	// View data
	protected $_data = array();

	// True if the user is logged in
	protected $_is_authenticated = false;

	// Authenticated user object
	protected $_user;

	// Constructor
	public function __construct() {
		parent::__construct();

		// Load helpers
		$this->load->helper('escape');
		$this->load->helper('url');

		// Load models
		$this->load->model('Club_model', 'Club_model', true);
		$this->load->model('Match_model', 'Match_model', true);
		$this->load->model('Phase_model', 'Phase_model', true);
		$this->load->model('Prediction_model', 'Prediction_model', true);
		$this->load->model('Ranking_model', 'Ranking_model', true);
		$this->load->model('Score_model', 'Score_model', true);
		$this->load->model('User_model', 'User_model', true);

		// Start session
		$this->load->library('session');

		// Some view vars
		$this->_data['application_name'] = 'Pronocup';
		$this->_data['base'] = $this->config->item('base_url');

		// Get session data
		$this->_is_authenticated = (bool) $this->session->userdata('is_authenticated');
		$this->_user = $this->session->userdata('user');

		// Set session data as view vars
		$this->_data['is_authenticated'] = $this->_is_authenticated;
		$this->_data['user'] = $this->_user;
	}

	public function login($data) {
		$fbid = $data['fbid'];
		$user = $this->User_model->get_by_fbid($fbid);
		//var_dump($user);
		/*$this->session->set_userdata(array(
			'is_authenticated' => true,
			'user' => $user,
		));*/
		//redirect('/');
	}

	public function logout() {
		$this->session->set_userdata(array(
			'is_authenticated' => false,
			'user' => null,
		));
		redirect('/');
	}

	public function render($template) {
		$this->load->view('header', $this->_data);
		$this->load->view($template, $this->_data);
		$this->load->view('footer', $this->_data);
	}
}