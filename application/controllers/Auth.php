<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
    }
    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }
        $this->load->view('login/login.php');
    }
    function login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $hasil = $this->M_login->login($username,$password);
        if($hasil){
            $session_data =[
                'id_user' => $hasil->id_user,
                'username' => $hasil->username,
                'role' => $hasil->role,
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data);
            redirect('dashboard');
        }else {
            redirect('auth');
        }

       
    }

    public function logout() {
        // Hapus semua data session
        $this->session->sess_destroy();
        
        // Redirect ke halaman login
        redirect('login');
    }
}
?>

