
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_data extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_produk_by_brand($brand) {
        $this->db->where('brand', $brand); // Sesuaikan kolom 'brand' dengan nama kolom pada database Anda
        return $this->db->get('produk')->result_array(); // Ganti 'produk' dengan nama tabel produk Anda
    }  



    public function get_all_produk() {
        return $this->db->get('produk')->result_array(); // Ganti 'produk' sesuai dengan nama tabel Anda
    }
    
    // Mendapatkan semua user
    public function get_all_user() {
        return $this->db->get('user')->result_array();  // Mengambil semua data dari tabel user
    }

    // Fungsi untuk login
    public function loginUser($username, $password) {
        // Hash password yang disimpan di database (gunakan md5 atau metode hashing yang sesuai dengan yang digunakan di aplikasi Anda)
        $hashed_password = md5($password); // Pastikan menggunakan metode enkripsi yang sesuai
        
        // Query untuk mencari user berdasarkan username dan password yang di-hash
        $this->db->where('username', $username);
        $this->db->where('password', $hashed_password);
        $query = $this->db->get('user'); // Sesuaikan dengan nama tabel yang sesuai
        
        // Jika ada hasil, kembalikan data user
        if ($query->num_rows() == 1) {
            return $query->row_array(); // Mengembalikan data user pertama yang ditemukan
        } else {
            return false; // Jika tidak ada user yang cocok
        }
    }

    // Fungsi untuk menyimpan data registrasi user baru
    public function registerUser($data) {
        return $this->db->insert('user', $data); // Menyimpan data ke tabel user
    }

    // Fungsi untuk cek apakah username sudah terdaftar
    public function checkUsernameExists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        
        return $query->num_rows() > 0; // Mengembalikan true jika username sudah ada
    }
}
?>
