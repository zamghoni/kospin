<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Diagnosa extends CI_Controller{

	private $folder = 'backend/diagnosa/';
	private $foldertemplate = 'backend/';

	public function __construct()
	{
		parent::__construct();
		belum_login();
		$this->load->model(array('M_diagnosa','M_penyakit','M_user','M_gejala'));
		//Codeigniter : Write Less Do More
	}

	function index()
	{
		$data = array(
			'subpage' => 'Data',
			'page' => 'Diagnosa',
			'row' => $this->M_diagnosa->get(),
      'rowhasil' => $this->M_diagnosa->getanalisahasil(),
			'penyakit' => $this->M_penyakit->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
	}

	public function filter()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Filter'])) {
			$data = array(
				'subpage' => 'Data',
				'page' => 'Diagnosa',
				'row' => $this->M_diagnosa->get(),
        'rowhasil' => $this->M_diagnosa->getanalisahasil(),
				'penyakit' => $this->M_penyakit->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
    } else if (isset($_POST['Cetak'])) {
      $this->load->library('pdf');
			$data = array(
				'subpage' => 'Data',
				'page' => 'Diagnosa',
				'row' => $this->M_diagnosa->get(),
        'rowhasil' => $this->M_diagnosa->getanalisahasil(),
				'penyakit' => $this->M_penyakit->get(),
			);
      $this->load->view($this->folder.'lap_diagnosa', $data);
      $html = $this->output->get_output();
      $this->pdf->setPaper('A4', 'potrait');
      $this->pdf->load_html($html);
      $this->pdf->render();
      $this->pdf->stream("Hasil Diagnosa ".date('d-m-Y').".pdf", array('Attachment' => true));
       exit(0);
    } if(isset($_POST['Reset'])){
      redirect('diagnosa','refresh');
    }
  }

	public function form()
	{
		$diagnosa = new stdClass();
		$diagnosa->id = null;
		$diagnosa->nama = null;
		$diagnosa->jk = null;
		$diagnosa->umur = null;
		$diagnosa->alamat = null;
		$diagnosa->kd_penyakit = null;
		$diagnosa->tanggal = null;
		$diagnosa->email = null;
		$data = array(
			'page' => 'Diagnosa',
			'subpage' => 'Tambah',
			'row' => $diagnosa,
      'user' => $this->M_user->getpasien(),
      'gejala' => $this->M_gejala->get(),
		);
		if ($this->form_validation->run() == FALSE) {
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		}
	}

	public function edit($id)
	{
		$query = $this->M_diagnosa->get($id);
		if ($query->num_rows() > 0) {
			$diagnosa = $query->row();
			$data = array(
			'page' => 'Diagnosa',
			'subpage' => 'Edit',
			'row' => $diagnosa,
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('diagnosa','refresh');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Tambah'])) {
				$this->M_diagnosa->addtemppasien($post);
        $this->M_diagnosa->addtempgejala($post);
		}else if (isset($_POST['Edit'])) {
			$this->M_diagnosa->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('diagnosa/hasil/'.$post['id_user']);
	}

  public function savediagnosa()
	{
		$post = $this->input->post(null, TRUE);
    $user_id = $this->input->post('id_user');
		if (isset($_POST['Removetmp'])) {
				$this->M_diagnosa->deltmp_gejala($user_id);
        $this->M_diagnosa->deltmp_pasien($user_id);
		}else if (isset($_POST['SaveDiagnosa'])) {
			$this->M_diagnosa->addhasildiagnosa($post);
      $this->M_diagnosa->deltmp_gejala($user_id);
      $this->M_diagnosa->deltmp_pasien($user_id);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('diagnosa');
	}

  public function hasil($id)
	{
		$query = $this->M_diagnosa->gettmppasien($id);
		if ($query->num_rows() > 0) {
			$diagnosa = $query->row();
			$data = array(
			'page' => 'Diagnosa',
			'subpage' => 'Hasil',
			'row' => $diagnosa,
      'gejala' => $this->M_diagnosa->gettmpgejala(),
      'hsl_diagnosa' => $this->M_diagnosa->gethasil(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'hasil', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('diagnosa','refresh');
		}
	}
  public function deldiagnosa($id)
	{
		$this->M_diagnosa->deldiagnosa($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('diagnosa');
	}

	public function del($id)
	{
    cek_admin();
		$this->M_diagnosa->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('diagnosa');
	}

}
