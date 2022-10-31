<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUsers extends CI_Model {

    private $t = 'users';
    public $see = '*';
    private $id = 'idu';

    public function get_arr($arr=[])
    {
        if (isset($arr)) {
            $q = $this->db->get_where($this->t, $arr);
        }

        return $q;
    }

    public function get_login($arr=[])
    {
        $this->db->select('username,level,password,u.email,nama,u.id,u.info_usr_id');
        $this->db->join('info_user iu', 'iu.id = u.info_usr_id', 'left');
        $q = $this->db->get_where($this->t.' u', $arr);
        return $q;
    }

    public function get($id='',$where='',$query='',$limit='',$start='')
    {
        $q = false;

        if ($id != '') {
            $this->db->order_by('rowid', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where($this->t, [$this->id => $id]);
        }elseif ($where != '') {
            $this->db->order_by('rowid', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where($this->t, $where);
        }elseif ($query != '') {
            $q = $this->db->query($query);
        }elseif($limit != ''){
            $this->db->order_by('rowid', 'desc');
            $this->db->select($this->see);
            $q = $this->db->get_where($this->t,$where,$limit,$start);
        }else{
            $this->db->order_by('rowid', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get($this->t);
        }

        return $q;
    }

    public function up($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = false ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update($this->t, $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = true;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

     public function in($obj='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = false ;
        $id = 0;

        if ($obj != '') {
            $q = $this->db->insert($this->t, $obj);
            $id = $this->db->insert_id();
            if ($this->db->affected_rows() > 0) {
                $msg = "Success insert data to Users";
                $status = true;
            }else{
                $msg = "Failed insert data";
            }
        }

        return [$msg,$status,$id];
        
    }
    
    // Info User

    public function in_info_usr($obj='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = false ;
        $id = 0;

        if ($obj != '') {
            $q = $this->db->insert('tbl_info_usr', $obj);
            $id = $this->db->insert_id();
            if ($this->db->affected_rows() > 0) {
                $msg = "Success insert data to Users";
                $status = true;
            }else{
                $msg = "Failed insert data";
            }
        }

        return [$msg,$status,$id];
    }

    public function up_info_usr($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = false;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('tbl_info_usr', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = true;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
    }

    public function dt_users()
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t. ' as u';
         // Set orderable column fields
         $CI->dt->column_order = ['u.lokasi_id','iu.nama','lk.nama_lokasi','u.status', 'total_file' , 'total_kompresi'];
         // Set searchable column fields
         $CI->dt->column_search = ['iu.nama','lk.nama_lokasi'];
         // Set select column fields
         $CI->dt->select = 'u.rowid as id,iu.nama as nama, u.status as status , lk.nama_lokasi as lokasi, count(uf.rowid) as total_file , sum(uf.after_size) as total_kompresi';
         // Set default order
         $CI->dt->order = ['u.rowid' => 'desc'];
    
        $cons = ['join','tbl_lokasi as lk',' lk.rowid=u.lokasi_id','left'];
        array_push($condition,$cons);

        $cons = ['join','tbl_info_usr as iu',' iu.rowid=u.info_usr_id','left'];
        array_push($condition,$cons);

        $cons = ['join','tbl_upload_file as uf',' uf.user_id=u.rowid','left'];
        array_push($condition,$cons);
        $this->db->group_by('u.rowid');
        $this->db->where('u.status',1);
         
        
        // Fetch member's records
        $dataTabel = $this->dt->getRows($_POST, $condition);
        $q = $this->db->query($this->db->last_query())->num_rows();
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $dt->nama,
                 $dt->lokasi,
                 $a = ($dt->status == 1) ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>',
                 $dt->total_file,
                 $b = ($dt->total_kompresi == null) ? '0' : formatBytes((float)$dt->total_kompresi),
                 $c = ($this->session->userdata("level") == 3) ? '<a class="btn btn-warning btn-sm text-white" onclick="edit('.$dt->id.')"><i class="mdi mdi-pencil"></i></a> <a class="btn btn-danger btn-sm text-white" onclick="del('.$dt->id.')"><i class="mdi mdi-delete"></i></a>' : ''
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $q,
             "recordsFiltered" => $q,
            //  "recordsTotal" => $this->dt->countAll($condition),
            //  "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    } 

    public function dt_locusers()
    {
         // Definisi
         $condition = [];
         $data = [];
         
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         
         // Set table name
         $CI->dt->table = $this->t. ' as u';
         // Set orderable column fields
         $CI->dt->column_order = ['u.lokasi_id','iu.nama','lk.nama_lokasi','u.status', 'total_file' , 'total_kompresi'];
         // Set searchable column fields
         $CI->dt->column_search = ['iu.nama','lk.nama_lokasi'];
         // Set select column fields
         $CI->dt->select = 'iu.nama as nama, u.status as status , lk.nama_lokasi as lokasi, count(uf.rowid) as total_file , sum(uf.after_size) as total_kompresi';
         // Set default order
         $CI->dt->order = ['u.rowid' => 'desc'];
    
        $cons = ['join','tbl_lokasi as lk',' lk.rowid=u.lokasi_id','left'];
        array_push($condition,$cons);

        $cons = ['join','tbl_info_usr as iu',' iu.rowid=u.info_usr_id','left'];
        array_push($condition,$cons);

        $cons = ['join','tbl_upload_file as uf',' uf.user_id=u.rowid','left'];
        array_push($condition,$cons);
        $this->db->group_by('uf.user_id');
        $this->db->where('uf.lokasi_id', $this->session->userdata('lokasi_id'));
        $this->db->where('u.status',1);
         
        
        // Fetch member's records
        $dataTabel = $this->dt->getRows($_POST, $condition);
        $q = $this->db->query($this->db->last_query())->num_rows();
         $i = $this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $dt->nama,
                 $dt->lokasi,
                 $a = ($dt->status == 1) ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>',
                 $dt->total_file,
                 $b = ($dt->total_kompresi == null) ? '0' : formatBytes((float)$dt->total_kompresi)
             );
         }
         
         $output = array(
             "draw" =>  $this->input->post('draw'),
             "recordsTotal" => $q,
             "recordsFiltered" => $q,
            //  "recordsTotal" => $this->dt->countAll($condition),
            //  "recordsFiltered" => $this->dt->countFiltered($_POST, $condition),
             "data" => $data,
         );
         
         // Output to JSON format
         return json_encode($output);
    } 
}
