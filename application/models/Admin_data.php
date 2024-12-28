<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_data extends CI_Model {

    public function login($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Gunakan hashing jika diperlukan
        $query = $this->db->get('admin'); // Sesuaikan nama tabel dengan database Anda
        return $query->row();
    }
}
