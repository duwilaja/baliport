<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

  private $title = " - Portal Smart City Bali";
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

  public function in_tentang()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;
        $ktg = '';

		$nama_tentang = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
        //$kategori_ar_id = $this->input->post('kategori_ar_id');
        //foreach ($kategori_ar_id as $key => $v) {
        //    $ktg .= $v.',';
        //}
		$gambar = $this->do_upload('image','./data/tentang/');
   
        $obj = [
            'judul' => $nama_tentang,
            'deskripsi' => $deskripsi,
            //'kategori_ar_id' => $ktg,
            'gambar' => $gambar[1],
            'ctd_date' => date('Y-m-d H:i:s'),
			'status'=>'1'
        ];

		$in = $this->mt->intentang($obj);
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

    public function getTentang($id='')
    {
        $data = '';
		$limit = $this->input->post('limit');
		$status = $this->input->post('status');
        if (!empty($id)) {
           $q = $this->mt->get($id)->row();
        }elseif(!empty($limit)){
            $q = $this->mt->get('',['status' => 1],'',$limit)->result();
        }elseif(!empty($status)){
            $q = $this->mt->get('',['status' => $status])->result();
        }else{
            $q = $this->mt->get()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_tentang()
    {
        $ktg= '';
		$id = $this->input->post('id');
		$nama_tentang = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
        //$kategori_ar_id = $this->input->post('kategori_ar_id');
        //foreach ($kategori_ar_id as $key => $v) {
        //    $ktg .= $v.',';
        //}
		$gambar = $this->do_upload('image','./data/tentang/');

        // var_dump($gambar);die();
        
        if ($gambar[0] == 0) {
            $obj = [
                'judul' => $nama_tentang,
				'deskripsi' => $deskripsi,
                //'kategori_ar_id' => $ktg,
                'ctd_up' => date('Y-m-d H:i:s'),
            ];
        } else {
            $obj = [
                'judul' => $nama_tentang,
				'deskripsi' => $deskripsi,
                //'kategori_ar_id' => $ktg,
				'gambar' => $gambar[1],
                'ctd_up' => date('Y-m-d H:i:s'),
            ];
        }
		
		
		$up = $this->mt->upTentang($obj,['id' => $id]);
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

    public function del_tentang($id)
	{

		$x = $this->mt->delTentang(['id' => $id]);
		
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
