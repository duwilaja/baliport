<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPengaduan extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'pengaduan';

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

    public function getPengaduan($id='',$limit='')
    {
            $this->db->select($this->see);
            if ($id != '') {
                $this->db->where('id', $id);
            }else if($limit != ''){
                $this->db->order_by('id', 'desc');
                $this->db->where('status', 1);
                $this->db->limit($limit);
            }else {
                $this->db->order_by('id', 'desc');
                $this->db->where('status', 1);
            }
            $ok = $this->db->get('pengaduan');
            return $ok;
    }

    public function inPengaduan($obj='')
    {
        $q = $this->db->insert("pengaduan", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upPengaduan($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('pengaduan', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_pengaduan($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'pengaduan p';
       // Set orderable column fields
       $CI->dt->column_order = [null, null, null, null, 'ctd_date','ctd_time'];
       // Set searchable column fields
       $CI->dt->column_search = ['nama','email','no_hp','ctd_date', 'ctd_time'];
       // Set select column fields
       $CI->dt->select = 'p.id as id,nama,email,no_hp,aduan,ctd_date,ctd_time,file';
       // Set default order
       
       $CI->dt->order = ['p.id' => 'desc'];

       if ($status != '') {
           $con = ['where','p.status',$status];
           array_push($condition,$con);
       }

       // Fetch member's records
       $dataTabel = $this->dt->getRows(@$_POST, $condition);

       $i = @$_POST['start'];
       foreach ($dataTabel as $dt) {
           $i++;
           $data[] = array(
               $i,
               $dt->nama,
               $dt->email,
               $dt->no_hp,
               $dt->ctd_date,
               $dt->ctd_time,
               '<img src="data/pengaduan/'.$dt->file.'" style="width:100px;">',
               '<a href="javascript:void(0)" class="btn btn-danger btn-sm" onClick="del_pen('.$dt->id.')"><i class="fa fa-trash"></i></a>'
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
