<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$data = [
			'title' => 'Portal Smart City Solo - Kontak',
			'link' => 'kontak',
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}


}
