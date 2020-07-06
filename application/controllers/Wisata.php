<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('nama model', 'berita');
    }

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/wisata/index';

        $config['total_rows'] = $this->db->get('wisata')->num_rows();
        $config['per_page'] = 6;


        //custom pagination
        $config['full_tag_open'] = '<nav> <ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item"> <a class="page-link bg-danger text-white">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link text-danger');
        $this->pagination->initialize($config);
        //end custom pagination

        $cari = $this->input->get('cari');

        $data['start'] = $this->uri->segment(3);
        $this->db->order_by('id_wisata', 'DESC');
        $this->db->like('nama_wisata', $cari);

        $wisata = $this->db->get('wisata', $config['per_page'], $data['start'])->result_array();
        $data['wisata'] = $wisata;
        $data['judul'] = "wisata";
        $data['cari'] = $cari;
        $data['navbar'] = "wisata";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/wisata', $data);
        $this->load->view('home/template/footer');
    }


    public function detail($id) //menerima parameter id dari post
    {
        $cari = $this->input->get('cari');
        $data['cari'] = $cari;
        $data['navbar'] = "wisata";

        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['wisata'] = $this->db->get_where('wisata', ['id_wisata' => $id])->row_array();
        $data['judul'] = "Wisata - Detail";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-wisata', $data);
        $this->load->view('home/template/footer');
    }

    public function tambahKomentar($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'komentar' => $this->input->post('komentar'),
            'id_wisata' => $id
        ];

        $result = $this->db->insert('komentar', $data);
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function tampilKomentar($id)
    {
        $this->db->where('id_wisata', $id);
        $komentar = $this->db->get('komentar')->result_array();
        echo json_encode($komentar);
    }
}
