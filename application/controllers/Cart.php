<?php
class Cart extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        // Memuat model yang diperlukan
        $this->load->model('Produk_data');
        $this->load->library('session');
    }

    public function index()
    {
        // Mendapatkan data keranjang
        $cart_items = $this->session->userdata('cart') ?? [];
        $data['cart_items'] = $cart_items;

        // Menampilkan halaman keranjang
        $this->load->view('userviews/navbar/header');
        $this->load->view('userviews/navbar/top');
        $this->load->view('userviews/navbar/navbar');
        $this->load->view('userviews/cart', $data);
        $this->load->view('userviews/navbar/footer');
    }

    public function addToCart() {
        $id_produk = $this->input->post('id_produk');
        $product = $this->Produk_data->getProductById($id_produk);

        if ($product) {
            // Pastikan produk memiliki gambar
            if (!isset($product['gambar'])) {
                // Jika gambar tidak ada, set gambar default atau tampilkan pesan error
                $product['gambar'] = 'default.jpg'; // Gambar default jika tidak ada
            }
            
            // Mendapatkan data keranjang dari sesi atau membuat array baru jika kosong
            $cart = $this->session->userdata('cart') ?? [];
        
            // Menambahkan produk ke dalam keranjang
            $cart[$id_produk] = [
                'id_produk' => $product['id_produk'],
                'kuantitas' => 1, // Kuantitas produk
                'harga' => $product['harga'],
                'nama_produk' => $product['nama_produk'],
                'gambar' => $product['gambar'] // Pastikan gambar ada
            ];
        
            // Menyimpan kembali data keranjang ke dalam sesi
            $this->session->set_userdata('cart', $cart);
        
            // Redirect ke halaman keranjang
            redirect('cart');
        }
    }

    public function cart() {
        // Mendapatkan data keranjang
        $cart = $this->session->userdata('cart') ?? [];

        if (empty($cart)) {
            echo "Keranjang kosong.";
        } else {
            foreach ($cart as $item) {
                echo "Nama Produk: " . $item['nama_produk'] . "<br>";
                echo "Harga: Rp " . number_format($item['harga'], 0, ',', '.') . "<br>";
                echo "Kuantitas: " . $item['kuantitas'] . "<br>";
                echo "<hr>";
            }
        }
    }

    public function update_quantity($id_produk)
    {
        $quantity = $this->input->post('kuantitas');
        if ($quantity > 0) {
            // Mendapatkan data keranjang dari session
            $cart = $this->session->userdata('cart');
            if (isset($cart[$id_produk])) {
                // Memperbarui kuantitas produk
                $cart[$id_produk]['kuantitas'] = $quantity;
                $this->session->set_userdata('cart', $cart);
            }
        }
        redirect('cart');
    }

    public function remove($id_produk)
    {
        // Menghapus produk dari keranjang berdasarkan ID produk
        $cart = $this->session->userdata('cart');
        if (isset($cart[$id_produk])) {
            unset($cart[$id_produk]);
            $this->session->set_userdata('cart', $cart);
        }
        redirect('cart');
    }
}
?>
