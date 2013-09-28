<?php
class XController extends CI_Controller {

	protected $_data = array();

	public function __construct() {
		parent::__construct();
		$this->load->helper('escape');
		$this->load->model('Club_model', 'Club_model', true);
		$this->load->model('Match_model', 'Match_model', true);
		$this->load->model('Phase_model', 'Phase_model', true);
		$this->load->model('Prediction_model', 'Prediction_model', true);
		$this->load->model('Ranking_model', 'Ranking_model', true);
		$this->load->model('Score_model', 'Score_model', true);
		$this->load->model('User_model', 'User_model', true);
		$this->_data['application_name'] = 'Pronocup';
	}

	public function render($template) {
		$this->load->view('header', $this->_data);
		$this->load->view($template, $this->_data);
		$this->load->view('footer', $this->_data);
	}
}