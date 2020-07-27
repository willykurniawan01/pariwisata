<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MakananKhas extends CI_Controller
{

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/makanankhas/index';

        $config['total_rows'] = $this->db->get('makanan_khas')->num_rows();
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
        $this->db->like('nama_makanan', $cari);

        $makanankhas = $this->db->get('makanan_khas', $config['per_page'], $data['start'])->result_array();
        $data['makanankhas'] = $makanankhas;
        $data['judul'] = "Makana Khas";
        $data['cari'] = $cari;
        $data['navbar'] = "makanankhas";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/makanankhas', $data);
        $this->load->view('home/template/footer');
    }
    public function detail($id) //menerima parameter id dari post
    {
        $cari = $this->input->get('cari');
        $data['cari'] = $cari;
        $data['navbar'] = "makanankhas";
        // $detail = $this->makanankhas->getDetail($id);
        // $data['detail'] = $detail;

        $data['makanankhas'] = $this->db->get_where('makanan_khas', ['id' => $id])->row_array();
        $data['judul'] = "Makanan Khas";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-makanankhas', $data);
        $this->load->view('home/template/footer');
    }

    public function carimakanankhas()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/makanankhas/carimakanankhas';
        $this->db->like('nama_makanan', $this->input->get('nama_makanan'));
        $config['total_rows'] = $this->db->get('makanankhas')->num_rows();
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

        $cari = $this->input->get('nama_makanan');

        $data['start'] = $this->uri->segment(3);
        $this->db->order_by('id', 'DESC');
        $this->db->like('nama_makanan', $cari);

        $this->db->like('nama_makanan', $this->input->get('nama_makanan'));
        $makanankhas = $this->db->get('makanankhas', $config['per_page'], $data['start'])->result_array();
        $data['makanankhas'] = $makanankhas;
        $data['judul'] = "Makanan Khas";
        $data['cari'] = $cari;
        $data['navbar'] = "makanankhas";


        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/makanankhas', $data);
        $this->load->view('home/template/footer');
    }
}
