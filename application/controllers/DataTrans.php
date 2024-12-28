<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataTrans extends CI_Controller {

    // Konstruktor untuk memuat model Transaksi_data
    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_data');  // Memuat model Transaksi_data
    }

    // Menampilkan daftar transaksi
    public function index() {
        // Mengambil semua data transaksi dari model
        $data['transaksi'] = $this->Transaksi_data->get_all_transaksi();

        // Title halaman
        $data['title'] = "Daftar Transaksi";

        // Memuat views dengan template
        $this->load->view('adminviews/template/vheader', $data);
        $this->load->view('adminviews/template/vsidebar', $data);
        $this->load->view('adminviews/template/vnavbar', $data);
        $this->load->view('adminviews/transaksi/index', $data); // Konten utama
        $this->load->view('adminviews/template/vfooter', $data);
    }
    // Fungsi untuk update status transaksi
    public function update_status($id_transaksi, $status) {
        // Validasi status yang diterima
        if (!in_array($status, ['Batal', 'Selesai'])) {
            show_error('Status tidak valid');
        }

        // Update status transaksi di database
        $this->Transaksi_data->update_status($id_transaksi, $status);

        // Redirect kembali ke daftar transaksi
        redirect('admin/transaksi');
    }
}
?>
