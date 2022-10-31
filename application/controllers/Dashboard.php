<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	private $title = "Portal Smart City Solo";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MUsers','mu');
		$this->load->model('MArtikel','ma');
		$this->load->model('MPengaduan','mp');

		if (!$this->session->userdata('id')) {
            redirect('/');
		}
	}

	public function index()
	{
		$data = [
			'link' => 'dashboard',
			'title' => $this->title,
			'total_artikel' => count($this->ma->get('','status = 1')->result()),
			'total_pengaduan' => count($this->mp->get('','status = 1')->result()),
			'artikel' => $this->ma->getArtikel('','3')->result(),
			'fileScript' => 'dashboard.js',
			'pies' => json_encode($this->ma->pies()),
			'lines' => []//json_encode($this->mp->lines())
		];
		// $a = $this->ma->getArtikel('','3')->result();
		// print_r($a);die();
		$this->load->view('main',$data);
	}
}
