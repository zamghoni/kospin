<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = null)
  {
    $this->db->from('user');
    $this->db->order_by('role', 'ASC');
    $this->db->order_by('nama_lengkap', 'ASC');
    if ($id != null) {
      $this->db->where('id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  function getnasabah()
  {
    $this->db->from('user');
    $this->db->where('role',2);
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'nama_lengkap' => ucwords($post['nama_lengkap']),
      'email' => $post['email'],
      'no_hp' => $post['no_hp'],
      'password' => password_hash($post['password'], PASSWORD_BCRYPT),
      'role' => $post['role'],
      'dibuat' => date('Y-m-d H:i:s'),
    ];
    if (!empty($_FILES['foto']['name'])) {
      $upload = $this->_do_uploadfoto();
      $params['foto'] = $upload;
    }
    $this->db->insert('user', $params);
  }

  public function addnasabah($post)
  {
    $params = [
      'nama_lengkap' => ucwords($post['nama_lengkap']),
      'email' => $post['email'],
      'no_hp' => $post['no_hp'],
      'password' => password_hash($post['password'], PASSWORD_BCRYPT),
      'role' => 2,
      'dibuat' => date('Y-m-d H:i:s'),
    ];
    $this->db->insert('user', $params);
  }

  private function _do_uploadfoto()
  {
    unset($config);
    $config['upload_path'] 		= './upload/foto/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
    $config['max_size']    		=  2048;
    $config['file_name']    	=  'Foto User'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('foto')) {
      $this->session->set_flashdata('error', $this->upload->display_errors('',''));
      if ($this->uri->segment(1) == 'profile') {
        redirect('profile');
      }else{
        redirect('user','refresh');
      }
    }
    return $this->upload->data('file_name');
  }

  public function edit($post)
  {
    $params = [
    'nama_lengkap' => ucwords($post['nama_lengkap']),
    'email' => $post['email'],
    'no_hp' => $post['no_hp'],
    'role' => $post['role'],
    'diubah' => date('Y-m-d H:i:s')
    ];
    if (!empty($_FILES['foto']['name'])) {
      $upload = $this->_do_uploadfoto();
      $params['foto'] = $upload;
      unlink("./upload/foto/".$this->input->post('old_foto'));
    }
    if (!empty($post['password'] && $post['konf_password'])) {
      $params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
    }
    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  public function edit_profile($post)
  {
    $params = [
    'nama_lengkap' => ucwords($post['nama_lengkap']),
    'email' => $post['email'],
    'no_hp' => $post['no_hp'],
    'role' => $post['role'],
    'diubah' => date('Y-m-d H:i:s')
    ];
    if (!empty($_FILES['foto']['name'])) {
      $upload = $this->_do_uploadfoto();
      $params['foto'] = $upload;
      unlink("./upload/foto/".$this->input->post('old_foto'));
    }
    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  public function ubah_password($post)
  {
    if (!empty($post['password'] && $post['konf_password'])) {
      $params['password'] = password_hash($post['password'], PASSWORD_BCRYPT);
    }
    $this->db->where('id', $post['id']);
    $this->db->update('user', $params);
  }

  function cek_email($code, $id = null)
  {
    $this->db->from('user');
    $this->db->where('email', $code);
    if($id != null){
      $this->db->where('id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  function cek_no_hp($code, $id = null)
  {
    $this->db->from('user');
    $this->db->where('no_hp', $code);
    if($id != null){
      $this->db->where('id !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
  {
    $data = $this->M_user->get($id)->row();
    if($data->foto != null) {
      $file_foto = './upload/foto/'.$data->foto;
      unlink($file_foto);
    }
    $this->db->where('id', $id);
    $this->db->delete('user');
  }

}
