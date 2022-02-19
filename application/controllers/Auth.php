<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('login')==TRUE)
        redirect ('Dashboard');
        else
        $this->load->view('login');
	}
    public function cobalogin(){
        if($this->input->method(TRUE)=='POST' && !empty($_POST)){
            $in['username'] = $this->input->post('username');
            $in['password'] = $this->input->post('password');
            $this->Auth_Model->cek($in);
        }
    }
}
