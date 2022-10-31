<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

  private $title = " - Portal Smart City Solo";
  public function __construct()
	{
		parent::__construct();
        $this->load->model('MTentang','mt');

		if (!$this->session->userdata('id')) {
            redirect('/');
		}
	}

	public function index()
	{
    $data = [
			'link' => 'tentang',
			'title' => 'Tentang'.$this->title,
            'fileScript' => 'tentang.js',
		];
		$this->load->view('main',$data);
	}

  public function dt_tentang()
	{
		echo $this->mt->dt_tentang();
	}

  // public function in_artikel()
  // {
  //   $msg = 'Gagal menambahkan data';
  //   $status = false;

  //   $judul = $this->input->post('judul');
  //   $deskripsi = $this->input->post('deskripsi');
  //   $gambar = $this->do_upload('gambar','./data/tentang/');
  
  //     $obj = [
  //         'judul_artikel' => $judul,
  //         'deskripsi' => $deskripsi,
  //         'gambar' => $gambar[1],
  //         'ctd_date' => date('Y-m-d H:i:s'),
  //         'status' => 1,
  //     ];

  //   $in = $this->mt->inTentang($obj);
  //       if ($in != '') {

  //           $status = true;
  //           $msg = "Berhasil menambahkan data";
      
  //   }else{
  //     $status = false;
  //     $msg = "Gagal menambahkan data";
  //   }

  //   $response = [
  //     'msg' => $msg,
  //     'status' => $status
  //   ];

  //   echo json_encode($response);
  // }

  public function getArtikel($id='')
  {
      $data = '';
      if (!empty($id)) {
          $q = $this->ma->getArtikel($id)->row();
      }else{
          $q = $this->ma->getArtikel()->result();
      }

      $data = [
    'data' => $q,
      ];

      echo json_encode($data);
	}


}
