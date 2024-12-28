<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_data'); // Memuat model User_data
        $this->load->library('form_validation'); // Memuat library form validation
        $this->load->helper('form'); // Memuat form helper
    }

    public function index() {
        // Cek apakah user sudah login
        if ($this->session->userdata('logged_in')) {
            redirect('user/dashboard'); // Jika sudah login, redirect ke halaman dashboard
        }

        // Validasi form untuk username dan password
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan error
            $this->load->view('userviews/userLogin');
        } else {
            // Jika validasi berhasil, lakukan autentikasi
            $this->auth();
        }
    }

    public function auth() {
        // Ambil data dari form login
        $username = $this->input->post('username');
        $password = $this->input->post('password'); // Password dalam bentuk plaintext
        
        // Verifikasi login menggunakan model User_data
        $user = $this->User_data->loginUser($username);

        if ($user && password_verify($password, $user['password'])) {
            // Jika login berhasil dan password valid, simpan data ke session
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'user_id' => $user['id_user'],  // Menyimpan ID pengguna di sesi
                'username' => $user['username'],
            ]);
            
            // Arahkan ke halaman setelah login berhasil
            redirect('user/dashboard'); // Gantilah dengan halaman yang sesuai setelah login
        } else {
            // Jika login gagal
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login'); // Arahkan kembali ke halaman login jika gagal
        }
    }

    public function logout() {
        // Hapus session saat logout
        $this->session->sess_destroy();
        redirect('login'); // Arahkan kembali ke halaman login
    }
}
?>
