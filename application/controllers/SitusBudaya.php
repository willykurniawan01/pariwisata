<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SitusBudaya extends CI_Controller
{

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/situsbudaya/index';

        $config['total_rows'] = $this->db->get('situs_budaya')->num_rows();
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
        $this->db->like('nama_situs', $cari);

        $situsbudaya = $this->db->get('situs_budaya', $config['per_page'], $data['start'])->result_array();
        $data['situsbudaya'] = $situsbudaya;
        $data['judul'] = "Situs Budaya";
        $data['cari'] = $cari;
        $data['navbar'] = "Situs Budaya";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/situsbudaya', $data);
        $this->load->view('home/template/footer');
    }

    public function detail($id) //menerima parameter id dari post
    {
        $cari = $this->input->get('cari');
        $data['cari'] = $cari;
        $data['navbar'] = "situsbudaya";
        // $detail = $this->situsbudaya->getDetail($id);
        // $data['detail'] = $detail;

        $data['situsbudaya'] = $this->db->get_where('situs_budaya', ['id' => $id])->row_array();
        $data['judul'] = "Seni Budaya";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-situsbudaya', $data);
        $this->load->view('home/template/footer');
    }

    public function carisitusbudaya()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/situsbudaya/carisitusbudaya';
        $this->db->like('nama_situs', $this->input->get('nama_situs'));
        $config['total_rows'] = $this->db->get('situs_budaya')->num_rows();
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

        $cari = $this->input->get('nama_situs');

        $data['start'] = $this->uri->segment(3);
        $this->db->order_by('id', 'DESC');
        $this->db->like('nama_situs', $cari);

        $this->db->like('nama_situs', $this->input->get('nama_situs'));
        $situsbudaya = $this->db->get('situs_budaya', $config['per_page'], $data['start'])->result_array();
        $data['situsbudaya'] = $situsbudaya;
        $data['judul'] = "Situs BUdaya";
        $data['cari'] = $cari;
        $data['navbar'] = "Situs Budaya";


        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/situsbudaya', $data);
        $this->load->view('home/template/footer');
    }
}
