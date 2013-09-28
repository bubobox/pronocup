<?php
class Predictions extends XController {
	public function index() {
		$phases = $this->Phase_model->all();
		for($i = 0; $i < count($phases); $i++) {
			$matches = $this->Match_model->get_by_phase($phases[$i]->id);
			$phases[$i]->matches = $matches;
			break;
		}
		$this->_data['phases'] = $phases;
		$this->render('app/predictions');
	}
}