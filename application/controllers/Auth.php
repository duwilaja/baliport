<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('MUsers','mu');
    // $this->load->model('MLokasi','ml');
  }
  
  public function login()
  {
    if ($this->session->userdata('id') != '') {
      redirect('Dashboard','refresh');
    }

    $data = [
      'title' => 'Login to Portal Smart City Solo',
    ];
    $this->load->view('page/auth/login',$data);
  }
  
  public function proses_login()
  {   
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $arr = ['username' => $username,'password' => md5($password),'level !=' => '','u.status' => '1'];
    $q = $this->mu->get_login($arr);
    if ($q->num_rows() > 0) {
      $u = $q->row();
      $array = array(
        'id' => $u->id,
        'nama' => $u->nama,
        'info_usr_id' => $u->info_usr_id,
        'level' => $u->level,
        'lokasi_id' => $u->lokasi_id,
        'email' => $u->email
      );
      
      $this->session->set_userdata( $array );
    //   if ($u->info_usr_id == '' || $u->info_usr_id == '0') {
    //     redirect('Setting/profile');
    //   }
      redirect('Dashboard');
    }else{
      $this->session->set_flashdata('gagal', 'Username atau Password salah. mohon cek kembali username dan password yang anda masukan.');
      redirect('/');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    $this->session->unset_userdata('id');
    redirect('/');
  }
  
  
}