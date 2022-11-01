<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MEvent extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'event';

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

    public function inEvent($obj='')
    {
        $q = $this->db->insert("event", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upEvent($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('event', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function delEvent($where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($where != '') {
            $q = $this->db->delete('event',$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success delete data";
                $status = 1;
            }else{
                $msg = "Failed delete data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_event($status='')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'event';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'judul_event'];
       // Set searchable column fields
       $CI->dt->column_search = ['judul_event'];
       // Set select column fields
       $CI->dt->select = '*';
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
               $dt->judul_event,
               $dt->deskripsi_event,
               $dt->lokasi,
               $dt->lat.','. $dt->lng,
               $dt->tgl_end != '0000-00-00' ? $dt->tgl_start.' s/d '. $dt->tgl_end : $dt->tgl_start,
               $dt->jam_end != '00:00:00' ? $dt->jam_start.' s/d '. $dt->jam_end : $dt->jam_start,
               $dt->status == "1" ? "Akan Datang" : ($dt->status == "2" ? "Sedang Berlangsung" : ($dt->status == "3" ? "Selesai" : "Batal")),
            //    '<img src="data/banner/'.$dt->image.'" style="width:100px;">',
                $this->make_link($dt->uploadedfile),
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

    function jumlah_data_event(){
      return $this->db->get('event')->num_rows();
    }
    function data_event($number,$offset){
      $this->db->select("judul_event,ev.id as id,deskripsi_event,ctd_date,lokasi,uploadedfile,tgl_start,jam_start");
      $this->db->order_by('id', 'desc');
      return $query = $this->db->get('event ev',$number,$offset)->result();		
    }

    private function make_link($links){
		$ret="";
		$alink=explode(";",$links);
		for($j=0;$j<count($alink);$j++){
			//$ret.='<a target="_blank" href="'.$alink[$j].'">Attachment '.($j+1).'</a>';
			if(trim($alink[$j])!=""){
				$ret.='<a href="javascript:void(0)" data-fancybox="" data-type="iframe" data-src="'.$alink[$j].'">Attachment '.($j+1).'</a><br />';
			}
		}
		return $ret;
	}

	function event_slider($number=4,$offset=0){
      $this->db->select("judul_event,ev.id as id,deskripsi_event,ctd_date,lokasi,uploadedfile,tgl_start,tgl_end");
      $this->db->order_by('id', 'desc');
      return $query = $this->db->get('event ev',$number,$offset)->result();		
    }
}
