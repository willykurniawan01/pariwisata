<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['navbar'] = "Home";
        $data['judul'] = "Homepage";
        $this->db->order_by('id_berita', 'DESC');
        $this->db->limit(4);
        $data['berita'] = $this->db->get('berita')->result_array();
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/template/footer');
    }
    public function visiMisi()
    {
        $data['navbar'] = "Profil";
        $data['judul'] = "Visi dan Misi";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/visimisi', $data);
        $this->load->view('home/template/footer');
    }
    public function kepalaSekolah()
    {
        $data['navbar'] = "Profil";
        $data['judul'] = "Kepala Sekolah";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/kepalasekolah', $data);
        $this->load->view('home/template/footer');
    }
    public function galeri()
    {
        $data['navbar'] = "Galeri";
        $data['judul'] = "Galeri";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/galeri', $data);
        $this->load->view('home/template/footer');
    }

    public function sekolah()
    {
        $data['navbar'] = "Profil";
        $data['judul'] = "Sekolah";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/sekolah', $data);
        $this->load->view('home/template/footer');
    }


    public function fasilitas()
    {
        $data['navbar'] = "Info";
        $data['judul'] = "Fasilitas";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/fasilitas', $data);
        $this->load->view('home/template/footer');
    }

    public function pendaftaran()
    {
        $data['navbar'] = "Info";
        $data['judul'] = "Pendaftaran";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/pendaftaran', $data);
        $this->load->view('home/template/footer');
    }
}
