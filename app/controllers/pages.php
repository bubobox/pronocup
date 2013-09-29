<?php
// Controller for static pages
class Pages extends XController {

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

	public function create() {
		$data['username']=$this->input->post('username');
		$data['email']= $this->input->post('email');
		$data['name']=$this->input->post('name');
		$data['fbid']=$this->input->post('fbid');
		$this->User_model->create($data);
	}

	public function json() {
		$this->output ->set_content_type('application/json');
		$data = array(
				'a' => 1,
				'b' => 2,
				'c' => 3,
		);
		echo json_encode($data);
	}

}