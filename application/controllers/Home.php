<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['navbar'] = "Home";
        $data['judul'] = "Homepage";
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->limit(4);
        $data['wisata'] = $this->db->get('wisata')->result_array();
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/index', $data);
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
}
