<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jaminan extends CI_Controller{

	private $folder = 'backend/jaminan/';
	private $foldertemplate = 'backend/';

	public function __construct()
	{
		parent::__construct();
		belum_login();		
		$this->load->model(array('M_jaminan','M_user'));
		//Codeigniter : Write Less Do More
	}

	function index()
	{
		$data = array(
			'subpage' => 'Data',
			'page' => 'Jaminan',
			'row' => $this->M_jaminan->get(),
			'nasabah' => $this->M_user->getnasabah(),
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
	}

	public function form()
	{
		$jaminan = new stdClass();
		$jaminan->id_jaminan = null;
		$jaminan->user_id = null;
		$jaminan->nama_jaminan = null;
		$jaminan->taksiran = null;
		$jaminan->foto_jaminan = null;
		$data = array(
			'page' => 'Jaminan',
			'subpage' => 'Tambah',
			'row' => $jaminan,
			'nasabah' => $this->M_user->getnasabah(),
		);
		if ($this->form_validation->run() == FALSE) {
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		}
	}

	public function edit($id)
	{
		$query = $this->M_jaminan->get($id);
		if ($query->num_rows() > 0) {
			$jaminan = $query->row();
			$data = array(
			'page' => 'Jaminan',
			'subpage' => 'Edit',
			'row' => $jaminan,
			'nasabah' => $this->M_user->getnasabah(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'form', $data);
		} else {
			$this->session->set_flashdata('error', "Data tidak ditemukan");
			redirect('jaminan','refresh');
		}
	}


	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['Tambah'])) {
			$this->M_jaminan->add($post);
		}else if (isset($_POST['Edit'])) {
			$this->M_jaminan->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('jaminan');
	}

	public function del($id)
	{
		$this->M_jaminan->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus');
		}
		redirect('jaminan');
	}

}
