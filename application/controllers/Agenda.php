<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agenda extends CI_Controller
{

    public function index()
    {
        $data['navbar'] = "Agenda";
        $data['judul'] = "Agenda";
        $this->load->view('home/template/header', $data);
        $this->load->view('home/template/navbar', $data);
        $this->load->view('home/agenda', $data);
        $this->load->view('home/template/footer');
    }
}
