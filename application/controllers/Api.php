<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MBanner','mb');
        $this->load->model('MArtikel','ma');
        $this->load->model('MDept','md');
        $this->load->model('MEvent','me');
    }

    private function token()
    {
        $token = @getallheaders()['token'];

        if (!$token) {
            # jika array kosong, dia akan melempar objek Exception baru
            throw new Exception('Header Token tidak terdeteksi');
        }

        return $token;
    }

    private function header($method = "POST")
    {
        header("Content-Type: application/json; charset=UTF-8");
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: " . $method);
        header("Access-Control-Allow-Headers: Content-Type, Token");

        return true;
    }

    private function cek_token()
    {
        $bool = false;
        $q = $this->db->get_where('token', ['token' => $this->token(), 'aktif' => 1]);
        if ($q->num_rows() > 0)
            $bool = true;

        return $bool;
    }

    // Banner
    public function banner()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $status = false;
            $statusCode = 410;
            $msg = "Gagal mengambil data banner";

                try {
                    if ($this->cek_token()) {
                        $limit = $this->input->post('limit');
                        $id = $this->input->post('id');

                        if (!empty($id)) {
                        $q = $this->mb->get($id)->row();
                        }elseif(!empty($limit)){
                            $q = $this->mb->get('',['status' => 1],'',$limit)->result();
                        }else{
                            $q = $this->mb->get()->result();
                        }

                        $data = $q;
                        $msg = "Berhasil mengambil data banner";
                        $statusCode= 200;
                        $status = true;
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];

            echo json_encode($arr);
        }
    }

    public function subBanner()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $status = false;
            $statusCode = 410;
            $msg = "Gagal mengambil data sub banner";

                try {
                    if ($this->cek_token()) {
                        $limit = $this->input->post('limit');
                        $id = $this->input->post('id');

                        if (!empty($id)) {
                        $q = $this->mb->getVid($id)->row();
                        }elseif(!empty($limit)){
                            $q = $this->mb->getVid('',['status' => 1],'',$limit)->result();
                        }else{
                            $q = $this->mb->getVid()->result();
                        }

                        $data = $q;
                        $msg = "Berhasil mengambil data sub banner";
                        $statusCode= 200;
                        $status = true;
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];

            echo json_encode($arr);
        }
    }

    public function berita()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $status = false;
            $statusCode = 410;
            $msg = "Gagal mengambil data berita";

                try {
                    if ($this->cek_token()) {
                        $id = $this->input->post('id');

                        if (!empty($id)) {
                            $q = $this->ma->getArtikel($id)->row();
                            $q->gambar = base_url('data/artikel/'.$q->gambar);
                         }else{
                             $q = $this->ma->getArtikel()->result();
                             foreach ($q as $k => $v) {
                                 $q[$k] = $v;
                                 $q[$k]->gambar = base_url('data/artikel/'.$v->gambar);
                             }
                            }


                        $data = $q;
                        $msg = "Berhasil mengambil data berita";
                        $statusCode= 200;
                        $status = true;
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];

            echo json_encode($arr);
        }
    }

    public function beritaKategori()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $status = false;
            $statusCode = 410;
            $msg = "Gagal mengambil data kategori berita";

                try {
                    if ($this->cek_token()) {
                        $id = $this->input->post('id');

                        if (!empty($id)) {
                            $this->ma->see = "id,kategori";
                           $q = $this->ma->getKategori($id)->row();
                        }else{
                            $this->ma->see = "id,kategori";
                            $q = $this->ma->getKategori()->result();
                        }

                        $data = $q;
                        $msg = "Berhasil mengambil data kategori berita";
                        $statusCode= 200;
                        $status = true;
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];

            echo json_encode($arr);
        }
    }

    public function dept()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $status = false;
            $statusCode = 410;
            $msg = "Gagal mengambil data sub bannerdepartemen";

                try {
                    if ($this->cek_token()) {
                        $id = $this->input->post('id');
                        $limit = $this->input->post('limit');
                        if (!empty($id)) {
                        $q = $this->md->get($id)->row();
                        }elseif(!empty($limit)){
                            $q = $this->md->get('','','',$limit)->result();
                        }else{
                            $q = $this->md->get()->result();
                        }

                        $data = $q;
                        $msg = "Berhasil mengambil data departemen";
                        $statusCode= 200;
                        $status = true;
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];

            echo json_encode($arr);
        }
    }

    public function event()
    {
        $this->header();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            $status = false;
            $statusCode = 410;
            $msg = "Gagal mengambil data event";

                try {
                    if ($this->cek_token()) {
                        $id = $this->input->post('id');
                        $limit = $this->input->post('limit');
                        $status = $this->input->post('status');
                        if (!empty($id)) {
                        $q = $this->me->get($id)->row();
                        }elseif(!empty($limit)){
                            $q = $this->me->get('',['status' => 1],'',$limit)->result();
                        }elseif(!empty($status)){
                            if ($status == 1) {
                                $q = $this->me->get('',['status' => 1, 'tgl_start >' => date('Y-m-d')])->result();
                            }else if($status == 2){
                                $q = $this->me->get('',['status' => 2, 'tgl_start =' => date('Y-m-d')])->result();
                            }else if ($status == 3) {
                                $q = $this->me->get('',['status' => 3, 'tgl_start <' => date('Y-m-d')])->result();
                            }
                        }else{
                            $q = $this->me->get()->result();
                        }

                        $data = $q;
                        $msg = "Berhasil mengambil data event";
                        $statusCode= 200;
                        $status = true;
                    }
                } catch (Exception $error) {
                    $statusCode = 417;
                    $msg = $error->getMessage();
                }

            $arr = [
                'data' => $data,
                'msg' => $msg,
                'statusCode' => $statusCode,
                'status' => $status
            ];

            echo json_encode($arr);
        }
    }

}
