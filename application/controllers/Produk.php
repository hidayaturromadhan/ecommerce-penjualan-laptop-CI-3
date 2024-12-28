<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    // Konstruktor untuk memuat model Produk
    public function __construct() {
        parent::__construct();
        $this->load->model('Produk_data');  // Memuat model Produk
        $this->load->library('upload');   // Library untuk upload file
    }

     // Menampilkan daftar produk
     public function index() {

        // Mengambil semua data produk dari model
        $data['produk'] = $this->Produk_data->get_all_produk();
        
        // Title halaman
        $data['title'] = "Daftar Produk";

        // Memuat views dengan template
        $this->load->view('adminviews/template/vheader', $data);
        $this->load->view('adminviews/template/vsidebar', $data);
        $this->load->view('adminviews/template/vnavbar', $data);
        $this->load->view('adminviews/produk/index', $data); // Konten utama
        $this->load->view('adminviews/template/vfooter', $data);
    }

    public function search() {
        // Ambil kata kunci pencarian dari input
        $search = $this->input->get('search');
    
        // Jika ada kata kunci pencarian, filter produk berdasarkan nama produk
        if ($search) {
            $data['produk'] = $this->Produk_data->search_produk($search);
        } else {
            // Jika tidak ada pencarian, tampilkan semua produk
            $data['produk'] = $this->Produk_data->get_all_produk();
        }
    
        // Load view dengan data produk
        $this->load->view('adminviews/template/vheader');
        $this->load->view('adminviews/template/vsidebar');
        $this->load->view('adminviews/template/vnavbar', $data);
        $this->load->view('adminviews/produk/index', $data);
        $this->load->view('adminviews/template/vfooter');
    }
    

    // Tampilkan form create
    public function create() {
        $this->load->view('adminviews/template/vheader');
        $this->load->view('adminviews/template/vsidebar');
        $this->load->view('adminviews/template/vnavbar');
        $this->load->view('adminviews/produk/create');
        $this->load->view('adminviews/template/vfooter');
    }

    // Proses penyimpanan data
    public function store() {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10048; // Maksimal 10MB
        $this->upload->initialize($config);

        if ($this->upload->do_upload('gambar')) {
            $fileData = $this->upload->data();
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'brand' => $this->input->post('brand'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'gambar' => $fileData['file_name']
            ];

            $this->Produk_data->insert($data); // Panggil model untuk menyimpan data
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan');
            redirect('produk');
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('produk/create');
        }
    }

    public function edit($id) {
        // Ambil data produk berdasarkan ID
        $data['produk'] = $this->Produk_data->get_by_id($id);
    
        if (!$data['produk']) {
            show_404(); // Jika data tidak ditemukan, tampilkan halaman 404
        }
    
        // Load view untuk form edit
        $this->load->view('adminviews/template/vheader');
        $this->load->view('adminviews/template/vsidebar');
        $this->load->view('adminviews/template/vnavbar');
        $this->load->view('adminviews/produk/edit', $data);
        $this->load->view('adminviews/template/vfooter');
    }
    
    public function update($id) {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 10048; // Maksimal 10MB
        $this->upload->initialize($config);
    
        // Data input dari form
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'brand' => $this->input->post('brand'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
        ];
    
        // Cek apakah ada file gambar yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            if ($this->upload->do_upload('gambar')) {
                $fileData = $this->upload->data();
                $data['gambar'] = $fileData['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('produk/edit/' . $id);
            }
        }
    
        // Update data di database
        $this->Produk_data->update($id, $data);
        $this->session->set_flashdata('success', 'Produk berhasil diperbarui');
        redirect('produk');
    }
    

    public function delete($id) {
        // Cek apakah produk ada di database
        $produk = $this->Produk_data->get_by_id($id);
        
        if (!$produk) {
            show_404(); // Jika produk tidak ditemukan, tampilkan halaman 404
        }
    
        // Hapus gambar produk jika ada
        if (file_exists('./assets/images/' . $produk['gambar']) && $produk['gambar']) {
            unlink('./assets/images/' . $produk['gambar']); // Menghapus gambar produk
        }
    
        // Hapus data produk dari database
        $this->Produk_data->delete($id);
        
        // Set pesan sukses dan redirect ke halaman produk
        $this->session->set_flashdata('success', 'Produk berhasil dihapus');
        redirect('produk');
    }
}
