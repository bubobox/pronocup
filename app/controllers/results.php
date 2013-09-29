<?php
class Results extends XController {
	
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
		$this->render('app/results');
	}
}