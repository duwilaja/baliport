<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MNotif extends CI_Model {

    public $see = '*';
    private $id = 'id';
    private $t = 'notif';

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

    public function getNotif($id='',$limit='')
    {
            $this->db->select($this->see);
            if ($id != '') {
                $this->db->where('id', $id);
            }else if($limit != ''){
                $this->db->order_by('id', 'desc');
                $this->db->where('status', 0);
                $this->db->limit($limit);
            }else {
                $this->db->order_by('id', 'desc');
                $this->db->where('status', 0);
            }
            $ok = $this->db->get('notif');
            return $ok;
    }

    public function inNotif($obj='')
    {
        $q = $this->db->insert("notif", $obj);
        $id = $this->db->insert_id();
        return $id;
        
    }

    public function upNotif($obj='',$where='')
    {
        $q = [];
        $msg = 'Object or Array is null';
        $status = 0 ;

        if ($obj != '' || $where != '') {
            $q = $this->db->update('notif', $obj,$where);
            if ($this->db->affected_rows() > 0) {
                $msg = "Success update data";
                $status = 1;
            }else{
                $msg = "Failed update data";
            }
        }

        return [$msg,$status];
        
    }
}
