<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class relasi extends CI_Controller{

	private $folder = 'backend/relasi/';
	private $foldertemplate = 'backend/';

	public function __construct()
	{
		parent::__construct();
		belum_login();
		cek_admin();
		$this->load->model(array('M_relasi','M_gejala','M_penyakit'));
		//Codeigniter : Write Less Do More
	}

	function index()
	{
		$data = array(
			'subpage' => 'Data',
			'page' => 'Relasi',
			'row' => $this->M_relasi->get(),
      'rowrelasi' => $this->M_relasi->getrelasi(),
			'penyakit' => $this->M_penyakit->get(),
			'gejala' => $this->M_gejala->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
	}

	public function form()
	{
		$relasi = new stdClass();
		$relasi->id_relasi = null;
		$relasi->kd_gejala = null;
		$relasi->kd_penyakit = null;
		$relasi->bobot = null;
		$data = array(
			'page' => 'Relasi',
			'subpage' => 'Tambah',
			'row' => $relasi,
			'penyakit' => $this->M_penyakit->get(),
			'gejala' => $this->M_gejala->get(),
		);
		if ($this->form_validation->run() == FALSE) {
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		}
	}

	public function edit($id)
	{
		$query = $this->M_relasi->get($id);
		if ($query->num_rows() > 0) {
			$relasi = $query->row();
			$data = array(
			'page' => 'Relasi',
			'subpage' => 'Edit',
			'row' => $relasi,
			'penyakit' => $this->M_penyakit->get(),
			'gejala' => $this->M_gejala->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('Relasi','refresh');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Tambah'])) {
			$this->M_relasi->add($post);
		}else if (isset($_POST['Edit'])) {
			$this->M_relasi->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('relasi');
	}

	public function filter()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Filter'])) {
			$data = array(
				'subpage' => 'Data',
				'page' => 'Relasi',
				'row' => $this->M_relasi->get(),
        'rowrelasi' => $this->M_relasi->getrelasi(),
				'penyakit' => $this->M_penyakit->get(),
				'gejala' => $this->M_gejala->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
    } else if (isset($_POST['Cetak'])) {
      $this->load->library('pdf');
			$data = array(
				'subpage' => 'Data',
				'page' => 'Relasi',
				'row' => $this->M_relasi->get(),
        'rowrelasi' => $this->M_relasi->getrelasi(),
				'penyakit' => $this->M_penyakit->get(),
				'gejala' => $this->M_gejala->get(),
			);
      $this->load->view($this->folder.'lap_relasi', $data);
      $html = $this->output->get_output();
      $this->pdf->setPaper('A4', 'potrait');
      $this->pdf->load_html($html);
      $this->pdf->render();
      $this->pdf->stream("Data Relasi ".date('d-m-Y').".pdf", array('Attachment' => true));
       exit(0);
    } if(isset($_POST['Reset'])){
      redirect('relasi','refresh');
    }
  }

	public function del($id)
	{
		$this->M_relasi->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('relasi');
	}

}
