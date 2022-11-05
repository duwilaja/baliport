<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MArtikel extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'artikel';

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

    public function getArtikel($id='',$limit='',$in_ktg=[])
    {
            $this->db->select("judul_artikel,ar.id as id,deskripsi,kategori_id,kategori,gambar,ctd_date");
            $this->db->join('kategori_artikel k', 'k.id = ar.kategori_id', 'left');
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
            $ok = $this->db->get('artikel ar');
            return $ok;
    }

    public function getResentArtikelPerhari()
    {
        $this->db->select("judul_artikel,ar.id as id,deskripsi,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_artikel k', 'k.id = ar.kategori_id', 'left');

            $this->db->order_by('ar.id', 'desc');
            $this->db->where('ar.status', 1);
            $this->db->where('ar.ctd_date <=', date('Y-m-d'));
            $this->db->limit(3);
        $ok = $this->db->get('artikel ar');
        return $ok;
    }

    public function inArtikel($obj='')
    {
        $q = $this->db->insert("artikel", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upArtikel($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('artikel', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_artikel($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'artikel ar';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'judul_artikel'];
       // Set searchable column fields
       $CI->dt->column_search = ['judul_artikel'];
       // Set select column fields
       $CI->dt->select = 'ar.id as id,judul_artikel,kategori,ctd_date,gambar';
       // Set default order
       
       $CI->dt->order = ['ar.id' => 'desc'];

       if ($status != '') {
           $con = ['where','ar.status',$status];
           array_push($condition,$con);
       }

       $con = ['join','kategori_artikel ka','ka.id = ar.kategori_id','left'];
       array_push($condition,$con);

       // Fetch member's records
       $dataTabel = $this->dt->getRows(@$_POST, $condition);

       $i = @$_POST['start'];
       foreach ($dataTabel as $dt) {
           $i++;
           $data[] = array(
               $i,
               $dt->judul_artikel,
               $dt->kategori,
               $dt->ctd_date,
               '<img src="data/artikel/'.$dt->gambar.'" style="width:100px;">',
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

    function data_berita($number,$offset,$katid){
		$where=array('ar.status' => 1);
		if($katid!='') $where=array('ar.status' => 1,'ar.kategori_id'=>$katid);
        $this->db->select("judul_artikel,ar.id as id,deskripsi,judul_artikel,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_artikel k', 'k.id = ar.kategori_id', 'left');
        $this->db->order_by('ar.id', 'desc');
		return $query = $this->db->get_where('artikel ar',$where,$number,$offset)->result();		
	}
 
	function jumlah_data_berita($katid){
		$where=array('status' => 1);
		if($katid!='') $where=array('status' => 1,'kategori_id'=>$katid);
        return $this->db->get_where('artikel',$where)->num_rows();
	}
	
	 public function pies(){
                $this->db->select("kategori,count(kategori) as cc");
                $this->db->from("kategori_artikel");
                $this->db->join("artikel","artikel.kategori_id=kategori_artikel.id");
                $this->db->where(array("artikel.status"=>"1","kategori_artikel.status"=>"1"));
                $this->db->group_by("kategori");
                return $this->db->get()->result();
        }
		
	function berita_utama($number=4,$offset=0){
        $this->db->select("judul_artikel,ar.id as id,judul_artikel,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_artikel k', 'k.id = ar.kategori_id', 'left');
        $this->db->order_by('ar.id', 'desc');
		return $query = $this->db->get_where('artikel ar',['ar.status' => 1],$number,$offset)->result();		
	}
	
	function kategories(){
		$kategori=$this->db->get("kategori_artikel")->result();
		return $kategori;
	}
	
	function berita_homekat(){
		$maxberita=$this->db->select("kategori_id,max(id) as mid")->where("status","1")->group_by("kategori_id")->get("artikel")->result();
		$ids=array();
		foreach($maxberita as $mb){
			$ids[]=$mb->mid;
		}
		$this->db->select("judul_artikel,ar.id as id,judul_artikel,kategori_id,kategori,gambar,ctd_date");
        $this->db->join('kategori_artikel k', 'k.id = ar.kategori_id', 'left');
        $this->db->order_by('ar.id', 'desc');
		return $this->db->where_in("ar.id",$ids)->get("artikel ar")->result();
	}

}
