<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MBanner extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'banner';

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

    public function getVid($id='',$where='',$query='',$limit='',$start='')
    {
        $q = false;

        if ($id != '') {
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where('banner_vid', [$this->id => $id]);
        }elseif($limit != ''){
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
            $q = $this->db->get_where('banner_vid',$where,$limit,$start);
        }elseif ($where != '') {
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get_where('banner_vid', $where);
        }elseif ($query != '') {
            $q = $this->db->query($query);
        }else{
            $this->db->order_by('id', 'desc');
            $this->db->select($this->see);
           $q = $this->db->get('banner_vid');
        }

        return $q;
    }

    public function inBanner($obj='')
    {
        $q = $this->db->insert("banner", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function inVidBanner($obj='')
    {
        $q = $this->db->insert("banner_vid", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upBanner($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('banner', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function upVidBanner($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('banner_vid', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }

    public function dt_banner($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'banner';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'title', 'subtitle'];
       // Set searchable column fields
       $CI->dt->column_search = ['title','subtitle'];
       // Set select column fields
       $CI->dt->select = 'id,title,subtitle,image,status';
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
               $dt->title,
               $dt->subtitle,
               '<img src="data/banner/'.$dt->image.'" style="width:100px;">',
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

    public function dt_vidbanner($status='1')
    {
       // Definisi
       $condition = [];
       $data = [];

       $CI = &get_instance();
       $CI->load->model('DataTable', 'dt');

       // Set table name
       $CI->dt->table = 'banner_vid';
       // Set orderable column fields
       $CI->dt->column_order = [null, 'nama', 'judul','deskripsi','tag'];
       // Set searchable column fields
       $CI->dt->column_search = ['judul','deskripsi','nama','tag'];
       // Set select column fields
       $CI->dt->select = 'id,judul,deskripsi,nama,tag,thumbnail,link_vid,status';
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
               $dt->nama,
               $dt->judul,
               $dt->tag,
               $dt->deskripsi,
               '<img src="data/banner/'.$dt->thumbnail.'" style="width:100px;">',
               '<a href="javascript:void(0)" class="btn btn-warning btn-sm" onClick="edit_modal_vid('.$dt->id.')"><i class="fa fa-edit"></i></a>
               <a href="javascript:void(0)" class="btn btn-danger btn-sm" onClick="del_art2('.$dt->id.')"><i class="fa fa-trash"></i></a>'
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
