<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->Model('Model');
        $this->load->library('pdf');

    }

    public function index(){
        if($this->session->userdata('login')==TRUE){
            $data ['laporan_buku'] = $this->Model->get_buku();
            $data ['laporan_anggota'] = $this->Model->get_anggota();
            $data['gambar'] = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata('id_user')),1)->row()->photo;
            $this->load->view('top', $data);
            $this->load->view('laporan');
            $this->load->view('Modal');
            $this->load->view('bottom');
        } else {
            redirect ('Auth');
        }
    }

	public function laporan_anggota()
	{
        // require_once APPPATH.'third_party/fpdf/fpdf.php';
		
		$pdf = new FPDF('l','mm','A4');
		$pdf->AddPage();
		
		// $CI =& get_instance();
		// $CI->fpdf = $pdf;

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(280,7,'LAPORAN DATA ANGGOTA PERPUSTAKAAN',0,1,'C');
        $pdf->Cell(280,7,'SMK YAPIIM INDRAMAYU',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $anggota = $this->Model->get_anggota()->result();
        $pdf->Cell(35,7,'NIS',1,0,'C');
        $pdf->Cell(45,7,'NAMA SISWA',1,0,'C');
        $pdf->Cell(35,7,'KELAS',1,0,'C');
        $pdf->Cell(65,7,'JURURSAN',1,0,'C');
        $pdf->Cell(55,7,'E-MAIL',1,0,'C');
        $pdf->Cell(40,7,'Ket',1,1,'C');
        $pdf->SetFont('Arial','',12);

        foreach($anggota as $row){
            $pdf->Cell(35,6,$row->nis,1,0,'C');
            $pdf->Cell(45,6,$row->nama_siswa,1,0,'');
            $pdf->Cell(35,6,$row->kelas,1,0,'C');
            $pdf->Cell(65,6,$row->jurusan,1,0,'');
            $pdf->Cell(55,6,$row->email,1,0,'');
            $pdf->Cell(40,6,'',1,1,'');
        }

        $pdf->Output();
	}

    public function laporan_buku()
	{
        // require_once APPPATH.'third_party/fpdf/fpdf.php';
		
		$pdf = new FPDF('l','mm','A4');
		$pdf->AddPage();
		
		// $CI =& get_instance();
		// $CI->fpdf = $pdf;

        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(280,7,'LAPORAN DATA E-BOOK PERPUSTAKAAN',0,1,'C');
        $pdf->Cell(280,7,'SMK YAPIIM INDRAMAYU',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',12);
        $buku = $this->Model->get_buku()->result();
        $pdf->Cell(30,7,'KODE',1,0,'C');
        $pdf->Cell(75,7,'NAMA E-BOOK',1,0,'C');
        $pdf->Cell(70,7,'NAMA PENGARANG',1,0,'C');
        $pdf->Cell(70,7,'PENERBIT',1,0,'C');
        $pdf->Cell(30,7,'TAHUN',1,1,'C');
        $pdf->SetFont('Arial','',12);

        foreach($buku as $row){
            $pdf->Cell(30,6,$row->id_buku,1,0,'C');
            $pdf->Cell(75,6,$row->nama_buku,1,0,'');
            $pdf->Cell(70,6,$row->pengarang,1,0,'C');
            $pdf->Cell(70,6,$row->penerbit,1,0,'');
            $pdf->Cell(30,6,$row->tahun,1,1,'');
        }

        $pdf->Output();
	}
}


