<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            if ($this->session->userdata('role') != 1) {
                redirect('home');
            }
        }
    }

    public function tampilan($tampilan, $data)
    {
        $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/' . $tampilan, $data);
        $this->load->view('admin/template/footer');
    }

    public function index()
    {
        $data['judul'] = "Dashboard";
        $this->tampilan('dashboard', $data);
    }

    public function pengaturanAkun()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
        $data['judul'] = "Pengaturan Akun";
        $this->tampilan('pengaturanAkun', $data);
        }else{
            if ($this->input->post('password1')) {
                echo 'password';
            }else{
                echo 'noob';
            }
        }
    }
}
