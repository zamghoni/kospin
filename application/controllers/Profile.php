<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  private $folder = "backend/profile/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    belum_login();
    $this->load->model(array('M_user'));
  }

  function index()
  {
    $id = $this->fungsi->user_login()->id;
    $query = $this->M_user->get($id);
  		if ($query->num_rows() > 0) {
  			$user = $query->row();
  			$data = array(
          'page' => 'Profile',
  				'subpage' => 'View',
  				'row' => $user,
  			);
  			$this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
  		} else {
  			$this->session->set_flashdata('error', "Data tidak ditemukan");
  			redirect('profile','refresh');
  		}
  }

  function change_password()
  {
    $id = $this->fungsi->user_login()->id;
    $query = $this->M_user->get($id);
  		if ($query->num_rows() > 0) {
  			$user = $query->row();
  			$data = array(
          'page' => 'Password',
  				'subpage' => 'Change',
  				'row' => $user,
  			);
  			$this->template->load($this->foldertemplate.'template',$this->folder.'password_form', $data);
  		} else {
  			$this->session->set_flashdata('error', "Data tidak ditemukan");
  			redirect('profile','refresh');
  		}
  }

  public function process()
  {
    $post = $this->input->post(null, TRUE);

    if (isset($_POST['update'])) {
      $this->M_user->edit_profile($post);
    }
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil diperbaharui');
    }
    redirect('profile');
  }

  public function ubah_password()
  {
    $username = $this->fungsi->user_login()->email;
    $password = $this->input->post('old_password');
    $post = $this->input->post(null, TRUE);
    $user = $this->db->get_where('user', ['email' => $username])->row_array();

    if (password_verify($password, $user['password'])) {
      if (isset($_POST['password_update'])) {
        $this->M_user->ubah_password($post);
      }
      $this->session->set_flashdata('success', 'Password baru berhasil diperbaharui');
      redirect('profile/change_password');
    }
    $this->session->set_flashdata('error', '<b>Gagal ubah password!</b> Password Lama tidak sama dengan yang ada di database');
    redirect('profile/change_password');
    if ($this->db->affected_rows() > 0) {
      $this->session->set_flashdata('success', 'Data berhasil diperbaharui');
    }
    redirect('profile/change_password');
  }

}
