<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require('./application/third_party/vendor/autoload.php');

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Home extends CI_Controller{

  private $folder = 'frontend/home/';
	private $foldertemplate = 'frontend/';

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('M_user'));
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array(
			'subpage' => 'Kosnpin Jasa Cabang Cileduk',
			'page' => 'Home',
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'data',$data);
  }

  function alur_permohonan()
  {
    $data = array(
			'subpage' => 'Kosnpin Jasa Cabang Cileduk',
			'page' => 'Alur Permohonan Kredit',
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'alur_permohonan',$data);
  }

  function foto()
  {
    //konfigurasi pagination
    $config['base_url'] = site_url('home/foto'); //site url
    $config['total_rows'] = $this->db->count_all('album'); //total row
    $config['per_page'] = 6;  //show record per halaman
    $config["uri_segment"] = 3;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);

    // Membuat Style pagination untuk BootStrap v4
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only"> </span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    //panggil function get_album_list yang ada pada mmodel mahasiswa_model.
    $data = array(
      'subpage' => 'Kosnpin Jasa Cabang Cileduk',
      'page' => 'Foto',
      'row' => $this->M_album->get_album_list($config["per_page"], $data['page']),
    );

    $data['pagination'] = $this->pagination->create_links();

    //load view mahasiswa view
    $this->template->load($this->foldertemplate.'template',$this->folder.'foto',$data);
    // $this->load->view('mahasiswa_view',$data);
  }

  function agenda()
  {
    //konfigurasi pagination
    $config['base_url'] = site_url('home/agenda'); //site url
    $config['total_rows'] = $this->db->count_all('acara'); //total row
    $config['per_page'] = 6;  //show record per halaman
    $config["uri_segment"] = 3;  // uri parameter
    $choice = $config["total_rows"] / $config["per_page"];
    $config["num_links"] = floor($choice);

    // Membuat Style pagination untuk BootStrap v4
    $config['first_link']       = 'First';
    $config['last_link']        = 'Last';
    $config['next_link']        = 'Next';
    $config['prev_link']        = 'Prev';
    $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']   = '</ul></nav></div>';
    $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']    = '</span></li>';
    $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
    $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
    $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['prev_tagl_close']  = '</span>Next</li>';
    $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['first_tagl_close'] = '</span></li>';
    $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['last_tagl_close']  = '</span></li>';

    $this->pagination->initialize($config);
    $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

    //panggil function get_acara_list yang ada pada mmodel mahasiswa_model.
    $data = array(
      'subpage' => 'Kosnpin Jasa Cabang Cileduk',
      'page' => 'Agenda',
      'row' => $this->M_acara->get_acara_list($config["per_page"], $data['page']),
    );

    $data['pagination'] = $this->pagination->create_links();

    //load view mahasiswa view
    $this->template->load($this->foldertemplate.'template',$this->folder.'agenda',$data);
    // $this->load->view('mahasiswa_view',$data);
  }

  function statistik()
  {
    $data = array(
			'subpage' => 'Kosnpin Jasa Cabang Cileduk',
			'page' => 'Statistik',
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'statistik',$data);
  }

  function peminjaman()
  {
    $data = array(
			'subpage' => 'Kosnpin Jasa Cabang Cileduk',
			'page' => 'Ajukan Kredit',
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'peminjaman',$data);
  }

  public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['SaveRegs'])) {
			if($this->M_user->cek_email($post['email'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Email <b>$post[email]</b> sudah terdaftar, silahkan ganti dengan yang berbeda");
				redirect('ajukan_kredit');
			} else if($this->M_user->cek_no_hp($post['no_hp'])->num_rows() > 0){
				$this->session->set_flashdata('error', "Nomor Hp <b>$post[no_hp]</b> sudah terdaftar, silahkan ganti dengan yang berbeda");
				redirect('ajukan_kredit');
			}else{
				$this->M_user->addnasabah($post);
			}
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan, silahkan login');
		}
		redirect('auth');
	}

  public function filter()
  {
    $post = $this->input->post(null, TRUE);
    if (isset($_POST['Filter'])) {
			$data = array(
        'subpage' => 'Kosnpin Jasa Cabang Cileduk',
  			'page' => 'Data Bencana',
				'row' => $this->M_bencana->get(),
				'jenis' => $this->M_bencana->getjenis(),
				'tahun' => $this->M_bencana->gettahun(),
			);
			$this->template->load($this->foldertemplate.'template',$this->folder.'bencana',$data);
    } else if (isset($_POST['Cetak'])) {
      $this->load->library('pdf');
			$data = array(
        'subpage' => 'Kosnpin Jasa Cabang Cileduk',
  			'page' => 'Data Bencana',
				'row' => $this->M_bencana->get(),
				'jenis' => $this->M_bencana->getjenis()->result(),
				'tahun' => $this->M_bencana->gettahun()->result(),
			);
      $this->load->view($this->folder.'lap_bencana', $data);
      $html = $this->output->get_output();
      $this->pdf->setPaper('F4', 'landscape');
      $this->pdf->load_html($html);
      $this->pdf->render();
      $this->pdf->stream("Data Bencana ".date('d-m-Y').".pdf", array('Attachment' => true));
       exit(0);
    } if(isset($_POST['Reset'])){
      redirect('data_bencana','refresh');
    }
  }

  function kontak()
  {
    $data = array(
			'subpage' => 'Kosnpin Jasa Cabang Cileduk',
			'page' => 'Kontak',
		);
		$this->template->load($this->foldertemplate.'template',$this->folder.'kontak',$data);
  }

}
