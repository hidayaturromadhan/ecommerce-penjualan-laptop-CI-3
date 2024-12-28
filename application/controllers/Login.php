<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation'); // Muat library form validation
        $this->load->model('Admin_data');        // Pastikan model juga dimuat
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('adminviews/login'); // Tampilkan form login dengan error
        } else {
            // Logika login
        }
    }

    public function auth() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); // Hash password dengan MD5
    
        // Memanggil model Admin_data untuk verifikasi login
        $admin = $this->Admin_data->login($username, $password);
    
        if ($admin) {
            // Menyimpan data ke session
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'username' => $admin->username,
                'id_admin' => $admin->id_admin
            ]);
    
            redirect('adminpage'); // Arahkan ke halaman admin jika login berhasil
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login'); // Arahkan kembali ke halaman login jika gagal
        }
    }
    
    // Fungsi untuk logout
    public function logout() {
        $this->session->unset_admindata('logged_in');
        $this->session->unset_admindata('username');
        $this->session->unset_admindata('id_admin');
        redirect('login');
    }
}
