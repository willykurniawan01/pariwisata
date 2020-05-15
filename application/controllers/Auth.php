<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('status') == "login") {
            if ($this->session->userdata('role') == 1) {
                redirect('admin');
            } else {
                echo "fitur blm ada";
            }
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('password', 'Password', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('auth');
            } else {
                $this->_login();
            }
        }
    }
    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'role' => $user['role'],
                    'status' => "login"
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 1) {
                    redirect('admin');
                } else {
                    echo "Fitur ini belum tersedia";
                }
            } else {
                redirect('home');
            }
        } else {
            redirect('home');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout</div>');
        redirect('home');
    }
}
