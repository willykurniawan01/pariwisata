<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SeniBudaya extends CI_Controller
{

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/senibudaya/index';

        $config['total_rows'] = $this->db->get('seni_budaya')->num_rows();
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
        $this->db->order_by('id', 'DESC');
        $this->db->like('nama_seni', $cari);

        $senibudaya = $this->db->get('seni_budaya', $config['per_page'], $data['start'])->result_array();
        $data['senibudaya'] = $senibudaya;
        $data['judul'] = "Seni Budaya";
        $data['cari'] = $cari;
        $data['navbar'] = "Seni Budaya";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/senibudaya', $data);
        $this->load->view('home/template/footer');
    }

    public function detail($id) //menerima parameter id dari post
    {
        $cari = $this->input->get('cari');
        $data['cari'] = $cari;
        $data['navbar'] = "senibudaya";
        // $detail = $this->senibudaya->getDetail($id);
        // $data['detail'] = $detail;

        $data['senibudaya'] = $this->db->get_where('seni_budaya', ['id' => $id])->row_array();
        $data['judul'] = "Seni Budaya";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-senibudaya', $data);
        $this->load->view('home/template/footer');
    }

    public function carisenibudaya()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/senibudaya/carisenibudaya';
        $this->db->like('nama_senibudaya', $this->input->get('nama_senibudaya'));
        $config['total_rows'] = $this->db->get('senibudaya')->num_rows();
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

        $cari = $this->input->get('nama_senibudaya');

        $data['start'] = $this->uri->segment(3);
        $this->db->order_by('id_senibudaya', 'DESC');
        $this->db->like('nama_senibudaya', $cari);

        $this->db->like('nama_senibudaya', $this->input->get('nama_senibudaya'));
        $senibudaya = $this->db->get('senibudaya', $config['per_page'], $data['start'])->result_array();
        $data['senibudaya'] = $senibudaya;
        $data['judul'] = "senibudaya";
        $data['cari'] = $cari;
        $data['navbar'] = "senibudaya";


        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/senibudaya', $data);
        $this->load->view('home/template/footer');
    }
}
