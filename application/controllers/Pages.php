<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		define('user', $this->db->get_where('user', ['email' => is_user()])->row_array());
		$this->output->cache(60);
	}

	public function index()
	{
		is_logged_in();
		$this->load->view('user/templates/header', ['title' => 'Beranda']);
		$this->load->view('user/pages/main', ['buku' => $this->db->get_where('daftar_buku', ['user_id' => user['id']])->result_array()]);
	}

	public function login()
	{
		$this->load->view('user/templates/auth_header', ['title' => 'Halaman Sign in']);
		$this->load->view('user/pages/login');
		$this->load->view('user/templates/auth_footer');
	}

	public function register()
	{
		$this->load->view('user/templates/auth_header', ['title' => 'Halaman Daftar']);
		$this->load->view('user/pages/register');
		$this->load->view('user/templates/auth_footer');
	}

	public function pinjam()
	{
		is_logged_in();
		$this->load->view('user/templates/header', ['title' => 'Halaman Pinjam Buku']);
		$this->load->view('user/pages/pinjam_buku');
	}

	public function tentang()
	{
		is_logged_in();
		$this->load->view('user/templates/header', ['title' => 'Tentang Aplikasi']);
		$this->load->view('user/pages/tentang');
	}

	public function kontak()
	{
		is_logged_in();
		$this->load->view('user/templates/header', ['title' => 'Halaman Kontak']);
		$this->load->view('user/pages/kontak');
	}
}
