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
        $data['berita'] = $this->db->get('berita')->num_rows();
        $data['galeri'] = $this->db->get('galeri')->num_rows();
        $data['judul'] = "Dashboard";
        $this->tampilan('dashboard', $data);
    }

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

    //method untuk menampilkan halaman wisata admin
    public function wisata()
    {
        //judul pada halaman 
        $data['judul'] = "Wisata";

        //query data wisata
        $data['wisata'] = $this->db->get('wisata')->result_array();
        //menampilkan view input data wisata
        $this->tampilan('wisata', $data);
    }

    public function tambahKategori()
    {
        $data['nama_kategori'] = $this->input->post('nama_kategori');
        $this->db->insert('kategori', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah kategori!</div>');
        redirect('admin/berita');
    }

    public function deleteKategoriBerita($id)
    {
        $this->db->delete('rel_kategori_berita', ['id_kategori' => $id]);
        $this->db->delete('kategori_berita', ['id_kategori' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus kategori!</div>');
        redirect('admin/berita');
    }

    public function tambahKategoriGaleri()
    {
        $data['nama_kategori'] = $this->input->post('nama_kategori');
        $this->db->insert('kategori_galeri', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menambah kategori!</div>');
        redirect('admin/galeri');
    }


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


        //konfigurasi upload gambar
        $config['upload_path'] = './assets/home/assets/img/wisata/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
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
                    'gambar' => $this->gambar->data('file_name')
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



    public function kategoriBerita($id)
    {
        $data['id_berita'] = $id;
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['judul'] = "Berita";
        $this->tampilan('kategoriberita', $data);
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

    public function deleteSlider($id)
    {
        $slider = $this->db->get_where('slider', ['id_slider' => $id])->row_array();
        $link = "./assets/admin/img/sliders/";
        unlink($link . $slider['gambar']);
        $this->db->delete('slider', ['id_slider' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus slider!</div>');
        redirect('admin/slider');
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

    public function deleteGaleri($id)
    {
        $galeri = $this->db->get_where('galeri', ['id_galeri' => $id])->row_array();
        $link = "./assets/home/assets/img/galeri/";
        unlink($link . $galeri['gambar']);
        $this->db->delete('galeri', ['id_galeri' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success mt-4" role="alert">Berhasil menghapus galeri!</div>');
        redirect('admin/galeri');
    }
}
