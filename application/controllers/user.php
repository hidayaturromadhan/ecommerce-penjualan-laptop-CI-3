<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_data'); // Memuat model User_data
        $this->load->library('form_validation'); // Memuat library form validation
        $this->load->helper('form'); // Memuat form helper
    }

    public function login()
    {
        // Validasi form untuk username dan password
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika form validation gagal, tampilkan form login dengan error
            $this->load->view('userviews/navbar/header');
            $this->load->view('userviews/navbar/loginhead');
            $this->load->view('userviews/userLogin');
        } else {
            // Jika validasi berhasil, lakukan proses login
            $this->auth();
        }
    }

    // Fungsi untuk tampilkan halaman registrasi
    public function register()
    {
        // Validasi form untuk username, password, dan konfirmasi password
        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[user.nama]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            // Jika form validation gagal, tampilkan form registrasi dengan error
            $this->load->view('userviews/navbar/header');
            $this->load->view('userviews/navbar/loginhead');
            $this->load->view('userviews/register');
        } else {
            // Jika validasi berhasil, proses registrasi
            $this->saveUser();
        }
    }

    // Fungsi untuk menyimpan data pengguna baru
    public function saveUser()
    {
        // Ambil data dari form
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password')); // Hash password
        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
        ];

        // Simpan data ke database menggunakan model
        $isSaved = $this->User_data->registerUser($data);

        if ($isSaved) {
            // Jika berhasil disimpan, arahkan ke halaman login
            $this->session->set_flashdata('success', 'Registrasi berhasil, silakan login');
            redirect('user/login');
        } else {
            // Jika gagal, beri pesan error
            $this->session->set_flashdata('error', 'Terjadi kesalahan, coba lagi');
            redirect('user/register');
        }
    }

    public function auth()
    {
        // Ambil data username dan password dari form
        $username = $this->input->post('username');
        $password = $this->input->post('password'); // Password yang dimasukkan user

        // Verifikasi login menggunakan model User_data
        $user = $this->User_data->loginUser($username, $password);

        if ($user) {
            // Jika login berhasil, simpan data ke session
            $this->session->set_userdata([
                'logged_in' => TRUE,
                'username' => $user['username'],
                'id_user' => $user['id_user']
            ]);

            // Arahkan ke halaman home setelah login berhasil
            redirect('user'); // Gantilah dengan halaman yang sesuai setelah login
        } else {
            // Jika login gagal, beri pesan error dan kembalikan ke halaman login
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('user/login');
        }
    }

    public function logout()
    {
        // Menghapus session ketika user logout
        $this->session->sess_destroy();
        redirect('user/login'); // Arahkan ke halaman login
    }

    function index()
    {
        $this->load->model('User_data');

        // Mendapatkan filter dari URL, default-nya adalah null jika tidak ada filter
        $brand_filter = $this->input->get('brand'); 

        // Mendapatkan data produk sesuai filter
        if ($brand_filter) {
            $data['result'] = $this->User_data->get_produk_by_brand($brand_filter); // Produk berdasarkan brand
        } else {
            $data['result'] = $this->User_data->get_all_produk(); // Semua produk
        }

        // Kirimkan brand_filter ke view
        $data['brand_filter'] = $brand_filter;

        $this->load->view('userviews/navbar/header');
        $this->load->view('userviews/navbar/top');
        $this->load->view('userviews/navbar/navbar');
        $this->load->view('userviews/home', $data);
        $this->load->view('userviews/navbar/footer');
    }


    // function cart()
    // {
    //     $this->load->view('userviews/navbar/header');
    //     $this->load->view('userviews/navbar/top');
    //     $this->load->view('userviews/navbar/navbar');
    //     $this->load->view('userviews/cart');
    //     $this->load->view('userviews/navbar/footer');
    // }

    function catalogue()
    {
        // Memuat model jika belum dimuat
        $this->load->model('User_data');

        // Mendapatkan filter brand dari parameter URL
        $brand_filter = $this->input->get('brand');

        // Mendapatkan data produk sesuai filter
        if ($brand_filter) {
            $data['result'] = $this->User_data->get_produk_by_brand($brand_filter); // Filter berdasarkan brand
        } else {
            $data['result'] = $this->User_data->get_all_produk(); // Semua produk
        }

        // Kirimkan informasi brand_filter ke view untuk menandai filter yang aktif
        $data['brand_filter'] = $brand_filter;

        // Memuat view dan mengirimkan data
        $this->load->view('userviews/navbar/header');
        $this->load->view('userviews/navbar/top');
        $this->load->view('userviews/navbar/navbar');
        $this->load->view('userviews/catalogue', $data); // View catalogue
        $this->load->view('userviews/navbar/footer');
    }

    function about(){
        $this->load->view('userviews/navbar/header');
        $this->load->view('userviews/navbar/top');
        $this->load->view('userviews/navbar/navbar');
        $this->load->view('userviews/about');
        $this->load->view('userviews/navbar/footer');
    }

    public function search() {
        // Ambil data query dan brand dari input form
        $query = $this->input->get('query');
        $brand = $this->input->get('brand');
        
        // Panggil model untuk mencari produk
        $this->load->model('Produk_data');
        $data['produk'] = $this->Produk_data->search_products($query, $brand);

        // Load view dan kirimkan data produk
        $this->load->view('user/search_results', $data);
    }

}
