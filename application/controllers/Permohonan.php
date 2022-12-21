<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Permohonan extends CI_Controller{

	private $folder = 'backend/permohonan/';
	private $foldertemplate = 'backend/';

	public function __construct()
	{
		parent::__construct();
		belum_login();
		$this->load->model(array('M_nasabah','M_jaminan','M_user','M_pekerjaan','M_pinjaman'));
		//Codeigniter : Write Less Do More
	}

	function index()
	{
		$data = array(
			'subpage' => 'Data',
			'page' => 'Permohonan',
			'row' => $this->M_nasabah->getpermohonan(),
			'jaminan' => $this->M_jaminan->get(),
      'user' => $this->M_user->get(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
	}

	public function form()
	{
		$permohonan = new stdClass();
		$permohonan->id_permohonan = null;
		$permohonan->user_id = null;
		$permohonan->jk = null;
		$permohonan->no_ktp = null;
		$permohonan->tmpt_lahir = null;
		$permohonan->tgl_lhr = null;
		$permohonan->alamat = null;
		$permohonan->pend_terakhir = null;
		$permohonan->ibu_kandung = null;
		$permohonan->status_perkawinan = null;
		$permohonan->jml_tanggungan = null;
		$permohonan->istri_suami = null;
		$permohonan->pekerjaan_istri_suami = null;
		$permohonan->foto_kk = null;
		$permohonan->foto_ktp = null;
		$permohonan->akta_nikah = null;
		$data = array(
			'page' => 'Permohonan',
			'subpage' => 'Tambah',
			'row' => $permohonan,
			'nasabah' => $this->M_user->getnasabah(),
		);
		if ($this->form_validation->run() == FALSE) {
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		}
	}

	public function edit($id)
	{
		$query = $this->M_nasabah->get($id);
		if ($query->num_rows() > 0) {
			$permohonan = $query->row();
			$data = array(
			'page' => 'Nasabah',
			'subpage' => 'Edit',
			'row' => $permohonan,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('permohonan','refresh');
		}
	}

  public function edit_pekerjaan($id)
	{
		$query = $this->M_pekerjaan->getiduser($id);
		if ($query->num_rows() > 0) {
			$permohonan = $query->row();
			$data = array(
			'page' => 'Pekerjaan',
			'subpage' => 'Edit',
			'row' => $permohonan,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form_pekerjaan', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('permohonan','refresh');
		}
	}

  public function edit_pinjaman($id)
	{
		$query = $this->M_pinjaman->getid_user($id);
		if ($query->num_rows() > 0) {
			$permohonan = $query->row();
			$data = array(
			'page' => 'Pekerjaan',
			'subpage' => 'Edit',
			'row' => $permohonan,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form_pinjaman', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('permohonan','refresh');
		}
	}

	public function detail($id)
	{
		$query = $this->M_nasabah->getpermohonan($id);
		if ($query->num_rows() > 0) {
			$permohonan = $query->row();
			$data = array(
			'page' => 'Permohonan',
			'subpage' => 'Detail',
			'row' => $permohonan,
			'nasabah' => $this->M_user->getnasabah(),
			'jaminan' => $this->M_jaminan->get(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'detail', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('permohonan','refresh');
		}
	}

	public function cetak($id)
	{
		$query = $this->M_nasabah->getpermohonan($id);
		if ($query->num_rows() > 0) {
			$permohonan = $query->row();
			$this->load->library('pdf');
			$data = array(
				'page' => 'Kredit Nasabah',
				'subpage' => 'Data Permohonan',
				'row' => $permohonan,
				'nasabah' => $this->M_user->getnasabah(),
				'jaminan' => $this->M_jaminan->get(),
			);
			$this->load->view($this->folder.'detail_nasabah', $data);
			$html = $this->output->get_output();
			$this->pdf->setPaper('A4', 'potrait');
			$this->pdf->load_html($html);
			$this->pdf->render();
			$this->pdf->stream("Data Detail permohonan ".date('d-m-Y').".pdf", array('Attachment' => true));
			exit(0);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('permohonan','refresh');
		}
	}


  public function process()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Tambah'])) {
      if($this->M_nasabah->cek_id_user($post['user_id'])->num_rows() > 0){
        $this->session->set_flashdata('error', "permohonan yang anda masukkan sudah terdaftar, silahkan ganti dengan yang berbeda");
        redirect('permohonan/form');
      } else{
        $this->M_nasabah->add($post);
      }
    }else if (isset($_POST['Edit'])) {
      $this->M_nasabah->edit($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
      redirect('permohonan');
    }
  }

	public function del($id)
	{
    cek_admin();
		$this->M_nasabah->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('permohonan');
	}

}
