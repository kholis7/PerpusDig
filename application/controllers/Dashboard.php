<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model');
    }

	public function index()
	{
        if($this->session->userdata('login')==TRUE){
            // $data ['buku'] = $this->Model->get_buku();
            $data ['buku'] = $this->Model->limit_buku();
            $data ['jml_anggota'] = $this->Model->count_anggota();
            $data ['jml_buku'] = $this->Model->count_buku();
            // $data ['anggota'] = $this->Model->get_anggota();
            $data ['anggota'] = $this->Model->limit_anggota();
            $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
            $this->load->view('top', $data);
            $this->load->view('Dashboard');
            $this->load->view('Modal');
            $this->load->view('bottom');
        } else {
            redirect ('Auth');
        }
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
            redirect('Dashboard');
        } else {
            sleep (4);
            $string = $this->upload->data();
            $data = array(
                'photo' => $string['file_name']
            );
            $this->db->where('id_user',$this->session->userdata('id_user'));
            if($this->db->update('tbl_user',$data)){
                $this->session->set_flashdata('Success','Anda Berhasil Mengubah Photo');
            redirect('Niomic');
            }
        }

    }
}