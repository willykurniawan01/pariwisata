<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_Model', 'berita');
    }

    public function index()
    {
        $data['judul'] = "Berita";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/berita', $data);
        $this->load->view('home/template/footer');
    }

    public function post()
    {
        $config['base_url'] = 'http://localhost/smp-masmur/berita/post';
        $config['total_rows'] = $this->berita->countBerita();
        $config['per_page'] = 20;
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['berita'] = $this->berita->getBerita($config['per_page'], $data['start']);
    }

    public function detail() //menerima parameter id dari post
    {
        // $detail = $this->berita->getDetail($id);
        // $data['detail'] = $detail;

        $data['judul'] = "Berita";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-berita', $data);
        $this->load->view('home/template/footer');
    }
}
