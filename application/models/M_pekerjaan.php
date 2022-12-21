<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pekerjaan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = null)
  {
    $this->db->from('pekerjaan');
    $this->db->join('user', 'user.id = pekerjaan.user_id', 'left');
    if ($id != null) {
      $this->db->where('id_pekerjaan',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  function getid_user($id = null)
  {
    $this->db->from('pekerjaan');
    $this->db->join('user', 'user.id = pekerjaan.user_id', 'left');
    if ($id != null) {
      $this->db->where('user_id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  function getiduser($id = null)
  {
    $this->db->from('pekerjaan');
    if ($id != null) {
      $this->db->where('pekerjaan.user_id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'pekerjaan' => ucwords($post['pekerjaan']),
      'nama_perush' => ucfirst($post['nama_perush']),
      'alamat_perush' => $post['alamat_perush'],
      'jabatan' => ucfirst($post['jabatan']),
      'jml_penghasilan' => $post['jml_penghasilan'],
    ];
    $this->db->insert('pekerjaan', $params);
  }

  public function edit($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'pekerjaan' => ucwords($post['pekerjaan']),
      'nama_perush' => ucfirst($post['nama_perush']),
      'alamat_perush' => $post['alamat_perush'],
      'jabatan' => ucfirst($post['jabatan']),
      'jml_penghasilan' => $post['jml_penghasilan'],
    ];
    $this->db->where('id_pekerjaan', $post['id_pekerjaan']);
    $this->db->update('pekerjaan', $params);
  }

  function cek_id_user($code, $id = null)
  {
    $this->db->from('pekerjaan');
    $this->db->where('user_id', $code);
    if($id != null){
      $this->db->where('id_nasabah !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('id_pekerjaan', $id);
    $this->db->delete('pekerjaan');
	}

}
