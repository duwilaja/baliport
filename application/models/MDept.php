<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDept extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'departemen';

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

    public function inDept($obj='')
    {
        $q = $this->db->insert("departemen", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upDept($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('departemen', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function delDept($where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($where != '') {
            $q = $this->db->delete('departemen',$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success delete data";
                $status = 1;
            }else{
                $msg = "Failed delete data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_dept()
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'departemen';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'nama_departemen'];
       // Set searchable column fields
       $CI->dt->column_search = ['nama_departemen'];
       // Set select column fields
       $CI->dt->select = '*';
       // Set default order
       
       $CI->dt->order = ['id' => 'desc'];

       // Fetch member's records
       $dataTabel = $this->dt->getRows(@$_POST, $condition);

       $i = @$_POST['start'];
       foreach ($dataTabel as $dt) {
           $i++;
           $data[] = array(
               $i,
               $dt->nama_departemen,
               $dt->deskripsi_dept,
               $this->kateg_ar($dt->kategori_ar_id),
               $dt->ctd_date,
               '<img src="data/dept/'.$dt->image.'" style="width:100px;">',
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

    public function kateg_ar($id="")
    {
        $ret = '';
        $id_x = explode(',', $id);
        $q = $this->getKategori('','',$id_x)->result();
        for($j=0;$j<count($q);$j++){
			if(trim($id_x[$j])!=""){
				$ret.=$q[$j]->kategori.', ';
            }
        }
        return $ret;
    }

    public function getKategori($id='',$limit='',$where_in=[])
    {
            $this->db->select($this->see);
            if ($id != '') {
                $this->db->where('ka.status', 1);
                $this->db->where('ka.id', $id);
            }else if($limit != ''){
                $this->db->order_by('ka.id', 'desc');
                $this->db->where('ka.status', 1);
                $this->db->limit(2);
            }else if(count($where_in) > 0){
                $this->db->where('ka.status', 1);
                $this->db->where_in('id',$where_in);
            }else {
                $this->db->order_by('ka.id', 'desc');
                $this->db->where('ka.status', 1);
            }
            $ok = $this->db->get('kategori_artikel ka');
            return $ok;
    }

    public function inKategori($obj='')
    {
        $q = $this->db->insert("kategori_artikel", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upKategori($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('kategori_artikel', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_kategori($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'kategori_artikel ka';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'kategori'];
       // Set searchable column fields
       $CI->dt->column_search = ['kategori'];
       // Set select column fields
       $CI->dt->select = 'ka.id as id,kategori';
       // Set default order
       
       $CI->dt->order = ['ka.id' => 'desc'];

       if ($status != '') {
           $con = ['where','ka.status',$status];
           array_push($condition,$con);
       }

    //    $con = ['join','kategori_artikel ka','ka.id = ar.kategori_id','left'];
    //    array_push($condition,$con);

       // Fetch member's records
       $dataTabel = $this->dt->getRows(@$_POST, $condition);

       $i = @$_POST['start'];
       foreach ($dataTabel as $dt) {
           $i++;
           $data[] = array(
               $i,
               $dt->kategori,
               '<a href="javascript:void(0)" class="btn btn-warning btn-sm" onClick="edit_modal('.$dt->id.')"><i class="fa fa-edit"></i></a>
               <a href="javascript:void(0)" class="btn btn-danger btn-sm" onClick="del_kat('.$dt->id.')"><i class="fa fa-trash"></i></a>'
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

    function data_berita($number,$offset){
        $this->db->select("judul_artikel,ar.id as id,deskripsi,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_artikel k', 'k.id = ar.kategori_id', 'left');
		return $query = $this->db->get_where('artikel ar',['ar.status' => 1],$number,$offset)->result();		
	}
 
	function jumlah_data_berita(){
		return $this->db->get_where('artikel',['status' => 1])->num_rows();
	}
}
