<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function index() {
		$this->load->view('home');
	}
	public function direction() {
		$post = $this->input->post();
		$key = 'AIzaSyAjxup0YW5xZtjDXkx7mSNWxJqZAtNFThA';
		$html = file_get_contents("https://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($post['origin'])."&destination=".urlencode($post['destination'])."&key=".$key);
		$this->output->set_content_type('application/json')->set_output($html);
	}

}