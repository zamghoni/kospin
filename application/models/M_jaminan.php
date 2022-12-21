<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jaminan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get($id = null)
  {
    $this->db->from('jaminan');
    $this->db->join('user', 'user.id = jaminan.user_id', 'left');
    if ($id != null) {
      $this->db->where('id_jaminan',$id);
    }
    $query = $this->db->get();
    return $query;
  }

  public function add($post)
  {
    $params = [
      'user_id' => $post['user_id'],
      'nama_jaminan' => $post['nama_jaminan'],
      'taksiran' => $post['taksiran'],
    ];
    if (!empty($_FILES['foto_jaminan']['name'])) {
      $upload = $this->_do_uploadfoto();
      $params['foto_jaminan'] = $upload;
    }
    $this->db->insert('jaminan', $params);
  }

  private function _do_uploadfoto()
  {
    unset($config);
    $config['upload_path'] 		= './upload/foto/';
    $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
    $config['max_size']    		=  2048;
    $config['file_name']    	=  'Foto Jaminan'.date('ymd').'-'.substr(md5(rand()),0,10);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('foto_jaminan')) {
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
      'user_id' => $post['user_id'],
      'nama_jaminan' => $post['nama_jaminan'],
      'taksiran' => $post['taksiran'],
    ];
    if (!empty($_FILES['foto_jaminan']['name'])) {
      $upload = $this->_do_uploadfoto();
      $params['foto_jaminan'] = $upload;
      unlink("./upload/foto/".$this->input->post('old_foto'));
    }
    $this->db->where('id_jaminan', $post['id_jaminan']);
    $this->db->update('jaminan', $params);
  }

  public function del($id)
	{
    $data = $this->M_jaminan->get($id)->row();
    if($data->foto_jaminan != null) {
      $file_foto = './upload/foto/'.$data->foto_jaminan;
      unlink($file_foto);
    }
    $this->db->where('id_jaminan', $id);
    $this->db->delete('jaminan');
	}

}
