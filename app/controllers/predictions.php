<?php
class Predictions extends XController {

	public function index() {
		$phases = $this->Phase_model->all();
		for($i = 0; $i < count($phases); $i++) {
			$matches = $this->Match_model->get_by_phase($phases[$i]->id);
			for($j = 0; $j < count($matches); $j++) {
				$matchId = $matches[$j]->id;
				$userId = $this->_user->id;
				$prediction = $this->Prediction_model->get_by_match_and_user($matchId, $userId);
				$matches[$j]->prediction = $prediction;
			}
			$phases[$i]->matches = $matches;
		}
		$this->_data['phases'] = $phases;
		$this->render('app/predictions');
	}

	public function submit() {
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$predictions = $this->Prediction_model->get_predictions_by_user($this->_user->id);
			for($i = 0; $i < count($predictions); $i++) {
				$pre = $predictions[$i];
				$pre->score1 = intval($this->input->post('prediction_' . $predictions[$i]->id . '_score1'));
				$pre->score2 = intval($this->input->post('prediction_' . $predictions[$i]->id . '_score2'));
				$this->Prediction_model->update($pre, $pre->id);
			}
		}
		redirect('/predictions/index');
	}

	public function mail() {
		$this->output->set_content_type('text/plain');
		$to = 'kristof.verbraeken@gmail.com';
		$subject = 'Test';
		$message = 'Test';
		$headers = '';
		//$headers = 'From: kristof@e-kon.be' . "\r\n";
		//$headers .= "X-Mailer: PHP/" . phpversion();
		mail($to, $subject, $message, $headers);
	}

	public function test() {
		$this->output->set_content_type('text/plain');
		$this->User_model->create_predictions_for_user(1);
	}
}