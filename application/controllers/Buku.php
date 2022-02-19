<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model');
    }

	public function index()
	{
        if($this->session->userdata('login')==TRUE){
            $data ['buku'] = $this->Model->get_buku();
            $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
            $this->load->view('top', $data);
            $this->load->view('buku');
            $this->load->view('Modal');
            $this->load->view('bottom');
        } else {
            redirect ('Auth');
        }
	}
    public function buku_tambah(){
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        $this->load->view('top', $data);
		$this->load->view('buku_tambah');
		$this->load->view('bottom');
    }
    public function buku_edit($id=""){
        $data['buku'] = $this->db->get_where('tbl_buku',array('id_buku'=>$id),1)->row();
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        $this->load->view('top',$data);
		$this->load->view('buku_edit');
		$this->load->view('bottom');
    }
    public function add(){
        $data = array(
            'nama_buku' => $this->input->post('nama_buku'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun' => $this->input->post('tahun'),
            'link' => $this->input->post('link')
        );
        if($this->db->insert('tbl_buku',$data)){
            $this->session->set_flashdata("Success","Berhasil Menambahkan Data Buku");
            echo "<script>window.location.href='".base_url()."Buku"."';</script>";
        } else{
            $this->session->set_flashdata("Error","Gagal Menambahkan Data Buku");
            echo "<script>window.location.href='".base_url()."Buku"."';</script>";
        }
    }
    public function update(){
        $data = array(
            'nama_buku' => $this->input->post('nama_buku'),
            'pengarang' => $this->input->post('pengarang'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun' => $this->input->post('tahun'),
            'link' => $this->input->post('link')
        );

        $this->db->where('id_buku',$this->input->post('id_buku'));
        if($this->db->update('tbl_buku',$data)){
            $this->session->set_flashdata("Success","Berhasil Merubah Data E-Book");
            echo "<script>window.location.href='".base_url()."Buku"."';</script>";
        } else{
            $this->session->set_flashdata("Error","Gagal Merubah Data E-Book");
            echo "<script>window.location.href='".base_url()."Buku"."';</script>";
        }
    }
    public function delete ($id_buku){
        if($this->db->delete('tbl_buku', array('id_buku'=>$id_buku)))
        $this->session->set_flashdata("Success","Berhasil Menghapus Data Buku");
            echo "<script>window.location.href='".base_url()."Buku"."';</script>";
    }
    public function buku_view($id=""){
        $data['buku'] = $this->db->get_where('tbl_buku',array('id_buku'=>$id),1)->row();
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        $this->load->view('top', $data);
		$this->load->view('buku_view');
		$this->load->view('bottom');
    }
}