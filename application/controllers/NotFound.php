<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotFound extends CI_Controller{

  private $folder = 'backend/notfound/';

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array(
			'page' => 'Not Found',
			'subpage' => 'Page',
		);
    $this->load->view($this->folder.'notfound',$data);
  }

}
