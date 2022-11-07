<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {

	private $title = " - Portal Smart City Bali";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('MWisata','ma');

		if (!$this->session->userdata('id')) {
            redirect('/');
		}
	}

	public function index()
	{
		$data = [
			'link' => 'wisata',
			'title' => 'wisata'.$this->title,
            'fileScript' => 'wisata.js',
		];
		$this->load->view('main',$data);
	}

    public function dt_wisata()
	{
		echo $this->ma->dt_wisata();
	}

    public function in_wisata()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;

		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $this->do_upload('gambar','./data/wisata/');
   
        $obj = [
            'judul_wisata' => $judul,
            'kategori_id' => $kategori,
            'deskripsi' => $deskripsi,
            'gambar' => $gambar[1],
            'ctd_date' => date('Y-m-d H:i:s'),
            'status' => 1,
        ];

		$in = $this->ma->inwisata($obj);
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

    public function getwisata($id='')
    {
        $data = '';
        if (!empty($id)) {
           $q = $this->ma->getwisata($id)->row();
        }else{
            $q = $this->ma->getwisata()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_wisata()
    {
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');
		$deskripsi = $this->input->post('deskripsi');
        $gambar = $this->do_upload('gambar','./data/wisata/');

        // var_dump($gambar);die();
        
        if ($gambar[0] == 0) {
            $obj = [
                'judul_wisata' => $judul,
                'kategori_id' => $kategori,
                'deskripsi' => $deskripsi,
                'ctd_upd' => date('Y-m-d H:i:s'),
            ];
        } else {
            $obj = [
                'judul_wisata' => $judul,
                'kategori_id' => $kategori,
                'deskripsi' => $deskripsi,
                'gambar' => $gambar[1],
                'ctd_upd' => date('Y-m-d H:i:s'),
            ];
        }
		
		
		$up = $this->ma->upwisata($obj,['id' => $id]);
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

		$x = $this->ma->upwisata($data,['id' => $id]);
		
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

    public function do_upload($name='',$path='')
    {
            $this->load->library('upload');
            
            $d = '';
            $s = 0;
            $msg = '';

            $config['upload_path']          = $path;
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload($name)){
                $msg = $this->upload->display_errors();
            }else{
                $d = $this->upload->data()['file_name'];
                $s = 1;
            }

            return [$s,$d,$msg,$this->upload->data(),$config];
    } 

    public function kategori()
	{
		$data = [
			'link' => 'kategori',
			'title' => 'Kategori'.$this->title,
            'fileScript' => 'kategori.js',
		];
		$this->load->view('main',$data);
	}

    public function dt_kategori()
	{
		echo $this->ma->dt_kategori();
	}

    public function in_kategori()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;

		$kategori = $this->input->post('kategori');
   
        $obj = [
            'kategori' => $kategori,
            'status' => 1,
        ];

		$in = $this->ma->inKategori($obj);
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

    public function getKategori($id='')
    {
        $data = '';
        if (!empty($id)) {
            $this->ma->see = "id,kategori";
           $q = $this->ma->getKategori($id)->row();
        }else{
            $this->ma->see = "id,kategori";
            $q = $this->ma->getKategori()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_kategori()
    {
		$id = $this->input->post('id');
		$kategori = $this->input->post('kategori');
            $obj = [
                'kategori' => $kategori,
            ];
		
		
		$up = $this->ma->upKategori($obj,['id' => $id]);
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

    public function set_nonaktif_kategori($id)
	{
		$data = [
            'status' => 0
        ];

		$x = $this->ma->upKategori($data,['id' => $id]);
		
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
