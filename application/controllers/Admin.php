<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

		// $this->data['id_pengguna'] 	= $this->session->userdata('id_pengguna');
		// $this->data['username'] 	= $this->session->userdata('username');
	 //    $this->data['id_role']		= $this->session->userdata('id_role');
		// if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		// {
		// 	$this->session->sess_destroy();
		// 	$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
		// 	redirect('login');
		// }

		// if ($this->data['id_role'] != 2)
		// {
		// 	$this->session->sess_destroy();
		// 	$this->flashmsg('Anda harus login sebagai admin untuk mengakses halaman tersebut', 'danger');
		// 	redirect('login');
		// }
	}

	public function index()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_user()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'data_user';
		$this->template($this->data, $this->module);
	}

	public function tacit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tacit';
		$this->template($this->data, $this->module);
	}

	public function tambah_tacit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tambah_tacit';
		$this->template($this->data, $this->module);
	}

	public function edit_tacit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'edit_tacit';
		$this->template($this->data, $this->module);
	}

	public function detail_tacit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_tacit';
		$this->template($this->data, $this->module);
	}

	public function explicit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'explicit';
		$this->template($this->data, $this->module);
	}

	public function tambah_explicit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tambah_explicit';
		$this->template($this->data, $this->module);
	}

	public function edit_explicit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'edit_explicit';
		$this->template($this->data, $this->module);
	}

	public function detail_explicit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_explicit';
		$this->template($this->data, $this->module);
	}

	public function profile()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'profile';
		$this->template($this->data, $this->module);
	}

	public function ganti_password()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'ganti_password';
		$this->template($this->data, $this->module);
	}

}