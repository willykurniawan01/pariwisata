<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('nama model', 'berita');
    }

    public function index()
    {
        //pagination config
        $config['base_url'] = 'http://localhost/smp-masmur/berita/index';
        // $config['total_rows'] = $this->berita->countBerita();
        $config['total_rows'] = $this->db->get('berita')->num_rows();
        $config['per_page'] = 4;


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

        $config['cur_tag_open'] = '<li class="page-item"> <a class="page-link bg-success text-white">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link text-success');
        $this->pagination->initialize($config);
        //end custom pagination


        $data['start'] = $this->uri->segment(3);
        $this->db->order_by('id_berita', 'DESC');
        $berita = $this->db->get('berita', $config['per_page'], $data['start'])->result_array();
        $data['berita'] = $berita;
        $data['judul'] = "Berita";

        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/berita', $data);
        $this->load->view('home/template/footer');
    }


    public function detail($id) //menerima parameter id dari post
    {
        // $detail = $this->berita->getDetail($id);
        // $data['detail'] = $detail;
        $data['berita'] = $this->db->get_where('berita', ['id_berita' => $id])->row_array();
        $data['judul'] = "Berita";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/single-berita', $data);
        $this->load->view('home/template/footer');
    }

    function fetch()
    {
        $output = '';
        $query = '';
        $this->load->model('ajaxsearch_model');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->ajaxsearch_model->fetch_data($query);

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $output .= '
        <table class="table table-bordered table-striped">
         <tr>
          <td>' . $row->id_berita . '</td>
          <td>' . $row->judul . '</td>
          <td>' . $row->isi . '</td>
          <td>' . $row->gambar . '</td>
          <td>' . $row->datetime  . '</td>
         </tr>
       ';
            }
        } else {
            $output .= '<tr>
          <td colspan="5">No Data Found</td>
         </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
}
