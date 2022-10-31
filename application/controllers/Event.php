<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	private $title = " - Portal Smart City Solo";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('MEvent','me');

		if (!$this->session->userdata('id')) {
            redirect('/');
		}
	}

	public function index()
	{
		$data = [
			'link' => 'event',
			'title' => 'Event'.$this->title,
            'fileScript' => 'event.js',
		];
		$this->load->view('main',$data);
	}

    public function dt_event()
	{
		echo $this->me->dt_event();
	}

	private function uplots($fld,$path){
		$ret=array();
		// Count total files
        $countfiles = count($_FILES[$fld]['name']);
		// Looping all files
        for($i=0;$i<$countfiles;$i++){
			if(!empty($_FILES[$fld]['name'][$i])){
				// Define new $_FILES array - $_FILES['file']
				  $_FILES['file']['name'] = $_FILES[$fld]['name'][$i];
				  $_FILES['file']['type'] = $_FILES[$fld]['type'][$i];
				  $_FILES['file']['tmp_name'] = $_FILES[$fld]['tmp_name'][$i];
				  $_FILES['file']['error'] = $_FILES[$fld]['error'][$i];
				  $_FILES['file']['size'] = $_FILES[$fld]['size'][$i];
				
				if ( $this->upload->do_upload('file')){
						$ret[]= $path.$this->upload->data('file_name');
					}
			}
		}
		
		return implode(";",$ret);
	}

    public function in_event()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;

		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$lokasi = $this->input->post('lokasi');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$tgl_start = $this->input->post('tgl_start');
		$tgl_end = $this->input->post('tgl_end');
		$jam_start = $this->input->post('jam_start');
		$jam_end = $this->input->post('jam_end');
		$status = $this->input->post('status');

		$path="./data/event/";
		$config['upload_path'] = $path;
		$config['allowed_types'] = '*';//'gif|jpg|jpeg|png';//all
		$config['file_ext_tolower'] = true;
		//$config['overwrite'] = false;
		$this->load->library('upload', $config);

		$image = $this->uplots('uploadedfile',$path);
   
        $obj = [
            'judul_event' => $judul,
            'deskripsi_event' => $deskripsi,
			'lokasi' => $lokasi,
			'lat' => $lat,
			'lng' => $lng,
			'tgl_start' => $tgl_start,
			'tgl_end' => $tgl_end,
			'jam_start' => $jam_start,
			'jam_end' => $jam_end,
			'status' => $status,
            'uploadedfile' => $image,
            'ctd_date' => date('Y-m-d H:i:s'),
        ];

		// print_r($obj);
		// die();

		$in = $this->me->inEvent($obj);

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

    public function getEvent($id='')
    {
        $data = '';
		$limit = $this->input->post('limit');
		$status = $this->input->post('status');
        if (!empty($id)) {
           $q = $this->me->get($id)->row();
        }elseif(!empty($limit)){
            $q = $this->me->get('',['status' => 1],'',$limit)->result();
        }elseif(!empty($status)){
            $q = $this->me->get('',['status' => $status])->result();
        }else{
            $q = $this->me->get()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_event()
    {
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$lokasi = $this->input->post('lokasi');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$tgl_start = $this->input->post('tgl_start');
		$tgl_end = $this->input->post('tgl_end');
		$jam_start = $this->input->post('jam_start');
		$jam_end = $this->input->post('jam_end');
		$status = $this->input->post('status');

		$path="./data/event/";
		$config['upload_path'] = $path;
		$config['allowed_types'] = '*';//'gif|jpg|jpeg|png';//all
		$config['file_ext_tolower'] = true;
		//$config['overwrite'] = false;
		$this->load->library('upload', $config);

		$image = $this->uplots('uploadedfile',$path);

		$obj = [
			'judul_event' => $judul,
			'deskripsi_event' => $deskripsi,
			'lokasi' => $lokasi,
			'lat' => $lat,
			'lng' => $lng,
			'tgl_start' => $tgl_start,
			'tgl_end' => $tgl_end,
			'jam_start' => $jam_start,
			'jam_end' => $jam_end,
			'status' => $status,
			'uploadedfile' => $image,
			'ctd_upd' => date('Y-m-d H:i:s'),
		];
		
		
		$up = $this->me->upEvent($obj,['id' => $id]);
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

    public function del_event($id)
	{

		$x = $this->me->delEvent(['id' => $id]);
		
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
