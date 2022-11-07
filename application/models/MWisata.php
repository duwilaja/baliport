<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MWisata extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'wisata';

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

    public function getwisata($id='',$limit='',$in_ktg=[])
    {
            $this->db->select("judul_wisata,ar.id as id,deskripsi,kategori_id,kategori,gambar,ctd_date");
            $this->db->join('kategori_wisata k', 'k.id = ar.kategori_id', 'left');
            if ($id != '') {
                $this->db->where('ar.id', $id);
            }else if(count($in_ktg) > 0){
                $this->db->where_in('kategori_id',$in_ktg);
                $this->db->where('ar.status', 1);
                $this->db->limit($limit);
            }else if($limit != ''){
                $this->db->order_by('ar.id', 'desc');
                $this->db->where('ar.status', 1);
                $this->db->limit($limit);
            }else {
                $this->db->order_by('ar.id', 'desc');
                $this->db->where('ar.status', 1);
            }
            $ok = $this->db->get('wisata ar');
            return $ok;
    }

    public function getResentwisataPerhari()
    {
        $this->db->select("judul_wisata,ar.id as id,deskripsi,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_wisata k', 'k.id = ar.kategori_id', 'left');

            $this->db->order_by('ar.id', 'desc');
            $this->db->where('ar.status', 1);
            $this->db->where('ar.ctd_date <=', date('Y-m-d'));
            $this->db->limit(3);
        $ok = $this->db->get('wisata ar');
        return $ok;
    }

    public function inwisata($obj='')
    {
        $q = $this->db->insert("wisata", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upwisata($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('wisata', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_wisata($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'wisata ar';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'judul_wisata'];
       // Set searchable column fields
       $CI->dt->column_search = ['judul_wisata'];
       // Set select column fields
       $CI->dt->select = 'ar.id as id,judul_wisata,kategori,ctd_date,gambar';
       // Set default order
       
       $CI->dt->order = ['ar.id' => 'desc'];

       if ($status != '') {
           $con = ['where','ar.status',$status];
           array_push($condition,$con);
       }

       $con = ['join','kategori_wisata ka','ka.id = ar.kategori_id','left'];
       array_push($condition,$con);

       // Fetch member's records
       $dataTabel = $this->dt->getRows(@$_POST, $condition);

       $i = @$_POST['start'];
       foreach ($dataTabel as $dt) {
           $i++;
           $data[] = array(
               $i,
               $dt->judul_wisata,
               $dt->kategori,
               $dt->ctd_date,
               '<img src="data/wisata/'.$dt->gambar.'" style="width:100px;">',
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

    public function getKategori($id='',$limit='')
    {
            $this->db->select($this->see);
            if ($id != '') {
                $this->db->where('ka.id', $id);
            }else if($limit != ''){
                $this->db->order_by('ka.id', 'desc');
                $this->db->where('ka.status', 1);
                $this->db->limit(2);
            }else {
                $this->db->order_by('ka.id', 'desc');
                $this->db->where('ka.status', 1);
            }
            $ok = $this->db->get('kategori_wisata ka');
            return $ok;
    }

    public function inKategori($obj='')
    {
        $q = $this->db->insert("kategori_wisata", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upKategori($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('kategori_wisata', $obj,$where);
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
       $CI->dt->table = 'kategori_wisata ka';
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

    //    $con = ['join','kategori_wisata ka','ka.id = ar.kategori_id','left'];
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

    function data_berita($number,$offset,$katid){
		$where=array('ar.status' => 1);
		if($katid!='') $where=array('ar.status' => 1,'ar.kategori_id'=>$katid);
        $this->db->select("judul_wisata,ar.id as id,deskripsi,judul_wisata,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_wisata k', 'k.id = ar.kategori_id', 'left');
        $this->db->order_by('ar.id', 'desc');
		return $query = $this->db->get_where('wisata ar',$where,$number,$offset)->result();		
	}
 
	function jumlah_data_wisata($katid){
		$where=array('status' => 1);
		if($katid!='') $where=array('status' => 1,'kategori_id'=>$katid);
        return $this->db->get_where('wisata',$where)->num_rows();
	}
	
	 public function pies(){
                $this->db->select("kategori,count(kategori) as cc");
                $this->db->from("kategori_wisata");
                $this->db->join("wisata","wisata.kategori_id=kategori_wisata.id");
                $this->db->where(array("wisata.status"=>"1","kategori_wisata.status"=>"1"));
                $this->db->group_by("kategori");
                return $this->db->get()->result();
        }
		
	function berita_utama($number=4,$offset=0){
        $this->db->select("judul_wisata,ar.id as id,judul_wisata,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_wisata k', 'k.id = ar.kategori_id', 'left');
        $this->db->order_by('ar.id', 'desc');
		return $query = $this->db->get_where('wisata ar',['ar.status' => 1],$number,$offset)->result();		
	}
	
	function kategories(){
		$kategori=$this->db->get("kategori_wisata")->result();
		return $kategori;
	}
	
	function berita_homekat(){
		$maxberita=$this->db->select("kategori_id,max(id) as mid")->where("status","1")->group_by("kategori_id")->get("wisata")->result();
		$ids=array();
		foreach($maxberita as $mb){
			$ids[]=$mb->mid;
		}
		$this->db->select("judul_wisata,ar.id as id,judul_wisata,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_wisata k', 'k.id = ar.kategori_id', 'inner');
        $this->db->order_by('ar.id', 'desc');
		return $this->db->where_in("ar.id",$ids)->get("wisata ar")->result();
	}

}
