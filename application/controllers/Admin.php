<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    //method constructor 
    public function __construct()
    {
        //melakukan pengecekan session 
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            if ($this->session->userdata('role') != 1) {
                redirect('home');
            }
        }
    }

    //method untuk menampilkan
    public function tampilan($tampilan, $data)
    {
        $data['admin'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/template/topbar', $data);
        $this->load->view('admin/' . $tampilan, $data);
        $this->load->view('admin/template/footer');
    }

    //method untuk menampilkan halaman awal dashboard
    public function index()
    {
        $data['berita'] = $this->db->get('berita')->num_rows();
        $data['wisata'] = $this->db->get('wisata')->num_rows();
        $data['galeri'] = $this->db->get('galeri')->num_rows();
        $data['restoran'] = $this->db->get('restoran')->num_rows();
        $data['agenda'] = $this->db->get('agenda')->num_rows();
        $data['akomodasi'] = $this->db->get('akomodasi')->num_rows();
        $data['judul'] = "Dashboard";
        $this->tampilan('dashboard', $data);
    }

    //method untuk mengatur akun admin
    public function pengaturanAkun($foto = '')
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data['foto'] = $foto;
            $data['judul'] = "Pengaturan Akun";
            $this->tampilan('pengaturanAkun', $data);
        } else {
            $id = $this->input->post('id');
            $password = $this->input->post('password1');
            $data['username'] = $this->input->post('username');
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $this->db->update('admin', $data, ['id' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mengubah akun!</div>');
            redirect('admin/pengaturanakun');
        }
    }

    //method untuk mengganti foto profile admin
    public function gantiFoto($id)
    {
        $admin = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();

        $config['upload_path'] = './assets/admin/img/profil/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'foto-profil-' . $id;

        $this->load->library('upload', $config, 'foto');
        $this->foto->initialize($config);

        if ($this->foto->do_upload('foto')) {
            if ($admin['foto'] != 'default.png') {
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

    //Method untuk menampilkan data slider 
    public function Slider()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('subjudul', 'Subjudul', 'required|trim');

        $judul = $this->input->post('judul');
        $subjudul = $this->input->post('subjudul');

        $config['upload_path'] = './assets/admin/img/sliders/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'slider';

        $this->load->library('upload', $config, 'gambar');
        $this->gambar->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['slider'] = $this->db->get('slider')->result_array();
            $data['judul'] = "Slider";
            $this->tampilan('slider', $data);
        } else {
            if ($this->gambar->do_upload('gambar')) {
                $data = [
                    'gambar' => $this->gambar->data('file_name'),
                    'judul' => $judul,
                    'subjudul' => $subjudul
                ];
                $this->db->insert('slider', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah slider!</div>');
                redirect('admin/slider');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-4" role="alert">Gagal menambah slider!</div>');
                $data['error'] = $this->gambar->display_errors();
                $data['slider'] = $this->db->get('slider')->result_array();
                $data['judul'] = "Slider";
                $this->tampilan('slider', $data);
            }
        }
    }

    //Method untuk mengedit data slider
    public function editSlider($id, $foto = '')
    {
        $judul = $this->input->post('judul');
        $subjudul = $this->input->post('subjudul');
        $cek_gambar = $this->input->post('cek');
        $slider = $this->db->get_where('slider', ['id_slider' => $id])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('subjudul', 'SubJudul', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['slider'] = $slider;
            $data['foto'] = $foto;
            $data['id_slider'] = $id;
            $data['judul'] = "Slider";
            $this->tampilan('editslider', $data);
        } else {
            $data = [
                'judul' => $judul,
                'subjudul' => $subjudul
            ];
            if ($cek_gambar) {
                $config['upload_path'] = './assets/admin/img/sliders/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '1000000';
                $config['file_name'] = 'slider';

                $this->load->library('upload', $config, 'gambar');
                $this->gambar->initialize($config);
                if ($this->gambar->do_upload('gambar')) {
                    $link = "./assets/admin/img/sliders/";
                    unlink($link . $slider['gambar']);

                    $data = [
                        'gambar' => $this->gambar->data('file_name'),
                        'judul' => $judul,
                        'subjudul' => $subjudul
                    ];
                    $this->db->update('slider', $data, ['id_slider' => $id]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah slider!</div>');
                    redirect('admin/slider');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-4" role="alert">Gagal menambah slider!</div>');
                    $data['error'] = $this->gambar->display_errors();
                    $data['slider'] = $slider;
                    $data['foto'] = $foto;
                    $data['judul'] = "Slider";
                    $this->tampilan('editslider', $data);
                }
            }
            $this->db->update('slider', $data, ['id_slider' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah slider!</div>');
            redirect('admin/slider');
        }
    }

    //Method untuk menghapus data slider
    public function deleteSlider($id)
    {
        $slider = $this->db->get_where('slider', ['id_slider' => $id])->row_array();
        $link = "./assets/admin/img/sliders/";
        unlink($link . $slider['gambar']);
        $this->db->delete('slider', ['id_slider' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus slider!</div>');
        redirect('admin/slider');
    }


    //method untuk menampilkan halaman wisata admin
    public function wisata()
    {
        //judul pada halaman 
        $data['judul'] = "Wisata";

        //query data wisata
        $data['wisata'] = $this->db->get('wisata')->result_array();

        //menampilkan data ketegori
        $data['kategori'] = $this->db->get('kategori_wisata')->result_array();

        //query menampilkan data wisata unggulan
        $this->db->from('wisata');
        $this->db->where('unggulan', '1');
        $data['unggulan'] = $this->db->get()->result_array();



        //menampilkan view input data wisata
        $this->tampilan('wisata', $data);
    }


    //Method untuk menambah kategori galeri
    public function tambahKategoriGaleri()
    {
        $data['nama_kategori'] = $this->input->post('nama_kategori');
        $this->db->insert('kategori_galeri', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah kategori!</div>');
        redirect('admin/galeri');
    }

    //Method untuk  menghapus kategori galeri
    public function deleteKategoriGaleri($id)
    {
        $this->db->delete('kategori_galeri', ['id_kategori' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus kategori!</div>');
        redirect('admin/galeri');
    }


    //method untuk menambahkan data wisata
    public function tambahWisata()
    {
        //validasi input data wisata
        $this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('garis_bujur', 'garis_bujur', 'required|trim');
        $this->form_validation->set_rules('garis_lintang', 'garis_lintang', 'required|trim');


        //konfigurasi upload gambar
        $config['upload_path'] = './assets/home/assets/img/wisata/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'wisata';

        //load library upload
        $this->load->library('upload', $config, 'gambar');
        //inisialiasi konfigurasi
        $this->gambar->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['judul'] = "wisata";
            $this->tampilan('tambahwisata', $data);
        } else {
            if ($this->gambar->do_upload('gambar')) {
                $data = [
                    'nama_wisata' => $this->input->post('nama_wisata'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'alamat' => $this->input->post('alamat'),
                    'gambar' => $this->gambar->data('file_name'),
                    'garis_bujur' => $this->input->post('garis_bujur'),
                    'garis_lintang' => $this->input->post('garis_lintang')
                ];

                $this->db->insert('wisata', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengupload wisata!</div>');
                redirect('admin/wisata');
            } else {
                $data['error'] = $this->gambar->display_errors();
                $data['judul'] = "wisata";
                $this->tampilan('tambahwisata', $data);
            }
        }
    }

    //menambahkan wisata ke unggulan
    public function tambahWisataUnggulan($id)
    {
        $this->db->where('id_wisata', $id);
        $this->db->set('unggulan', '1');
        $this->db->update('wisata');

        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah ke unggulan!</div>');
        redirect('admin/wisata');
    }

    //menghapus wisata dari unggulan
    public function deleteWisataUnggulan($id)
    {

        $this->db->where('id_wisata', $id);
        $this->db->set('unggulan', '0');
        $this->db->update('wisata');

        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus dari unggulan!</div>');
        redirect('admin/wisata');
    }


    //method menambahkan kategori ke wisata
    public function kategoriwisata($id)
    {
        $data['id_wisata'] = $id;
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['judul'] = "wisata";
        $this->tampilan('kategoriwisata', $data);
    }

    //method menghapus kategori wisata
    public function deleteKategoriWisata($id)
    {
        $this->db->delete('rel_kategori_wisata', ['id_kategori' => $id]);
        $this->db->delete('kategori', ['id_kategori' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus kategori!</div>');
        redirect('admin/wisata');
    }

    //method untuk menambahkan kategori wisata
    public function tambahKategoriWisata()
    {
        $id_wisata = $this->input->post('id_wisata');
        $kategori = $this->input->post('kategori_wisata');

        $this->db->delete('rel_kategori_wisata', ['id_wisata' => $id_wisata]);
        foreach ($kategori as $k) {
            $data = [
                'id_wisata' => $id_wisata,
                'id_kategori' => $k
            ];
            $this->db->insert('rel_kategori_wisata', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah kategori wisata!</div>');
        redirect('admin/wisata');
    }


    //method mengedit data wisata
    public function editwisata($id, $gambar = '')
    {
        $this->form_validation->set_rules('nama_wisata', 'Nama wisata', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Wisata', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat Wisata', 'required|trim');
        $this->form_validation->set_rules('garis_bujur', 'garis_bujur', 'required|trim');
        $this->form_validation->set_rules('garis_lintang', 'garis_lintang', 'required|trim');

        $config['upload_path'] = './assets/home/assets/img/wisata/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'wisata';

        $this->load->library('upload', $config, 'gambar');
        $this->gambar->initialize($config);

        $wisata = $this->db->get_where('wisata', ['id_wisata' => $id])->row_array();
        if ($this->form_validation->run() == FALSE) {
            $data['ubahgambar'] = $gambar;
            $data['wisata'] = $wisata;
            $data['error'] = '';
            $data['judul'] = "Wisata";
            $this->tampilan('editwisata', $data);
        } else {
            if ($gambar) {
                if ($this->gambar->do_upload('gambar')) {
                    $link = "./assets/home/assets/img/wisata/";
                    unlink($link . $wisata['gambar']);

                    $data = [
                        'nama_wisata' => $this->input->post('nama_wisata'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'alamat' => $this->input->post('alamat'),
                        'gambar' => $this->gambar->data('file_name'),
                        'garis_bujur' => $this->input->post('garis_bujur'),
                        'garis_lintang' => $this->input->post('garis_lintang')
                    ];

                    $this->db->update('wisata', $data, ['id_wisata' => $id]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit wisata!</div>');
                    redirect('admin/wisata');
                } else {
                    $data['error'] = $this->gambar->display_errors();
                    $data['ubahgambar'] = $gambar;
                    $data['wisata'] = $this->db->get_where('wisata', ['id_wisata' => $id])->row_array();
                    $data['judul'] = "wisata";
                    $this->tampilan('editwisata', $data);
                }
            } else {
                $data = [
                    'nama_wisata' => $this->input->post('nama_wisata'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'alamat' => $this->input->post('alamat'),
                    'garis_bujur' => $this->input->post('garis_bujur'),
                    'garis_lintang' => $this->input->post('garis_lintang')
                ];

                $this->db->update('wisata', $data, ['id_wisata' => $id]);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit wisata!</div>');
                redirect('admin/wisata');
            }
        }
    }

    //method menghapus data wisata
    public function deletewisata($id)
    {
        $wisata = $this->db->get_where('wisata', ['id_wisata' => $id])->row_array();
        $link = "./assets/home/assets/img/wisata/";
        unlink($link . $wisata['gambar']);
        $this->db->delete('wisata', ['id_wisata' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus wisata!</div>');
        redirect('admin/wisata');
    }


    //Method untuk menampilkan dan menambah galeri
    public function galeri()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('subjudul', 'Subjudul', 'required|trim');

        $data['galeri'] = $this->db->get('galeri')->result_array();
        $data['kategori'] = $this->db->get('kategori_galeri')->result_array();

        $judul = $this->input->post('judul');
        $subjudul = $this->input->post('subjudul');
        $kategori = $this->input->post('kategori');

        $config['upload_path'] = './assets/home/assets/img/galeri/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'galeri';

        $this->load->library('upload', $config, 'gambar');
        $this->gambar->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['judul'] = "Galeri";
            $this->tampilan('galeri', $data);
        } else {
            if ($this->gambar->do_upload('gambar')) {
                $data = [
                    'gambar' => $this->gambar->data('file_name'),
                    'judul' => $judul,
                    'subjudul' => $subjudul,
                    'kategori' => $kategori
                ];
                $this->db->insert('galeri', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah galeri!</div>');
                redirect('admin/galeri');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger mt-4" role="alert">Gagal menambah galeri!</div>');
                $data['error'] = $this->gambar->display_errors();
                $data['galeri'] = $this->db->get('galeri')->result_array();
                $data['judul'] = "galeri";
                $this->tampilan('galeri', $data);
            }
        }
    }


    //Method untuk mengedit data galeri
    public function editGaleri($id, $foto = '')
    {
        $judul = $this->input->post('judul');
        $subjudul = $this->input->post('subjudul');
        $kategori = $this->input->post('kategori');

        $galeri = $this->db->get_where('galeri', ['id_galeri' => $id])->row_array();
        $list_kategori = $this->db->get('kategori_galeri')->result_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('subjudul', 'SubJudul', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['galeri'] = $galeri;
            $data['kategori'] = $list_kategori;
            $data['foto'] = $foto;
            $data['id_galeri'] = $id;
            $data['judul'] = "Galeri";
            $this->tampilan('editgaleri', $data);
        } else {
            $data = [
                'judul' => $judul,
                'subjudul' => $subjudul,
                'kategori' => $kategori
            ];
            if ($foto) {
                $config['upload_path'] = './assets/home/assets/img/galeri/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '1000000';
                $config['file_name'] = 'galeri';

                $this->load->library('upload', $config, 'gambar');
                $this->gambar->initialize($config);
                if ($this->gambar->do_upload('gambar')) {
                    $link = "./assets/home/assets/img/galeri/";
                    unlink($link . $galeri['gambar']);

                    $data = [
                        'gambar' => $this->gambar->data('file_name'),
                        'judul' => $judul,
                        'subjudul' => $subjudul,
                        'kategori' => $kategori
                    ];
                    $this->db->update('galeri', $data, ['id_galeri' => $id]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah gambar!</div>');
                    redirect('admin/galeri');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger mt-4" role="alert">Gagal menambah galeri!</div>');
                    $data['error'] = $this->gambar->display_errors();
                    $data['galeri'] = $galeri;
                    $data['kategori'] = $list_kategori;
                    $data['foto'] = $foto;
                    $data['judul'] = "Galeri";
                    $this->tampilan('editgaleri', $data);
                }
            }
            $this->db->update('galeri', $data, ['id_galeri' => $id]);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengubah galeri!</div>');
            redirect('admin/galeri');
        }
    }

    //Method untuk menghapus data galeri
    public function deleteGaleri($id)
    {
        $galeri = $this->db->get_where('galeri', ['id_galeri' => $id])->row_array();
        $link = "./assets/home/assets/img/galeri/";
        unlink($link . $galeri['gambar']);
        $this->db->delete('galeri', ['id_galeri' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus galeri!</div>');
        redirect('admin/galeri');
    }


    //method untuk menampilkan halaman restoran admin
    public function restoran()
    {
        //judul pada halaman 
        $data['judul'] = "Restoran";

        //query data restoran
        $data['restoran'] = $this->db->get('restoran')->result_array();


        //menampilkan view input data restoran
        $this->tampilan('restoran', $data);
    }


    //method tambah data restoran
    public function tambahRestoran()
    {
        //validasi input data restoran
        $this->form_validation->set_rules('nama_restoran', 'Nama restoran', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('garis_bujur', 'garis_bujur', 'required|trim');
        $this->form_validation->set_rules('garis_lintang', 'garis_lintang', 'required|trim');



        //konfigurasi upload gambar
        $config['upload_path'] = './assets/home/assets/img/restoran/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'restoran';

        //load library upload
        $this->load->library('upload', $config, 'gambar');
        //inisialiasi konfigurasi
        $this->gambar->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['judul'] = "restoran";
            $this->tampilan('tambahrestoran', $data);
        } else {
            if ($this->gambar->do_upload('gambar')) {
                $data = [
                    'nama_restoran' => $this->input->post('nama_restoran'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'alamat' => $this->input->post('alamat'),
                    'gambar' => $this->gambar->data('file_name'),
                    'garis_bujur' => $this->input->post('garis_bujur'),
                    'garis_lintang' => $this->input->post('garis_lintang')
                ];

                $this->db->insert('restoran', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengupload restoran!</div>');
                redirect('admin/restoran');
            } else {
                $data['error'] = $this->gambar->display_errors();
                $data['judul'] = "restoran";
                $this->tampilan('tambahrestoran', $data);
            }
        }
    }

    //method untuk menghapus data restoran
    public function deleteRestoran($id)
    {
        $restoran = $this->db->get_where('restoran', ['id_restoran' => $id])->row_array();
        $link = "./assets/home/assets/img/restoran/";
        unlink($link . $restoran['gambar']);
        $this->db->delete('restoran', ['id_restoran' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus restoran!</div>');
        redirect('admin/restoran');
    }

    //method mengedit data restoran
    public function editRestoran($id, $gambar = '')
    {
        $this->form_validation->set_rules('nama_restoran', 'Nama restoran', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi restoran', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat restoran', 'required|trim');
        $this->form_validation->set_rules('garis_bujur', 'garis_bujur', 'required|trim');
        $this->form_validation->set_rules('garis_lintang', 'garis_lintang', 'required|trim');



        $config['upload_path'] = './assets/home/assets/img/restoran/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'restoran';

        $this->load->library('upload', $config, 'gambar');
        $this->gambar->initialize($config);

        $restoran = $this->db->get_where('restoran', ['id_restoran' => $id])->row_array();
        if ($this->form_validation->run() == FALSE) {
            $data['ubahgambar'] = $gambar;
            $data['restoran'] = $restoran;
            $data['error'] = '';
            $data['judul'] = "restoran";
            $this->tampilan('editrestoran', $data);
        } else {
            if ($gambar) {
                if ($this->gambar->do_upload('gambar')) {
                    $link = "./assets/home/assets/img/restoran/";
                    unlink($link . $restoran['gambar']);

                    $data = [
                        'nama_restoran' => $this->input->post('nama_restoran'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'alamat' => $this->input->post('alamat'),
                        'gambar' => $this->gambar->data('file_name'),
                        'garis_bujur' => $this->input->post('garis_bujur'),
                        'garis_lintang' => $this->input->post('garis_lintang')
                    ];

                    $this->db->update('restoran', $data, ['id_restoran' => $id]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit restoran!</div>');
                    redirect('admin/restoran');
                } else {
                    $data['error'] = $this->gambar->display_errors();
                    $data['ubahgambar'] = $gambar;
                    $data['restoran'] = $this->db->get_where('restoran', ['id_restoran' => $id])->row_array();
                    $data['judul'] = "restoran";
                    $this->tampilan('editrestoran', $data);
                }
            } else {
                $data = [
                    'nama_restoran' => $this->input->post('nama_restoran'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'alamat' => $this->input->post('alamat'),
                    'garis_bujur' => $this->input->post('garis_bujur'),
                    'garis_lintang' => $this->input->post('garis_lintang')
                ];

                $this->db->update('restoran', $data, ['id_restoran' => $id]);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit restoran!</div>');
                redirect('admin/restoran');
            }
        }
    }




    //method untuk menampilkan halaman restoran admin
    public function agenda()
    {
        //judul pada halaman 
        $data['judul'] = "Agenda";

        //query data agenda
        $data['agenda'] = $this->db->get('agenda')->result_array();


        //menampilkan view input data agenda
        $this->tampilan('agenda', $data);
    }


    //method untuk menambahkan data agenda
    public function tambahAgenda()
    {
        //validasi input data agenda
        $this->form_validation->set_rules('nama_agenda', 'Nama agenda', 'required|trim');
        $this->form_validation->set_rules('isi_agenda', 'Isi Agenda', 'required|trim');
        $this->form_validation->set_rules('tanggal_agenda', 'Tanggal Agenda', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['judul'] = "Agenda";
            $this->tampilan('tambahagenda', $data);
        } else {
            $agenda = [
                'nama_agenda' => $this->input->post('nama_agenda'),
                'isi_agenda' => $this->input->post('isi_agenda'),
                'tanggal_agenda' => $this->input->post('tanggal_agenda')
            ];

            $this->db->insert('agenda', $agenda);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambahkan agenda!</div>');
            redirect('admin/agenda');
        }
    }

    //method untuk menghapus agenda
    public function deleteAgenda($id)
    {
        $this->db->where('id_agenda', $id);
        $this->db->delete('agenda');

        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus agenda!</div>');
        redirect('admin/agenda');
    }

    //method untuk mengedit agenda
    public function editAgenda($id)
    {
        //validasi input data agenda
        $this->form_validation->set_rules('nama_agenda', 'Nama agenda', 'required|trim');
        $this->form_validation->set_rules('isi_agenda', 'Isi Agenda', 'required|trim');
        $this->form_validation->set_rules('tanggal_agenda', 'Tanggal Agenda', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['judul'] = "Agenda";
            $agenda = $this->db->get_where('agenda', ['id_agenda' => $id])->row_array();
            $data['agenda'] = $agenda;
            $this->tampilan('editagenda', $data);
        } else {
            $agenda = [
                'nama_agenda' => $this->input->post('nama_agenda'),
                'isi_agenda' => $this->input->post('isi_agenda'),
                'tanggal_agenda' => $this->input->post('tanggal_agenda')
            ];

            $this->db->update('agenda', $agenda);
            $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengupdate agenda!</div>');
            redirect('admin/agenda');
        }
    }



    //method untuk menampilkan halaman akomodasi
    public function akomodasi()
    {
        //judul pada halaman 
        $data['judul'] = "Akomodasi";

        //query data akomodasi
        $data['akomodasi'] = $this->db->get('akomodasi')->result_array();


        //menampilkan view input data akomodasi
        $this->tampilan('akomodasi', $data);
    }

    //method tambah data akomodasi
    public function tambahAkomodasi()
    {
        //validasi input data akomodasi
        $this->form_validation->set_rules('nama_akomodasi', 'Nama akomodasi', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('garis_bujur', 'garis_bujur', 'required|trim');
        $this->form_validation->set_rules('garis_lintang', 'garis_lintang', 'required|trim');


        //konfigurasi upload gambar
        $config['upload_path'] = './assets/home/assets/img/akomodasi/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'akomodasi';

        //load library upload
        $this->load->library('upload', $config, 'gambar');
        //inisialiasi konfigurasi
        $this->gambar->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['judul'] = "akomodasi";
            $this->tampilan('tambahakomodasi', $data);
        } else {
            if ($this->gambar->do_upload('gambar')) {
                $data = [
                    'nama_akomodasi' => $this->input->post('nama_akomodasi'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'alamat' => $this->input->post('alamat'),
                    'gambar' => $this->gambar->data('file_name'),
                    'garis_bujur' => $this->input->post('garis_bujur'),
                    'garis_lintang' => $this->input->post('garis_lintang')
                ];

                $this->db->insert('akomodasi', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengupload akomodasi!</div>');
                redirect('admin/akomodasi');
            } else {
                $data['error'] = $this->gambar->display_errors();
                $data['judul'] = "akomodasi";
                $this->tampilan('tambahakomodasi', $data);
            }
        }
    }

    //method untuk menghapus data akomodasi
    public function deleteakomodasi($id)
    {
        $akomodasi = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row_array();
        $link = "./assets/home/assets/img/akomodasi/";
        unlink($link . $akomodasi['gambar']);
        $this->db->delete('akomodasi', ['id_akomodasi' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus akomodasi!</div>');
        redirect('admin/akomodasi');
    }

    //method mengedit data akomodasi
    public function editakomodasi($id, $gambar = '')
    {
        $this->form_validation->set_rules('nama_akomodasi', 'Nama akomodasi', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi akomodasi', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat akomodasi', 'required|trim');
        $this->form_validation->set_rules('garis_bujur', 'garis_bujur', 'required|trim');
        $this->form_validation->set_rules('garis_lintang', 'garis_lintang', 'required|trim');

        $config['upload_path'] = './assets/home/assets/img/akomodasi/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'akomodasi';

        $this->load->library('upload', $config, 'gambar');
        $this->gambar->initialize($config);

        $akomodasi = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row_array();
        if ($this->form_validation->run() == FALSE) {
            $data['ubahgambar'] = $gambar;
            $data['akomodasi'] = $akomodasi;
            $data['error'] = '';
            $data['judul'] = "Akomodasi";
            $this->tampilan('editakomodasi', $data);
        } else {
            if ($gambar) {
                if ($this->gambar->do_upload('gambar')) {
                    $link = "./assets/home/assets/img/akomodasi/";
                    unlink($link . $akomodasi['gambar']);

                    $data = [
                        'nama_akomodasi' => $this->input->post('nama_akomodasi'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'alamat' => $this->input->post('alamat'),
                        'gambar' => $this->gambar->data('file_name'),
                        'garis_bujur' => $this->input->post('garis_bujur'),
                        'garis_lintang' => $this->input->post('garis_lintang')
                    ];

                    $this->db->update('akomodasi', $data, ['id_akomodasi' => $id]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit akomodasi!</div>');
                    redirect('admin/akomodasi');
                } else {
                    $data['error'] = $this->gambar->display_errors();
                    $data['ubahgambar'] = $gambar;
                    $data['akomodasi'] = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row_array();
                    $data['judul'] = "akomodasi";
                    $this->tampilan('editakomodasi', $data);
                }
            } else {
                $data = [
                    'nama_akomodasi' => $this->input->post('nama_akomodasi'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'alamat' => $this->input->post('alamat'),
                    'garis_bujur' => $this->input->post('garis_bujur'),
                    'garis_lintang' => $this->input->post('garis_lintang')
                ];

                $this->db->update('akomodasi', $data, ['id_akomodasi' => $id]);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit akomodasi!</div>');
                redirect('admin/akomodasi');
            }
        }
    }

    public function berita()
    {
        $data['judul'] = "Berita";
        $data['kategori'] = $this->db->get('kategori_berita')->result_array();
        $data['berita'] = $this->db->get('berita')->result_array();
        $this->tampilan('berita', $data);
    }

    public function tambahKategoriBerita()
    {
        $id_berita = $this->input->post('id_berita');
        $kategori = $this->input->post('kategori');

        $this->db->delete('rel_kategori_berita', ['id_berita' => $id_berita]);
        foreach ($kategori as $k) {
            $data = [
                'id_berita' => $id_berita,
                'id_kategori' => $k
            ];
            $this->db->insert('rel_kategori_berita', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah kategori berita!</div>');
        redirect('admin/berita');
    }

    public function deleteKategoriBerita($id)
    {
        $this->db->delete('rel_kategori_berita', ['id_kategori' => $id]);
        $this->db->delete('kategori_berita', ['id_kategori' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus kategori!</div>');
        redirect('admin/berita');
    }

    public function tambahBerita()
    {
        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi Berita', 'required|trim');

        $config['upload_path'] = './assets/home/assets/img/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'berita';

        $this->load->library('upload', $config, 'gambar');
        $this->gambar->initialize($config);

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['judul'] = "Berita";
            $this->tampilan('tambahberita', $data);
        } else {
            if ($this->gambar->do_upload('gambar')) {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi'),
                    'gambar' => $this->gambar->data('file_name')
                ];

                $this->db->insert('berita', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengupload Berita!</div>');
                redirect('admin/berita');
            } else {
                $data['error'] = $this->gambar->display_errors();
                $data['judul'] = "Berita";
                $this->tampilan('tambahberita', $data);
            }
        }
    }

    public function kategoriBerita($id)
    {
        $data['id_berita'] = $id;
        $data['kategori'] = $this->db->get('kategori_berita')->result_array();
        $data['judul'] = "Berita";
        $this->tampilan('kategoriberita', $data);
    }

    public function editBerita($id, $gambar = '')
    {
        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi Berita', 'required|trim');

        $config['upload_path'] = './assets/home/assets/img/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '1000000';
        $config['file_name'] = 'berita';

        $this->load->library('upload', $config, 'gambar');
        $this->gambar->initialize($config);

        $berita = $this->db->get_where('berita', ['id_berita' => $id])->row_array();
        // $cek_gambar = $this->input->post('cek');
        if ($this->form_validation->run() == FALSE) {
            $data['ubahgambar'] = $gambar;
            $data['berita'] = $berita;
            $data['error'] = '';
            $data['judul'] = "Berita";
            $this->tampilan('editberita', $data);
        } else {
            if ($gambar) {
                if ($this->gambar->do_upload('gambar')) {
                    $link = "./assets/home/assets/img/berita/";
                    unlink($link . $berita['gambar']);

                    $data = [
                        'judul' => $this->input->post('judul'),
                        'isi' => $this->input->post('isi'),
                        'gambar' => $this->gambar->data('file_name')
                    ];

                    $this->db->update('berita', $data, ['id_berita' => $id]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit Berita!</div>');
                    redirect('admin/berita');
                } else {
                    $data['error'] = $this->gambar->display_errors();
                    $data['ubahgambar'] = $gambar;
                    $data['berita'] = $this->db->get_where('berita', ['id_berita' => $id])->row_array();
                    $data['judul'] = "Berita";
                    $this->tampilan('editberita', $data);
                }
            } else {
                $data = [
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi')
                ];

                $this->db->update('berita', $data, ['id_berita' => $id]);
                $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil mengedit Berita!</div>');
                redirect('admin/berita');
            }
        }
    }

    public function deleteBerita($id)
    {
        $berita = $this->db->get_where('berita', ['id_berita' => $id])->row_array();
        $link = "./assets/home/assets/img/berita/";
        unlink($link . $berita['gambar']);
        $this->db->delete('berita', ['id_berita' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus berita!</div>');
        redirect('admin/berita');
    }
}
