<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Nasabah extends CI_Controller{

	private $folder = 'backend/nasabah/';
	private $foldertemplate = 'backend/';

	public function __construct()
	{
		parent::__construct();
		belum_login();
		$this->load->model(array('M_nasabah','M_jaminan','M_user'));
		//Codeigniter : Write Less Do More
	}

	function index()
	{
		$data = array(
			'subpage' => 'Data',
			'page' => 'Nasabah',
			'row' => $this->M_nasabah->get(),
			'jaminan' => $this->M_jaminan->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
	}

	public function form()
	{
		$nasabah = new stdClass();
		$nasabah->id_nasabah = null;
		$nasabah->user_id = null;
		$nasabah->jk = null;
		$nasabah->no_ktp = null;
		$nasabah->tmpt_lahir = null;
		$nasabah->tgl_lhr = null;
		$nasabah->alamat = null;
		$nasabah->pend_terakhir = null;
		$nasabah->ibu_kandung = null;
		$nasabah->status_perkawinan = null;
		$nasabah->jml_tanggungan = null;
		$nasabah->istri_suami = null;
		$nasabah->pekerjaan_istri_suami = null;
		$nasabah->foto_kk = null;
		$nasabah->foto_ktp = null;
		$nasabah->akta_nikah = null;
		$data = array(
			'page' => 'Nasabah',
			'subpage' => 'Tambah',
			'row' => $nasabah,
			'nasabah' => $this->M_user->getnasabah(),
		);
		if ($this->form_validation->run() == FALSE) {
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		}
	}

	public function edit($id)
	{
    cek_admin();
		$query = $this->M_nasabah->get($id);
		if ($query->num_rows() > 0) {
			$nasabah = $query->row();
			$data = array(
			'page' => 'Nasabah',
			'subpage' => 'Edit',
			'row' => $nasabah,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('nasabah','refresh');
		}
	}

  public function edituser($id)
	{
		$query = $this->M_nasabah->getid_user($id);
		if ($query->num_rows() > 0) {
			$nasabah = $query->row();
			$data = array(
			'page' => 'Nasabah',
			'subpage' => 'Edit',
			'row' => $nasabah,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('nasabah','refresh');
		}
	}

	public function detail($id)
	{
		$query = $this->M_nasabah->get($id);
		if ($query->num_rows() > 0) {
			$nasabah = $query->row();
			$data = array(
			'page' => 'Nasabah',
			'subpage' => 'Detail',
			'row' => $nasabah,
			'nasabah' => $this->M_user->getnasabah(),
			'jaminan' => $this->M_jaminan->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'detail', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('nasabah','refresh');
		}
	}

	public function cetak($id)
	{
		$query = $this->M_nasabah->get($id);
		if ($query->num_rows() > 0) {
			$nasabah = $query->row();
			$this->load->library('pdf');
			$data = array(
				'page' => 'Kredit Nasabah',
				'subpage' => 'Data Permohonan',
				'row' => $nasabah,
				'nasabah' => $this->M_user->getnasabah(),
				'jaminan' => $this->M_jaminan->get(),
			);
			$this->load->view($this->folder.'detail_nasabah', $data);
			$html = $this->output->get_output();
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->load_html($html);
			$this->pdf->render();
			$this->pdf->stream("Data Detail Nasabah ".date('d-m-Y').".pdf", array('Attachment' => true));
			exit(0);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('nasabah','refresh');
		}
	}


	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Tambah'])) {
			if($this->M_nasabah->cek_id_user($post['user_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Nasabah yang anda masukkan sudah terdaftar, silahkan ganti dengan yang berbeda");
				redirect('nasabah/form');
			} else{
				$this->M_nasabah->add($post);
			}
		}else if (isset($_POST['Edit'])) {
			$this->M_nasabah->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
    redirect('nasabah');
  }


	public function del($id)
	{
    cek_admin();
		$this->M_nasabah->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('nasabah');
	}

}
