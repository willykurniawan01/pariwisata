<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['navbar'] = "Home";
        $data['judul'] = "Home";


        //menampilkan data wisata populer     
        $this->db->where('unggulan', '1');
        $data['wisata'] = $this->db->get('wisata')->result_array();

        $data['berita'] = $this->db->get('berita')->result_array();

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/index', $data);
        $this->load->view('home/template/footer');
    }

    public function isiBukuTamu()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan'),
        ];
        $bukutamu = $this->db->insert('buku_tamu', $data);
    }
}
