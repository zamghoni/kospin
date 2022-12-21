<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  private $folder = "backend/dashboard/";
  private $foldertemplate = "backend/";

  public function __construct()
  {
    parent::__construct();
    belum_login();
    //Codeigniter : Write Less Do More
    $this->load->model(array('M_user','M_pinjaman'));
  }

  public function index()
  {
    $id = $this->fungsi->user_login()->id;
    $data = array(
      'page' => 'Dashboard',
      'subpage' => 'Kospin Jasa Cab. Cileduk',
      'user' => $this->M_user->getnasabah(),
      'pinjaman' => $this->M_pinjaman->get(),
      'liststatus' => $this->M_pinjaman->liststatus(),
      'approved' => $this->M_pinjaman->approved(),
      'notapproved' => $this->M_pinjaman->notapproved(),
      'totalpencairan' =>$this->M_pinjaman->totalpencairan(),
    );
    $this->template->load($this->foldertemplate.'template',$this->folder.'data', $data);
  }
}
