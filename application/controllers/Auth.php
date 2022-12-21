<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{

  private $folder ="backend/auth/";

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_user'));
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $row = $this->M_user->get(get_cookie('id'))->row_array();
    if ( get_cookie('key') == hash('sha256', $row['email']) || get_cookie('key') == hash('sha256', $row['no_hp'])) {
        $data = array(
          'id' => $row['id'],
          'nama_lengkap' => $row['nama_lengkap'],
          'email' => $row['email'],
          'no_hp' => $row['no_hp'],
          'role' => $row['role'],
          'foto' =>$row['foto'],
        );
        $this->session->set_userdata($data);
        $this->session->set_flashdata('success','Selamat Datang kembali pada halaman Dashboard, salam semangat dan sukses selalu');
        redirect('dashboard','refresh');
      }
    } else {
      $data = array(
        'page' => 'Login',
        'subpage' => 'Puskesmas Penjaringan',
      );
      delete_cookie('id');
      delete_cookie('key');
      $this->load->view($this->folder.'login',$data);
    }
  }

  public function process()
  {
    $username = $this->input->post('email');
    $password = $this->input->post('password');
    $remember = $this->input->post('remember');

    $email = $this->db->get_where('user', ['email' => $username])->row_array();
    $no_hp = $this->db->get_where('user', ['no_hp' => $username])->row_array();

    if ($email) {
      // cek password
      if (password_verify($password, $email['password'])) {
        $data = array(
          'id' => $email['id'],
          'nama_lengkap' => $email['nama_lengkap'],
          'email' => $email['email'],
          'no_hp' => $email['no_hp'],
          'role' => $email['role'],
          'foto' =>$email['foto'],
        );
        $this->session->set_userdata($data);
        if ($remember != null) {
          set_cookie('id',$email['id'],'3600');
          set_cookie('key',hash('sha256',$email['email']),'3600');
        }
        $this->session->set_flashdata('success','Selamat Datang...<b> '. $this->session->userdata('nama_lengkap') .'</b> pada halaman Dashboard, salam semangat dan sukses selalu');
        redirect('dashboard','refresh');
      } else {
        $this->session->set_flashdata('error','<b>Login gagal!</b> Password yang anda masukkan salah');
        redirect('auth','refresh');
      }
    } else if ($no_hp) {
      // cek password
      if (password_verify($password, $no_hp['password'])) {
        $data = array(
          'id' => $no_hp['id'],
          'nama_lengkap' => $no_hp['nama_lengkap'],
          'email' => $no_hp['email'],
          'no_hp' => $no_hp['no_hp'],
          'role' => $no_hp['role'],
          'foto' =>$no_hp['foto'],
        );
        $this->session->set_userdata($data);
        if ($remember != null) {
          set_cookie('id',$no_hp['id'],'3600');
          set_cookie('key',hash('sha256',$no_hp['email']),'3600');
        }
        $this->session->set_flashdata('success','Selamat Datang...<b> '. $this->session->userdata('nama_lengkap') .'</b> pada halaman Dashboard, salam semangat dan sukses selalu');
        redirect('dashboard','refresh');
      } else {
        $this->session->set_flashdata('error','<b>Login gagal!</b> Password yang anda masukkan salah');
        redirect('auth','refresh');
      }
    } else {
      $this->session->set_flashdata('error','<b>Login gagal!</b> Akun Email / No HP tidak terdaftar');
      redirect('auth','refresh');
    }
  }

  public function logout()
  {
    delete_cookie('id');
    delete_cookie('key');
    $params = array('nama_lengkap','email','no_hp','role','foto');
    $this->session->unset_userdata($params);
    $this->session->sess_destroy();
    redirect('auth');
  }

}
