<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

	private $title = "Portal Smart City Bali";

	public function __construct()
	{
		parent::__construct();
        $this->load->model('MArtikel','ma');
        $this->load->model('MBanner','mb');
        $this->load->model('MEvent','me');
        $this->load->model('MDept','md');
        $this->load->model('MTentang','mt');
        $this->load->model('MYanrat','my');
		
	}

	public function index()
	{
		$q = $this->ma->getKategori()->result();
		$ar = $this->ma->getArtikel('',4)->result();
		$yan = $this->my->get('',['status' => 1])->result();
		$bn = $this->mb->get('',['status' => 1],'',3)->result();
		$vbn = $this->mb->getvid('',['status' => 1],'',1)->result();
		// echo json_encode($bn);die();
		$data = [
			'title' => $this->title,
			'kategori' => $q,
			'artikel' => $ar,
			'banner' => $bn,
			'banner_vid' => $vbn,
			'yan_rat' => $yan,
			'link' =>  'index',
			'js' => [
                base_url('assets/js_local/pages/portal.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function beritaSingle($id)
	{
		$ar = $this->ma->getArtikel($id)->row();
		$recentAr = $this->ma->getResentArtikelPerhari()->result();
		$tags = $this->ma->getKategori()->result();
		$event = $this->me->get('',['status' => 1],'','3')->result();
		$data = [
			'title' => $this->title,
			'artikel' => $ar,
			'recentAr' => $recentAr,
			'tags' => $tags,
			'event' => $event,
			'link' => 'berita-single',
			'js' => [
                base_url('assets/js_local/pages/berita-single.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function berita()
	{
		// $q = $this->ma->getKategori()->result();
		// $ar = $this->ma->getArtikel()->result();
		$k=$this->input->get('k');
		$jumlah_data_berita = $this->ma->jumlah_data_berita($k);
		$config['reuse_query_string'] = true;
		$this->load->library('pagination');
		$config['base_url'] = base_url().'Portal/berita/';
		$config['total_rows'] = $jumlah_data_berita;
		$config['per_page'] = 8;
		$config['next_link'] = "<i class='bx bx-chevron-right'></i>";
		$config['prev_link'] = "<i class='bx bx-chevron-left'></i>";
		$config['first_link'] = '';
		$config['last_link'] = '';
		$config['full_tag_open'] = '<div class="pagination-area justify-content-center">';
		$config['full_tag_close'] = '</div>';
		$config['num_tag_open'] = '<span class="page-numbers">';
		$config['num_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="page-numbers current" aria-current="page">';
		$config['cur_tag_close'] = '</span>';
		$config['prev_tag_open'] = '<span class="page-numbers">';
		$config['prev_tag_close'] = '</span>';
		$config['next_tag_open'] = '<span class="page-numbers">';
		$config['next_tag_close'] = '</span>';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['first_tag_open'] = '';
		$config['first_tag_close'] = '';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data = [
			'title' => $this->title.' - Explore',
			'artikel' => $this->ma->data_berita($config['per_page'],$from,$k),
			'utama' => $this->ma->berita_utama(),
			'kategori' => $this->ma->kategories(),
			'link' =>  'berita',
			'kid' => $k
		];
		$this->load->view('main_portal',$data);
	}

  public function eventSingle($id)
	{
		$ev = $this->me->get($id)->row();
		// $event = $this->me->get('',['status' => 1],'','3')->result();
		$data = [
			'title' => $this->title,
			'event' => $ev,
			// 'event' => $event,
			'link' => 'event-single',
			'js' => [
        // base_url('assets/js_local/pages/event.js'),
        base_url('assets/js_local/pages/event-singel.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function getEvnt($id)
	{
		$ev = $this->me->get($id)->row();
		echo json_encode($ev);
	}


  public function event()
	{
    // $event = $this->me->get()->result();
    $this->load->library('pagination');
		$jumlah_data_event = $this->me->jumlah_data_event();
		$config['base_url'] = base_url().'portal/event/';
		$config['total_rows'] = $jumlah_data_event;
		$config['per_page'] = 10;
		$config['next_link'] = "<i class='bx bx-chevron-right'></i>";
		$config['prev_link'] = "<i class='bx bx-chevron-left'></i>";
		$config['first_link'] = '';
		$config['last_link'] = '';
		$config['full_tag_open'] = '<div class="pagination-area justify-content-center">';
		$config['full_tag_close'] = '</div>';
		$config['num_tag_open'] = '<span class="page-numbers">';
		$config['num_tag_close'] = '</span>';
		$config['cur_tag_open'] = '<span class="page-numbers current" aria-current="page">';
		$config['cur_tag_close'] = '</span>';
		$config['prev_tag_open'] = '<span class="page-numbers">';
		$config['prev_tag_close'] = '</span>';
		$config['next_tag_open'] = '<span class="page-numbers">';
		$config['next_tag_close'] = '</span>';
		$config['last_tag_open'] = '';
		$config['last_tag_close'] = '';
		$config['first_tag_open'] = '';
		$config['first_tag_close'] = '';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		$data = [
      'event' => $this->me->data_event($config['per_page'],$from),
      // 'event' => $event,
			'title' => $this->title.' - Event',
			'link' =>  'event',
			'js' => [
                //base_url('assets/js_local/pages/event.js'),
                base_url('assets/js_local/pages/event-singel.js'),
			],
			'slider' => $this->me->event_slider()
		];
		$this->load->view('main_portal',$data);
	}


	public function tentang()
	{
    // $tentang = $this->mt->get()->result();
    $this->load->library('pagination');

		$jumlah_data = $this->mt->jumlah_data();
		$config['base_url'] = base_url().'Portal/tentang';
		$config['total_rows'] = $jumlah_data;
		// $config['per_page'] = 10;
		$config['per_page'] = 1;
		$config['next_link'] = '»';
		$config['prev_link'] = '«';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
    
		$data = [
      'event' => $this->mt->data_event_about(),
      'link' =>  'event',
			'title' => $this->title,
			'link' =>  'about',
      'tentang' => $this->mt->data_tentang($config['per_page'],$from),
			'js' => [
                base_url('assets/js_local/pages/about.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function dept()
	{
		$data = [
			'title' => $this->title,
			'link' =>  'dept',
			'js' => [
                base_url('assets/js_local/pages/dept.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function detailDept($id="")
	{
		$dept = $this->md->get($id)->result();
		$ktg_id = explode(',',$dept[0]->kategori_ar_id);
		$ar = $this->ma->getArtikel('',3,$ktg_id)->result();
		$data = [
			'title' => $this->title,
			'link' =>  'detaildept',
			'dept' => $dept,
			'artikel' => $ar,
			'js' => [
                base_url('assets/js_local/pages/detaildept.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}

	public function maps()
	{
		$data = [
			'link' =>  'maps',
			'js' => [
                base_url('assets/js_local/pages/custom.js'),
                base_url('assets/js_local/pages/maps.js'),
			],
		];
		$this->load->view('main_portal',$data);
	}
}
