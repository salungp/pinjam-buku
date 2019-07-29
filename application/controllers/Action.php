<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		define('user', $this->db->get_where('user', ['email' => is_user()])->row_array());
	}

	public function register()
	{
		$name = htmlspecialchars($this->input->post('name'));
		$email = htmlspecialchars($this->input->post('email'));
		$username = htmlspecialchars($this->input->post('username'));
		$password = htmlspecialchars($this->input->post('password'));

		$this->form_validation->set_rules('name', 'Nama', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('user/templates/auth_header', ['title' => 'Halaman Daftar']);
			$this->load->view('user/pages/register');
			$this->load->view('user/templates/footer');
		} else {
			$data = [
				'name' => $name,
				'email' => $email,
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT)
			];

			if ($this->db->get_where('user', ['name' => $name])->row_array())
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf nama '.$name.' sudah ada!</div>');
				redirect('register');
			} else if ($this->db->get_where('user', ['email' => $email])->row_array())
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf email '.$email.' sudah ada!</div>');
				redirect('register');
			} else if ($this->db->get_where('user', ['username' => $username])->row_array())
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf username '.$username.' sudah ada!</div>');
				redirect('register');
			}

			if ($this->db->insert('user', $data))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success">Daftar berhasil, silahkan login terlebih dahulu!</div>');
				redirect('login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Daftar gagal!</div>');
				redirect('register');
			}
		}
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('user/templates/auth_header', ['title' => 'Halaman Sign In']);
			$this->load->view('user/pages/login');
			$this->load->view('user/templates/auth_footer');
		} else {

			if ($user = $this->db->get_where('user', ['username' => $username])->row_array())
			{
				if (password_verify($password, $user['password']))
				{
					$data = [
						'logged_in' => true,
						'email' => $user['email']
					];
					$this->session->set_userdata($data);
					redirect();
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah!</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Email tidak terdaftar!</div>');
				redirect('login');
			}
		}
	}

	public function pinjam()
	{
		$judul = htmlspecialchars($this->input->post('judul'));
		$kode = htmlspecialchars($this->input->post('code'));
		$batas = htmlspecialchars($this->input->post('batas'));

		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('code', 'Kode', 'required|trim');
		$this->form_validation->set_rules('batas', 'Batas waktu', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('user/templates/header', ['title' => 'Halaman Pinjam']);
			$this->load->view('user/pages/pinjam_buku');
		} else {
			$data = [
				'judul' => $judul,
				'nama' => user['name'],
				'user_id' => user['id'],
				'kode' => $kode,
				'updated_at' => $batas
			];

			if ($this->db->insert('daftar_buku', $data))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success">Pinjam buku '.$judul.' berhasil.</div>');
				redirect('beranda');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Pinjam buku '.$judul.' gagal.</div>');
				redirect('beranda');
			}
		}
	}

	public function logout()
	{
		if ($this->session->userdata('logged_in'))
		{
			$this->session->unset_userdata('logged_in');
			redirect('login');
		}
	}

	public function kontak()
	{
		$subjek = htmlspecialchars($this->input->post('subjek'));
		$message = htmlspecialchars($this->input->post('message'));

		$this->form_validation->set_rules('subjek', 'Subjek', 'required|trim');
		$this->form_validation->set_rules('message', 'Message', 'required|trim');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('user/templates/header', ['title' => 'Halaman kontak']);
			$this->load->view('user/pages/kontak');
		} else {
			$data = [
				'name' => user['name'],
				'user_id' => user['id'],
				'subjek' => $subjek,
				'message' => $message
			];

			if ($this->db->insert('kontak', $data))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-success">Pesan berhasil dikirim.</div>');
				redirect('kontak');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Pesan gagal dikirim.</div>');
				redirect('kontak');
			}
		}
	}

	public function kembalikan($id = null)
	{
		$buku = $this->db->get_where('daftar_buku', ['id' => $id])->row_array();
		if ( ! is_null($id))
		{
			if ($id == $buku['id'])
			{
				if ($this->db->delete('daftar_buku', ['id' => $id]))
				{
					$this->db->insert('log', [
						'title' => 'Delete buku dengan id '.$id,
						'deskripsi' => 'Mengembalikan buku dengan judul '.$buku['judul'].' kode '.$buku['kode'],
						'author' => user['id']
					]);

					$this->session->set_flashdata('message', '<div class="alert alert-success">Buku berhasil dikembalikan.</div>');
					redirect();
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger">Buku gagal dikembalikan.</div>');
					redirect();
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf buku tidak ditemukan!.</div>');
				redirect();
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf buku yang ingin dikembalikan tidak ada.</div>');
			redirect();
		}
	}
}
