<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MYanrat extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'layanan_darurat';

    public function get($id='',$where='',$query='',$limit='',$start='')
    {
        $q = false;

        if ($id != '') {
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where($this->t, [$this->id => $id]);
        }elseif ($where != '') {
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where($this->t, $where);
        }elseif ($query != '') {
            $q = $this->db->query($query);
        }elseif($limit != ''){
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
            $q = $this->db->get_where($this->t,$where,$limit,$start);
        }else{
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get($this->t);
        }

        return $q;
    }

    public function inYanrat($obj='')
    {
        $q = $this->db->insert($this->t, $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upYanrat($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update($this->t, $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_yanrat($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = $this->t;
       // Set orderable column fields
       $CI->dt->column_order = [null];
       // Set searchable column fields
       $CI->dt->column_search = [];
       // Set select column fields
       $CI->dt->select = $this->see;
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
               $dt->nama_layanan,
               $dt->nomor_layanan,
               $dt->alamat_layanan,
               '<a href="javascript:void(0)" class="btn btn-warning btn-sm" onClick="edit_modal('.$dt->id.')"><i class="fa fa-edit"></i></a>
               <a href="javascript:void(0)" class="btn btn-danger btn-sm" onClick="del_yanrat('.$dt->id.')"><i class="fa fa-trash"></i></a>'
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

}
