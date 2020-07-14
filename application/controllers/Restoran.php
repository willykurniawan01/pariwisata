<?php
defined('BASEPATH') or exit('No direct script access allowed');

class restoran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('nama model', 'berita');
    }

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/parirestoran/restoran/index';

        $config['total_rows'] = $this->db->get('restoran')->num_rows();
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
        $this->db->order_by('id_restoran', 'DESC');
        $this->db->like('nama_restoran', $cari);

        $restoran = $this->db->get('restoran', $config['per_page'], $data['start'])->result_array();
        $data['restoran'] = $restoran;
        $data['judul'] = "Restoran";
        $data['cari'] = $cari;
        $data['navbar'] = "restoran";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/restoran', $data);
        $this->load->view('home/template/footer');
    }


    public function detail($id) //menerima parameter id dari post
    {
        $cari = $this->input->get('cari');
        $data['cari'] = $cari;
        $data['navbar'] = "restoran";

        $data['restoran'] = $this->db->get_where('restoran', ['id_restoran' => $id])->row_array();
        $data['judul'] = "restoran - Detail";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-restoran', $data);
        $this->load->view('home/template/footer');
    }

    public function tambahKomentar($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'komentar' => $this->input->post('komentar'),
            'id_restoran' => $id
        ];

        $result = $this->db->insert('komentar_restoran', $data);
        if ($result) {
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function tampilKomentar($id)
    {
        $this->db->where('id_restoran', $id);
        $komentar = $this->db->get('komentar_restoran')->result_array();
        echo json_encode($komentar);
    }

    public function cariRestoran()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/restoran/carirestoran';
        $this->db->like('nama_restoran', $this->input->get('nama_restoran'));
        $config['total_rows'] = $this->db->get('restoran')->num_rows();
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

        $cari = $this->input->get('nama_restoran');

        $data['start'] = $this->uri->segment(3);
        $this->db->order_by('id_restoran', 'DESC');
        $this->db->like('nama_restoran', $cari);

        $this->db->like('nama_restoran', $this->input->get('nama_restoran'));
        $restoran = $this->db->get('restoran', $config['per_page'], $data['start'])->result_array();
        $data['restoran'] = $restoran;
        $data['judul'] = "Restoran";
        $data['cari'] = $cari;
        $data['navbar'] = "Restoran";


        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/restoran', $data);
        $this->load->view('home/template/footer');
    }
}
