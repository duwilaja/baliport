<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MTentang extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'tentang';

    public function get($id='',$where='',$query='',$limit='',$start='')
    {
        $q = false;

        if ($id != '') {
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where($this->t, [$this->id => $id]);
        }elseif($limit != ''){
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
            $q = $this->db->get_where($this->t,$where,$limit,$start);
        }elseif ($where != '') {
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where($this->t, $where);
        }elseif ($query != '') {
            $q = $this->db->query($query);
        }else{
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get($this->t);
        }

        return $q;
    }

    public function dt_tentang($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'tentang';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'judul'];
       // Set searchable column fields
       $CI->dt->column_search = ['judul'];
       // Set select column fields
       $CI->dt->select = 'id,judul,deskripsi,gambar,status';
       // Set default order
       
       $CI->dt->order = ['id' => 'desc'];

       if ($status != '') {
           $con = ['where','status',$status];
           array_push($condition,$con);
       }

       // Fetch member's records
       $dataTabel = $this->dt->getRows(@$_POST, $condition);

       $i = @$_POST['start'];
       foreach ($dataTabel as $dt) {
           $i++;
           $data[] = array(
               $i,
               $dt->judul,
               $dt->deskripsi,
               '<img src="data/tentang/'.$dt->gambar.'" style="width:100px;">',
               '<a href="javascript:void(0)" class="btn btn-warning btn-sm" onClick="edit_modal('.$dt->id.')"><i class="fa fa-edit"></i></a>
               <a href="javascript:void(0)" class="btn btn-danger btn-sm" onClick="del_art('.$dt->id.')"><i class="fa fa-trash"></i></a>'
           );
       }

       $output = array(
           "draw" => @$_POST['draw'],
           "recordsTotal" => $this->dt->countAll($condition),
           "recordsFiltered" => $this->dt->countFiltered(@$_POST, $condition),
           "data" => $data,
       );

       // Output to JSON format
       return json_encode($output);
    }

    // public function getTentang($id='',$limit='')
    // {
    //   $this->db->select("judul,tg.id as id,deskripsi,gambar,ctd_date");
    //   if ($id != '') {
    //       $this->db->where('ar.id', $id);
    //   }
    //   $ok = $this->db->get('tentang tg');
    //   return $ok;
    // }

    public function inTentang($obj='')
    {
        $q = $this->db->insert("tentang", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upTentang($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('tentang', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }
	public function delTentang($where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($where != '') {
            $q = $this->db->delete('tentang',$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success delete data";
                $status = 1;
            }else{
                $msg = "Failed delete data";
            }
        }

        return [$msg,$status];
        
    }

    function jumlah_data(){
      return $this->db->get('tentang')->num_rows();
    }

    function data_tentang($number,$offset){
      $this->db->select("judul,tg.id as id,deskripsi,gambar,ctd_date");
      return $query = $this->db->get('tentang tg',$number,$offset)->result();		
    }
    function data_event_about(){
      $this->db->select("judul_event,ev.id as id,deskripsi_event,lokasi,uploadedfile,tgl_start,jam_start,ctd_date");
      return $query = $this->db->get('event ev')->result();		
    }
}
