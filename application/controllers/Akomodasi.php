<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akomodasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('nama model', 'berita');
    }

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariakomodasi/akomodasi/index';

        $config['total_rows'] = $this->db->get('akomodasi')->num_rows();
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
        $this->db->order_by('id_akomodasi', 'DESC');
        $this->db->like('nama_akomodasi', $cari);

        $akomodasi = $this->db->get('akomodasi', $config['per_page'], $data['start'])->result_array();
        $data['akomodasi'] = $akomodasi;
        $data['judul'] = "Akomodasi";
        $data['cari'] = $cari;
        $data['navbar'] = "akomodasi";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/akomodasi', $data);
        $this->load->view('home/template/footer');
    }


    public function detail($id) //menerima parameter id dari post
    {
        $cari = $this->input->get('cari');
        $data['cari'] = $cari;
        $data['navbar'] = "akomodasi";

        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['akomodasi'] = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row_array();
        $data['judul'] = "Detail Akomodasi";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-akomodasi', $data);
        $this->load->view('home/template/footer');
    }

    public function tambahKomentar($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'komentar' => $this->input->post('komentar'),
            'id_akomodasi' => $id
        ];

        $result = $this->db->insert('komentar', $data);
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function tampilKomentar($id)
    {
        $this->db->where('id_akomodasi', $id);
        $komentar = $this->db->get('komentar')->result_array();
        echo json_encode($komentar);
    }
}
