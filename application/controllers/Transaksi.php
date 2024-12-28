<?php
class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_data');
        $this->load->library('session');
        $this->load->helper('url');
    }

    // Halaman checkout yang tidak memerlukan login
    public function index() {
        $cart_items = $this->session->userdata('cart') ?? [];
        $total_price = 0;

        // Menghitung total harga
        foreach ($cart_items as $item) {
            $total_price += $item['harga'] * $item['kuantitas'];
        }

        // Kirimkan data transaksi dan cart ke view
        $data['cart_items'] = $cart_items;
        $data['total_price'] = $total_price;

        // Menampilkan halaman checkout tanpa membuat transaksi baru
        $this->load->view('userviews/navbar/header');
        $this->load->view('userviews/navbar/top');
        $this->load->view('userviews/navbar/navbar');
        $this->load->view('userviews/transaksi', $data);
        $this->load->view('userviews/navbar/footer');
    }

    // Tempat untuk melakukan pemesanan
    public function place_order() {
        // Ambil data cart
        $cart_items = $this->session->userdata('cart') ?? [];
        $total_price = 0;

        // Menghitung total harga
        foreach ($cart_items as $item) {
            $total_price += $item['harga'] * $item['kuantitas'];
        }

        // Data transaksi yang akan disimpan
        $transaction_data = [
            'id_user' => null, // Tidak menggunakan ID pengguna, biarkan null atau sesuaikan jika perlu
            'tanggal_transaksi' => date('Y-m-d H:i:s'),
            'total_harga' => $total_price,
            'status' => 'pending' // Status awal, bisa diubah setelah pembayaran diverifikasi
        ];

        // Simpan data transaksi dan ambil ID transaksi
        $transaction_id = $this->Transaksi_data->save_transaction($transaction_data);

        // Simpan detail transaksi untuk setiap produk
        foreach ($cart_items as $item) {
            $detail_data = [
                'id_transaksi' => $transaction_id,
                'id_produk' => $item['id_produk'],
                'kuantitas' => $item['kuantitas'],
                'subtotal' => $item['harga'] * $item['kuantitas'],
                'harga' => $item['harga']
            ];

            $this->Transaksi_data->save_transaction_details($detail_data);
        }

        // Menghapus keranjang setelah pesanan berhasil
        $this->session->unset_userdata('cart');

        // Arahkan ke halaman konfirmasi atau status transaksi setelah pemesanan
        redirect('transaksi/confirmation');
    }

    // Halaman konfirmasi
    public function confirmation() {
        $this->load->view('userviews/navbar/header');
        $this->load->view('userviews/navbar/top');
        $this->load->view('userviews/navbar/navbar');
        $this->load->view('userviews/confirmation');
        $this->load->view('userviews/navbar/footer');
    }
}
?>
