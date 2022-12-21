<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pinjaman extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = null)
  {
    $this->db->from('pinjaman');
    $this->db->join('user', 'user.id = pinjaman.user_id', 'left');
    if ($id != null) {
      $this->db->where('id_pinjaman',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  function getid_user($id = null)
  {
    $this->db->from('pinjaman');
    if ($id != null) {
      $this->db->where('user_id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'tgl_pinjaman' => date('Y-m-d'),
      'jenis_pinjaman' => $post['jenis_pinjaman'],
      'jangka_waktu' => $post['jangka_waktu'],
      'jml_permohonan' => $post['jml_permohonan'],
      'tujuan_penggunaan' => $post['tujuan_penggunaan'],
      'status' => 0,
    ];
    $this->db->insert('pinjaman', $params);
  }

  public function edit($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'jenis_pinjaman' => $post['jenis_pinjaman'],
      'jangka_waktu' => $post['jangka_waktu'],
      'jml_permohonan' => $post['jml_permohonan'],
      'tujuan_penggunaan' => $post['tujuan_penggunaan'],
      'status' => 0,
    ];
    $this->db->where('id_pinjaman', $post['id_pinjaman']);
    $this->db->update('pinjaman', $params);
  }

  function cek_id_user($code, $id = null)
  {
    $this->db->from('pinjaman');
    $this->db->where('user_id', $code);
    if($id != null){
      $this->db->where('id_nasabah !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $this->db->where('id_pinjaman', $id);
    $this->db->delete('pinjaman');
	}

  public function status($post)
  {
    $params = [
      'status' => $post['status'],
      'user_approved' => $this->fungsi->user_login()->id,
    ];
    $this->db->where('user_id', $post['user_id']);
    $this->db->update('pinjaman', $params);
  }

  function liststatus($id = null)
  {
    $this->db->select('status, COUNT(status) as total');
    $this->db->group_by('status');
    $this->db->order_by('total', 'desc');
    $query = $this->db->get('pinjaman', 6);
    return $query;
  }

  function approved($id = null)
  {
    $this->db->from('pinjaman');
    $this->db->where('status',5);
    $query = $this->db->get();
    return $query;
  }

  function notapproved($id = null)
  {
    $this->db->from('pinjaman');
    $this->db->where('status',1);
    $query = $this->db->get();
    return $query;
  }

  function totalpencairan($id = null)
  {
    return $this->db->query("SELECT SUM(jml_permohonan) as total FROM pinjaman WHERE status=5");
  }

}
