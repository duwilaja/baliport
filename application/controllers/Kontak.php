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
			'title' => 'Portal Smart City Bali - Kontak',
			'link' => 'kontak',
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	public function galeri()
	{
		$this->load->model('MBanner','mb');
        $bn = $this->mb->get('',['status' => 1])->result();
		
		$data = [
			'title' => 'Portal Smart City Bali - Galeri',
			'link' => 'galeri',
			'galeri' => $bn,
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	public function pidio()
	{
		$this->load->model('MBanner','mb');
        $bn = $this->mb->getVid('',['status' => 1])->result();
		
		$data = [
			'title' => 'Portal Smart City Bali - Galeri',
			'link' => 'pidio',
			'galeri' => $bn,
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	public function grafik()
	{
		$data = [
			'title' => 'Portal Smart City Bali - Infographic',
			'link' => 'grafik',
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	public function transport()
	{
		$data = [
			'title' => 'Portal Smart City Bali - Transportation Route',
			'link' => 'transport',
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
	
	public function trafic()
	{
		$data = [
			'title' => 'Portal Smart City Bali - Live Traffic',
			'link' => 'trafic',
			'js' => [
                base_url('assets/js_local/pages/e_lapor.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

}
