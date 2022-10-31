<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function lapor()
	{
		$data = [
			'title' => 'Portal Smart City Solo - Lapor',
			'link' => 'e_lapor',
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function service()
	{
		$data = [
			'title' => 'Portal Smart City Solo - Service',
			'link' => 'e_service',
			'js' => [
                base_url('assets/js_local/pages/e_service.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
}
