<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archives extends CI_Controller {

	public function index($id = null) {
		$this->load->model('volume_model');
		$data['volumes'] = $this->volume_model->get_archived_volumes();
		$data['sidebar'] = $this->load->view('components/global/volume-sidebar', $data, TRUE);
		$data['id'] = $id;
		if($data['id']){
			$data['volume'] = $this->volume_model->get_volume_by_id($data['id']);
		} else {
			$data['id'] = $data['volumes'][0]['vol_id'];
			$data['volume'] = $this->volume_model->get_volume_by_id($data['id']);
		}

		$this->load->view('templates/header');
		$this->load->view('global/archives', $data);
		$this->load->view('templates/footer');
	}


}
