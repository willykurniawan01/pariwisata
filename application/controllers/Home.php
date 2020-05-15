<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Homepage";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/template/footer');
    }
    public function visimisi()
    {
        $data['judul'] = "Visi dan Misi";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/visimisi', $data);
        $this->load->view('home/template/footer');
    }
    public function kepalaSekolah()
    {
        $data['judul'] = "Kepala Sekolah";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/kepalasekolah', $data);
        $this->load->view('home/template/footer');
    }
    public function galeri()
    {
        $data['judul'] = "Galeri";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/galeri', $data);
        $this->load->view('home/template/footer');
    }

    public function sekolah()
    {
        $data['judul'] = "Sekolah";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/sekolah', $data);
        $this->load->view('home/template/footer');
    }
}
