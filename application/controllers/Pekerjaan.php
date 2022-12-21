<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller{

	private $folder = 'backend/pekerjaan/';
	private $foldertemplate = 'backend/';

	public function __construct()
	{
		parent::__construct();
		belum_login();
		$this->load->model(array('M_pekerjaan','M_user'));
		//Codeigniter : Write Less Do More
	}

	function index()
	{
		$data = array(
			'subpage' => 'Data',
			'page' => 'Pekerjaan',
			'row' => $this->M_pekerjaan->get(),
			'nasabah' => $this->M_user->getnasabah(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
	}

	public function form()
	{
		$pekerjaan = new stdClass();
		$pekerjaan->id_pekerjaan = null;
		$pekerjaan->user_id = null;
		$pekerjaan->pekerjaan = null;
		$pekerjaan->nama_perush = null;
		$pekerjaan->alamat_perush = null;
		$pekerjaan->jabatan = null;
		$pekerjaan->jml_penghasilan = null;
		$data = array(
			'page' => 'Pekerjaan',
			'subpage' => 'Tambah',
			'row' => $pekerjaan,
			'nasabah' => $this->M_user->getnasabah(),
		);
		if ($this->form_validation->run() == FALSE) {
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		}
	}

	public function edit($id)
	{
		cek_admin();
		$query = $this->M_pekerjaan->get($id);
		if ($query->num_rows() > 0) {
			$pekerjaan = $query->row();
			$data = array(
			'page' => 'Pekerjaan',
			'subpage' => 'Edit',
			'row' => $pekerjaan,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pekerjaan','refresh');
		}
	}

	public function edituser($id)
	{
		$query = $this->M_pekerjaan->getid_user($id);
		if ($query->num_rows() > 0) {
			$pekerjaan = $query->row();
			$data = array(
			'page' => 'Pekerjaan',
			'subpage' => 'Edit',
			'row' => $pekerjaan,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pekerjaan','refresh');
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Tambah'])) {
			if($this->M_pekerjaan->cek_id_user($post['user_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Nasabah yang anda masukkan sudah terdaftar, silahkan ganti dengan yang berbeda");
				redirect('pekerjaan/form');
			} else{
			$this->M_pekerjaan->add($post);
		}
		}else if (isset($_POST['Edit'])) {
			$this->M_pekerjaan->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('pekerjaan');
	}

	public function del($id)
	{
		cek_admin();
		$this->M_pekerjaan->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('pekerjaan');
	}

}
