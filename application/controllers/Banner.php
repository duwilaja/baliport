<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	private $title = " - Portal Smart City Solo";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('MBanner','mb');

		if (!$this->session->userdata('id')) {
            redirect('/');
		}
	}

	public function index()
	{
		$data = [
			'link' => 'banner',
			'title' => 'Banner'.$this->title,
            'fileScript' => 'banner.js',
		];
		$this->load->view('main',$data);
	}

    public function dt_banner()
	{
		echo $this->mb->dt_banner();
	}

	public function dt_vidbanner()
	{
		echo $this->mb->dt_vidbanner();
	}

    public function in_banner()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;

		$title = $this->input->post('title');
		$subtitle = $this->input->post('subtitle');
		$image = $this->do_upload('image','./data/banner/');
   
        $obj = [
            'title' => $title,
            'subtitle' => $subtitle,
            'image' => $image[1],
            'ctd_date' => date('Y-m-d H:i:s'),
            'status' => 1,
        ];

		$in = $this->mb->inBanner($obj);
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

	public function in_vidbanner()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;

		$judul = $this->input->post('judul');
		$nama = $this->input->post('nama');
		$tag = $this->input->post('tag');
		$deskripsi = $this->input->post('deskripsi');
		$link = $this->input->post('link');
		$thumbnail = $this->do_upload('thumbnail','./data/banner/');
   
        $obj = [
            'judul' => $judul,
            'nama' => $nama,
            'tag' => $tag,
            'deskripsi' => $deskripsi,
            'link_vid' => $link,
            'thumbnail' => $thumbnail[1],
            'ctd_date' => date('Y-m-d H:i:s'),
            'status' => 1,
        ];

		$in = $this->mb->inVidBanner($obj);
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

    public function getBanner($id='')
    {
        $data = '';
		$limit = $this->input->post('limit');
        if (!empty($id)) {
           $q = $this->mb->get($id)->row();
        }elseif(!empty($limit)){
            $q = $this->mb->get('',['status' => 1],'',$limit)->result();
        }else{
            $q = $this->mb->get()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

	public function getVidBanner($id='')
    {
        $data = '';
		$limit = $this->input->post('limit');
        if (!empty($id)) {
           $q = $this->mb->getVid($id)->row();
        }elseif(!empty($limit)){
            $q = $this->mb->getVid('',['status' => 1],'',$limit)->result();
        }else{
            $q = $this->mb->getVid()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_banner()
    {
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		$subtitle = $this->input->post('subtitle');
		$image = $this->do_upload('image','./data/banner/');

        // var_dump($gambar);die();
        
        if ($image[0] == 0) {
            $obj = [
                'title' => $title,
            	'subtitle' => $subtitle,
                'ctd_upd' => date('Y-m-d H:i:s'),
            ];
        } else {
            $obj = [
                'title' => $title,
            	'subtitle' => $subtitle,
                'image' => $image[1],
                'ctd_upd' => date('Y-m-d H:i:s'),
            ];
        }
		
		
		$up = $this->mb->upBanner($obj,['id' => $id]);
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

	public function up_vidbanner()
    {
		$idv = $this->input->post('idv');
		$judul = $this->input->post('judul');
		$nama = $this->input->post('nama');
		$tag = $this->input->post('tag');
		$deskripsi = $this->input->post('deskripsi');
		$link = $this->input->post('link');
		$thumbnail = $this->do_upload('thumbnail','./data/banner/');

        // var_dump($gambar);die();
        
        if ($thumbnail[0] == 0) {
            $obj = [
                'judul' => $judul,
				'nama' => $nama,
				'tag' => $tag,
				'deskripsi' => $deskripsi,
				 'link_vid' => $link,
                'ctd_upd' => date('Y-m-d H:i:s'),
            ];
        } else {
            $obj = [
                'judul' => $judul,
				'nama' => $nama,
				'tag' => $tag,
				'deskripsi' => $deskripsi,
				// 'link_vid' => $link,
                'thumbnail' => $thumbnail[1],
                'ctd_upd' => date('Y-m-d H:i:s'),
            ];
        }
		
		
		$up = $this->mb->upVidBanner($obj,['id' => $idv]);
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

		$x = $this->mb->upBanner($data,['id' => $id]);
		
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

	public function set_vidnonaktif($id)
	{
		$data = [
            'status' => 0
        ];

		$x = $this->mb->upVidBanner($data,['id' => $id]);
		
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

}
