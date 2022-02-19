<?php
if(!defined('BASEPATH'))exit('No direct Script access allowed');

class Model extends CI_MODEL{
    public function get_anggota(){
        //$q = $this->db->query("SELECT * FROM tbl_pelajar");
        $q = $this->db->get("tbl_anggota");
        return $q;
    }
    public function get_buku(){
        //$q = $this->db->query("SELECT * FROM tbl_pelajar");
        $q = $this->db->get("tbl_buku");
        return $q;
    }
    public function limit_anggota(){
        $this->db->select("*");
        $this->db->from("tbl_anggota");
        $this->db->order_by("tgl_input", "desc");
        $this->db->limit(5);
        $q = $this->db->get();
        return $q;
    }
    public function limit_buku(){
        $q = $this->db->get("tbl_buku",5);
        return $q;
    }
    public function count_anggota(){
        $q = $this->db->count_all("tbl_anggota");
        return $q;
    }
    public function count_buku(){
        $q = $this->db->count_all("tbl_buku");
        return $q;
    }
}