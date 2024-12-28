<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_data extends CI_Model {

    // Mendapatkan semua produk
    public function get_all_produk() {
        return $this->db->get('produk')->result_array();  // Mengambil semua data dari tabel produk
    }
    
    // Mendapatkan produk berdasarkan ID
    public function get_produk_by_id($id) {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();  // Mengambil data produk berdasarkan ID
    }

    public function getProductById($id_produk) {
        // Query untuk mengambil produk berdasarkan ID
        $query = $this->db->get_where('produk', ['id_produk' => $id_produk]);
        
        // Mengembalikan data produk atau null jika tidak ditemukan
        return $query->row_array();
    }

    // Menambahkan produk baru
    public function insert($data) {
        return $this->db->insert('produk', $data);
    }

    public function search_produk($search) {
        // Gunakan LIKE untuk mencari produk berdasarkan nama produk
        $this->db->like('nama_produk', $search); // 'nama_produk' adalah nama kolom yang akan dicari
        $query = $this->db->get('produk'); // 'produk' adalah nama tabel
        return $query->result_array(); // Mengembalikan hasil pencarian
    }
    
    
    public function get_by_id($id) {
        return $this->db->get_where('produk', ['id_produk' => $id])->row_array();
    
    }
    public function update($id, $data) {
        $this->db->where('id_produk', $id);
        return $this->db->update('produk', $data);
    }

    public function delete($id) {
        $this->db->where('id_produk', $id);
        return $this->db->delete('produk');
    }
    
}
