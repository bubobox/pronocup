<?php
class Pages extends XController {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->_data['clubs'] = $this->Club_model->all();
		$this->_data['matches'] = $this->Match_model->all();
		$this->_data['phases'] = $this->Phase_model->all();
		$this->_data['predictions'] = $this->Prediction_model->all();
		$this->_data['rankings'] = $this->Ranking_model->all();
		$this->_data['scores'] = $this->Score_model->all();
		$this->_data['users'] = $this->User_model->all();
		$this->render('pages/index');
	}
}