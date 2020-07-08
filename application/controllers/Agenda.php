<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/pariwisata/agenda/index';

        $config['total_rows'] = $this->db->get('agenda')->num_rows();
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
        $this->db->order_by('id_agenda', 'DESC');
        $this->db->like('nama_agenda', $cari);

        $agenda = $this->db->get('agenda', $config['per_page'], $data['start'])->result_array();
        $data['agenda'] = $agenda;
        $data['judul'] = "agenda";
        $data['cari'] = $cari;
        $data['navbar'] = "agenda";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/agenda', $data);
        $this->load->view('home/template/footer');
    }


    public function detail($id) //menerima parameter id dari post
    {
        $cari = $this->input->get('cari');
        $data['cari'] = $cari;
        $data['navbar'] = "agenda";

        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['agenda'] = $this->db->get_where('agenda', ['id_agenda' => $id])->row_array();
        $data['judul'] = "agenda - Detail";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-agenda', $data);
        $this->load->view('home/template/footer');
    }
}
