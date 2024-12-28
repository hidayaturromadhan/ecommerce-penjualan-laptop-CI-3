<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataUser extends CI_Controller {

    // Konstruktor untuk memuat model User
    public function __construct() {
        parent::__construct();
        $this->load->model('User_data');  // Memuat model Produk

    }

     // Menampilkan daftar produk
     public function index() {

        // Mengambil semua data produk dari model
        $data['user'] = $this->User_data->get_all_user();
        
        // Title halaman
        $data['title'] = "Daftar User";

        // Memuat views dengan template
        $this->load->view('adminviews/template/vheader', $data);
        $this->load->view('adminviews/template/vsidebar', $data);
        $this->load->view('adminviews/template/vnavbar', $data);
        $this->load->view('adminviews/user/index', $data); // Konten utama
        $this->load->view('adminviews/template/vfooter', $data);
    }

}