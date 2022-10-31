<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

	private $title = "Portal Smart City Solo";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('MPengaduan','mp');
        $this->load->model('MNotif','mn');
		
	}

	public function index()
	{
		$data = [
			'link' => 'pengaduan',
			'fileScript' => 'pengaduan.js',
			'title' => $this->title,
		];
		$this->load->view('main',$data);
	}

	public function dt_pengaduan()
	{
		echo $this->mp->dt_pengaduan();
	}

    public function in_pengaduan()
    {
		$msg = 'Gagal menambahkan data';
		$status = false;

		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$aduan = $this->input->post('aduan');
		$file = $this->do_upload('file','./data/pengaduan/');
   
        $obj = [
            'nama' => $nama,
            'email' => $email,
            'no_hp' => $no_hp,
            'aduan' => $aduan,
            'file' => $file[1],
            'ctd_date' => date('Y-m-d'),
			'ctd_time' => date('H:i:s'),
			'status' => 1
        ];

		$notif = [
			'info' => 'Pengaduan',
			'msg' => $aduan,
			'ctd_date' => date('Y-m-d H:i:s'),
			'status' => 0
		];

		$in = $this->mp->inPengaduan($obj);
        if ($in != '') {

            $status = true;
            $msg = "Berhasil mengirim aduan";
			$this->mn->inNotif($notif);
		}else{
			$status = false;
			$msg = "Gagal mengirim aduan";
		}

		$response = [
			'msg' => $msg,
			'status' => $status
		];

		echo json_encode($response);
    }

    public function getPengaduan($id='')
    {
        $data = '';
        if (!empty($id)) {
           $q = $this->mp->getPengaduan($id)->row();
        }else{
            $q = $this->mp->getPengaduan()->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_pengaduan()
    {
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$no_hp = $this->input->post('no_hp');
		$aduan = $this->input->post('aduan');
		$file = $this->do_upload('file','./data/pengaduan/');

        // var_dump($gambar);die();
        
        if ($gambar[0] == "int(0)") {
            $obj = [
                'nama' => $nama,
				'email' => $email,
				'no_hp' => $no_hp,
				'aduan' => $aduan,
				'ctd_date' => date('Y-m-d H:i:s'),
            ];
        } else {
            $obj = [
                'nama' => $nama,
				'email' => $email,
				'no_hp' => $no_hp,
				'aduan' => $aduan,
				'file' => $file[1],
				'ctd_date' => date('Y-m-d H:i:s'),
            ];
        }
		
		
		$up = $this->mp->upPengaduan($obj,['id' => $id]);
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

		$x = $this->mp->upPengaduan($data,['id' => $id]);
		
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
	
	public function notify(){
		$rs=$this->mp->notify();
		$data=array();
		foreach($rs as $row){
			$r=array();
			$r[]=$row->nama; $r[]=$this->kata($row->dur); $r[]=$row->id;
			$data[]=$r;
		}
		
		echo json_encode($data);
	}
	public function isi($id=0){
		$rs=$this->mp->isi($id);
		echo $rs[0]->aduan;
	}
	private function kata($sec){
		//$sec=3477;
		$day=floor($sec/(3600*24));
		$sec-=($day*3600*24);
		$hour=floor($sec/3600);
		$sec-=($hour*3600);
		$min=floor($sec/60);
		$sec-=($min*60);

		$ada=false;
		$return="";

		if($day>0){
			$return=$day." days ";
		}
		if($hour>0){
			$return=$return==""?$hour." hours ":$return;
		}
		if($min>=0){
			$return=$return==""?$min." minutes ":$return;
		}
		if($sec>0){
			$return=$return==""?$sec." seconds ":$return;
		}
		return $return." ago";
	}
}
