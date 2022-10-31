<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yanrat extends CI_Controller {

	private $title = " - Portal Smart City Solo";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('MYanrat','my');

		if (!$this->session->userdata('id')) {
            redirect('/');
		}
	}

	public function index()
	{
		$data = [
			'link' => 'yan_darurat',
			'title' => 'Layanan Darurat'.$this->title,
            'fileScript' => 'yanrat.js',
		];
		$this->load->view('main',$data);
	}

    public function dt_yanrat()
	{
		echo $this->my->dt_yanrat();
	}

    public function in_yanrat()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;

		$nama_layanan = $this->input->post('nama_layanan');
		$nomor_layanan = $this->input->post('nomor_layanan');
		$alamat_layanan = $this->input->post('alamat_layanan');
   
        $obj = [
            'nama_layanan' => $nama_layanan,
            'nomor_layanan' => $nomor_layanan,
            'alamat_layanan' => $alamat_layanan,
            'ctd_date' => date('Y-m-d'),
            'status' => 1,
        ];

		$in = $this->my->inYanrat($obj);
        if ($in != '') {

            $status = true;
            $msg = "Berhasil menambahkan data";
			
		}else{
			$status = false;
			$msg = "Gagal menambahkan data";
		}

		$response = [
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($response);
    }

    public function getYanrat($id='')
    {
        $data = '';
        if (!empty($id)) {
           $q = $this->my->get($id)->row();
        }else{
            $q = $this->my->get()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_yanrat()
    {
		$id = $this->input->post('id');
		$nama_layanan = $this->input->post('nama_layanan');
		$nomor_layanan = $this->input->post('nomor_layanan');
		$alamat_layanan = $this->input->post('alamat_layanan');

		$obj = [
			'nama_layanan' => $nama_layanan,
            'nomor_layanan' => $nomor_layanan,
            'alamat_layanan' => $alamat_layanan,
            'ctd_upd' => date('Y-m-d'),
		];
		
		
		$up = $this->my->upYanrat($obj,['id' => $id]);
		if ($up) {
            $status = true;
            $msg = "Berhasil mengupdate data";
		}else{
			$status = false;
			$msg = "Gagal mengupdate data";
		}

		$response = [
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($response);
	}

    public function set_nonaktif($id)
	{
		$data = [
            'status' => 0
        ];

		$x = $this->my->upYanrat($data,['id' => $id]);
		
		if ($x) {
			$status = true;
			$msg = "Berhasil menghapus data";
		}

		$response = [
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($response);
	}

}
