<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpage extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_data'); // Memuat model untuk data admin
		$this->load->model('Produk_data');
		$this->load->model('User_data');

        $this->load->library('session'); // Memastikan library session digunakan

        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'You must log in to access this page.'); // Pesan error jika belum login
            redirect('login'); // Arahkan ke halaman login
        }
    }

  	public function index() {
		// Ambil data admin dari session
		$data['username'] = $this->session->userdata('username');

		// Ambil data produk dari model
		$data['produk'] = $this->Produk_data->get_all_produk(); // Pastikan model Produk_data sudah ada dan method get_all_produk() mengembalikan data yang benar
		
		// Mengambil semua data user dari model
		$data['user'] = $this->User_data->get_all_user();

		// Hitung jumlah produk
		$data['total_produk'] = count($data['produk']); // Menghitung jumlah produk

		// Hitung jumlah user
		$data['total_user'] = count($data['user']); // Menghitung jumlah user

		// Jika tidak ada data produk, Anda bisa menambahkan pengkondisian
		if ($data['produk'] === NULL) {
			$data['produk'] = [];  // Atau tampilkan pesan error
			$data['total_produk'] = 0; // Jika tidak ada produk, set total produk menjadi 0
		}

		// Load views dengan template
		$this->load->view('adminviews/template/vheader');
		$this->load->view('adminviews/template/vsidebar');
		$this->load->view('adminviews/template/vnavbar', $data); // Mengirim data username dan produk ke navbar
		$this->load->view('adminviews/vadminpage', $data); // Mengirim data produk ke halaman admin utama
		$this->load->view('adminviews/template/vfooter');
	}

}

