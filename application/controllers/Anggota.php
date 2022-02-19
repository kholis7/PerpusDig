<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model');
    }

	public function index()
	{
        if($this->session->userdata('login')==TRUE){
            $data ['anggota'] = $this->Model->get_anggota();
            $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
            $this->load->view('top', $data);
            $this->load->view('anggota');
            $this->load->view('Modal');
            $this->load->view('bottom');
        } else {
            redirect ('Auth');
        }
	}
    public function anggota_tambah(){
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        $this->load->view('top', $data);
		$this->load->view('anggota_tambah');
		$this->load->view('bottom');
    }
    
    public function anggota_edit($id=""){
        $data['anggota'] = $this->db->get_where('tbl_anggota',array('id_anggota'=>$id),1)->row();
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        $this->load->view('top',$data);
		$this->load->view('anggota_edit');
		$this->load->view('bottom');
    }

    public function add(){
        //$tanggal = date("Y-m-d");
        $data = array(
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'email' => $this->input->post('email'),
            'tgl_input' => $this->input->post('tgl_input')
        );
        if($this->db->insert('tbl_anggota',$data)){
            $this->session->set_flashdata("Success","Berhasil Menambahkan Data");
            echo "<script>window.location.href='".base_url()."Anggota"."';</script>";
        } else{
            $this->session->set_flashdata("Error","Gagal Menambahkan Data");
            echo "<script>window.location.href='".base_url()."Anggota"."';</script>";
        }
    }

    public function update(){
        $data = array(
            'id_anggota' => $this->input->post('id_anggota'),
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama'),
            'kelas' => $this->input->post('kelas'),
            'jurusan' => $this->input->post('jurusan'),
            'email' => $this->input->post('email'),
            'tgl_input' => $this->input->post('tgl_update')
        );

        $this->db->where('id_anggota', $this->input->post('id_anggota'));
        if($this->db->update('tbl_anggota',$data)){
            $this->session->set_flashdata("Success","Berhasil Merubah Data Anggota");
            echo "<script>window.location.href='".base_url()."Anggota"."';</script>";
        } else{
            $this->session->set_flashdata("Error","Gagal Merubah Data Anggota");
            echo "<script>window.location.href='".base_url()."Anggota"."';</script>";
        }
    }
    public function delete ($nis){
        if($this->db->delete('tbl_anggota', array('nis'=>$nis)))
        $this->session->set_flashdata("Success","Berhasil Menghapus Data Anggota");
            echo "<script>window.location.href='".base_url()."Anggota"."';</script>";
    }
    public function ubah_profile(){
        $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
        
        $this->load->view('top', $data);
		$this->load->view('upload_photo');
		$this->load->view('bottom');
    }

    public function upload_berkas(){
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000000;
        $config['max_width'] = 4800;
        $config['max_height'] = 4800;
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('berkas')){
            sleep(4);
            $this->session->set_flashdata('Error','Gagal Upload Gambar, Silahkan Periksa File Anda');
            redirect('Anggota');
        } else {
            sleep (4);
            $string = $this->upload->data();
            $data = array(
                'photo' => $string['file_name']
            );
            $this->db->where('id_user',$this->session->userdata('id_user'));
            if($this->db->update('tbl_user',$data)){
                $this->session->set_flashdata('Success','Anda Berhasil Mengubah Photo');
            redirect('Anggota');
            }
        }

    }
}