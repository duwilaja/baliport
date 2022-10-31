<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {

	private $title = "Portal Smart City Solo";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('MNotif','mn');
		
	}

    public function getNotif($id='')
    {
        $data = '';
        if (!empty($id)) {
           $q = $this->mn->getNotif($id)->row();
        }else{
            $q = $this->mn->getNotif('',5)->result();
        }

        $data = [
			'data' => $q,
        ];

        echo json_encode($data);
	}

    public function up_notif()
    {
		$id = $this->input->post('id');
		$obj = [
			'status' => 1
		];
		
		$up = $this->mn->upNotif($obj,['id' => $id]);
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
}
