<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller{

	private $folder = 'backend/pinjaman/';
	private $foldertemplate = 'backend/';

	public function __construct()
	{
		parent::__construct();
		belum_login();
		$this->load->model(array('M_pinjaman','M_user'));
		//Codeigniter : Write Less Do More
	}

	function index()
	{
		$data = array(
			'subpage' => 'Data',
			'page' => 'Pinjaman',
			'row' => $this->M_pinjaman->get(),
			'nasabah' => $this->M_user->getnasabah(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
	}

	public function form()
	{
		$pinjaman = new stdClass();
		$pinjaman->id_pinjaman = null;
		$pinjaman->user_id = null;
		$pinjaman->jenis_pinjaman = null;
		$pinjaman->jangka_waktu = null;
		$pinjaman->jml_permohonan = null;
		$pinjaman->tujuan_penggunaan = null;
		$pinjaman->status = null;
		$data = array(
			'page' => 'Pinjaman',
			'subpage' => 'Tambah',
			'row' => $pinjaman,
			'nasabah' => $this->M_user->getnasabah(),
		);
		if ($this->form_validation->run() == FALSE) {
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		}
	}

	public function edit($id)
	{
		cek_admin();
		$query = $this->M_pinjaman->get($id);
		if ($query->num_rows() > 0) {
			$pinjaman = $query->row();
			$data = array(
			'page' => 'Pinjaman',
			'subpage' => 'Edit',
			'row' => $pinjaman,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('pinjaman','refresh');
		}
	}

	public function edituser($id)
	{
		$query = $this->M_pinjaman->getid_user($id);
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
			if($this->M_pinjaman->cek_id_user($post['user_id'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Nasabah yang anda masukkan sudah terdaftar, silahkan ganti dengan yang berbeda");
				redirect('pinjaman/form');
			} else{
			$this->M_pinjaman->add($post);
		}
		}else if (isset($_POST['Edit'])) {
			$this->M_pinjaman->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('pinjaman');
	}

	public function del($id)
	{
		cek_admin();
		$this->M_pinjaman->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('pinjaman');
	}

	public function status()
  {
		cek_pimpinan();
    $post = $this->input->post(null, TRUE);
    $this->M_pinjaman->status($post);
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil disimpan');
    }
      redirect('permohonan');
  }

}
