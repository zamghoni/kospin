<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nasabah extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = null)
  {
    $this->db->from('nasabah');
    $this->db->join('user', 'user.id = nasabah.user_id', 'left');
    $this->db->order_by('id_nasabah','DESC');
    if ($id != null) {
      $this->db->where('id_nasabah',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  function getpermohonan($id = null)
  {
    $this->db->from('nasabah');
    $this->db->join('user', 'user.id = nasabah.user_id', 'left');
    $this->db->join('pekerjaan', 'pekerjaan.user_id = nasabah.user_id', 'left');
    $this->db->join('pinjaman', 'pinjaman.user_id = nasabah.user_id', 'left');
    $this->db->order_by('id_nasabah','DESC');
    if ($id != null) {
      $this->db->where('id_nasabah',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  function getid_user($id = null)
  {
    $this->db->from('nasabah');
    $this->db->join('user', 'user.id = nasabah.user_id', 'left');
    $this->db->join('pekerjaan', 'pekerjaan.user_id = nasabah.user_id', 'left');
    $this->db->join('pinjaman', 'pinjaman.user_id = nasabah.user_id', 'left');
    if ($id != null) {
      $this->db->where('nasabah.user_id',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'jk' => $post['jk'],
      'no_ktp' => $post['no_ktp'],
      'tmpt_lahir' => ucfirst($post['tmpt_lahir']),
      'tgl_lhr' => $post['tgl_lhr'],
      'alamat' => ucfirst($post['alamat']),
      'pend_terakhir' => $post['pend_terakhir'],
      'ibu_kandung' => strtoupper($post['ibu_kandung']),
      'status_perkawinan' => $post['status_perkawinan'],
      'jml_tanggungan' => $post['jml_tanggungan'],
      'istri_suami' => ucfirst($post['istri_suami']),
      'pekerjaan_istri_suami' => ucfirst($post['pekerjaan_istri_suami']),
    ];
    if (!empty($_FILES['foto_kk']['name'])) {
      $upload = $this->_do_uploadfoto_kk();
      $params['foto_kk'] = $upload;
    }
    if (!empty($_FILES['foto_ktp']['name'])) {
      $upload = $this->_do_uploadfoto_ktp();
      $params['foto_ktp'] = $upload;
    }
    if (!empty($_FILES['akta_nikah']['name'])) {
      $upload = $this->_do_uploadfoto_akta_nikah();
      $params['akta_nikah'] = $upload;
    }
    $this->db->insert('nasabah', $params);
  }

  private function _do_uploadfoto_kk()
  {
    unset($config);
    $config['upload_path'] 		= './upload/foto/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
    $config['max_size']    		=  2048;
    $config['file_name']    	=  'Foto KK'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('foto_kk')) {
      $this->session->set_flashdata('error', $this->upload->display_errors('',''));
    }
    return $this->upload->data('file_name');
  }

  private function _do_uploadfoto_ktp()
  {
    unset($config);
    $config['upload_path'] 		= './upload/foto/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
    $config['max_size']    		=  2048;
    $config['file_name']    	=  'Foto KTP'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('foto_ktp')) {
      $this->session->set_flashdata('error', $this->upload->display_errors('',''));
    }
    return $this->upload->data('file_name');
  }

  private function _do_uploadfoto_akta_nikah()
  {
    unset($config);
    $config['upload_path'] 		= './upload/foto/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
    $config['max_size']    		=  2048;
    $config['file_name']    	=  'Foto Akta Nikah'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('akta_nikah')) {
      $this->session->set_flashdata('error', $this->upload->display_errors('',''));
    }
    return $this->upload->data('file_name');
  }

  public function edit($post)
  {
    $params = [
    'user_id' => $post['user_id'],
    'jk' => $post['jk'],
    'no_ktp' => $post['no_ktp'],
    'tmpt_lahir' => ucfirst($post['tmpt_lahir']),
    'tgl_lhr' => $post['tgl_lhr'],
    'alamat' => ucfirst($post['alamat']),
    'pend_terakhir' => $post['pend_terakhir'],
    'ibu_kandung' => strtoupper($post['ibu_kandung']),
    'status_perkawinan' => $post['status_perkawinan'],
    'jml_tanggungan' => $post['jml_tanggungan'],
    'istri_suami' => ucfirst($post['istri_suami']),
    'pekerjaan_istri_suami' => ucfirst($post['pekerjaan_istri_suami']),
  ];
  if (!empty($_FILES['foto_kk']['name'])) {
    $upload = $this->_do_uploadfoto_kk();
    $params['foto_kk'] = $upload;
    unlink("./upload/foto/".$this->input->post('old_foto_kk'));
  }
  if (!empty($_FILES['foto_ktp']['name'])) {
    $upload = $this->_do_uploadfoto_ktp();
    $params['foto_ktp'] = $upload;
    unlink("./upload/foto/".$this->input->post('old_foto_ktp'));
  }
  if (!empty($_FILES['akta_nikah']['name'])) {
    $upload = $this->_do_uploadfoto_akta_nikah();
    $params['akta_nikah'] = $upload;
    unlink("./upload/foto/".$this->input->post('old_foto_akta_nikah'));
  }
    $this->db->where('id_nasabah', $post['id_nasabah']);
    $this->db->update('nasabah', $params);
  }

  function cek_id_user($code, $id = null)
  {
    $this->db->from('nasabah');
    $this->db->where('user_id', $code);
    if($id != null){
      $this->db->where('id_nasabah !=', $id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function del($id)
	{
    $data = $this->M_nasabah->get($id)->row();
    if($data->foto_kk != null) {
      $file_foto_kk = './upload/foto/'.$data->foto_kk;
      unlink($file_foto_kk);
    }
    if($data->foto_ktp != null) {
      $file_foto_ktp = './upload/foto/'.$data->foto_ktp;
      unlink($file_foto_ktp);
    }
    if($data->akta_nikah != null) {
      $file_akta_nikah = './upload/foto/'.$data->akta_nikah;
      unlink($file_akta_nikah);
    }
    $this->db->where('id_nasabah', $id);
    $this->db->delete('nasabah');
	}

}
