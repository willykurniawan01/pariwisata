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

    public function pengaturanAkun($foto = '')
    {
        $this->form_validation->set_rules('password1', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data['foto'] = $foto;
            $data['judul'] = "Pengaturan Akun";
            $this->tampilan('pengaturanAkun', $data);
        } else {
            $id = $this->input->post('id');
            $password = $this->input->post('password1');
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $this->db->update('admin', $data, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah password!</div>');
            redirect('admin/pengaturanakun');
        }
    }

    public function gantiFoto($id)
    {
        $admin = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();

        $config['upload_path'] = './assets/admin/img/profil/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'foto-profil-'.$id;

        $this->load->library('upload', $config, 'foto');
        $this->foto->initialize($config);

        if ($this->foto->do_upload('foto')) {
            if($admin['foto'] != 'default.png'){
                $link = "./assets/admin/img/profil/";
                unlink($link . $admin['foto']);
            }
            $data['foto'] = $this->foto->data('file_name');
            $this->db->update('admin', $data, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengganti foto!</div>');
            redirect('admin/pengaturanakun');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-4" role="alert">Gagal mengupload foto!</div>');
            redirect('admin/pengaturanakun');
            
        }
    }
}
