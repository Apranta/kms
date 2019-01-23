<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	private $data = [];

  	public function __construct()
	{
	    parent::__construct();	
	    $username 	= $this->session->userdata('username');
		$id_role	= $this->session->userdata('id_role');
		echo $username;
		echo $id_role;
		
		if (isset($username, $id_role))
		{
			echo 'hai';
			
			switch ($id_role) 
			{
				case "manager":
					redirect('pemilik');
					break;
				case "staff":
					redirect('staff');
					break;
				case "admin":
					redirect('admin');
					break;
				default:
					redirect('home');
					break;
			}
			
		}
		
  	}


  	public function index()
  	{
  		if ($this->POST('login-submit'))
		{
			$this->load->model('pengguna_m');
			if (!$this->pengguna_m->required_input(['username','password'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('login');
				exit;
			}
			
			$this->data = [
    			'username'	=> $this->POST('username'),
    			'password'	=> md5($this->POST('password'))
			];

			$result = $this->pengguna_m->login($this->data);
			print_r($result);
			if (!isset($result)) 
			{
				$this->flashmsg('Username atau password salah','danger');
			}
			redirect('login');
			exit;
		}
		$this->data['title'] 		= 'Login';
		$this->data['global_title'] = $this->title;
		$this->load->view('login',$this->data);
	}

	public function register()
	{
		if ($this->POST('register-submit'))
		{
			$this->load->model('pengguna_m');
			$password = $this->POST('password');
			$rpassword = $this->POST('rpassword');
			if ($password !== $rpassword)
			{
				$this->flashmsg('Pendaftaran gagal.', 'danger');
				redirect('login');
			}

			$this->data['pengguna'] = [
				'username'	=> $this->POST('username'),
				'password'	=> md5($password),
				'nama'		=> $this->POST('nama'),
				'telepon'	=> $this->POST('kontak'),
				'role'	=> $this->POST('id_role'),
				'alamat'	=> $this->POST('alamat')
			];

			$this->pengguna_m->insert($this->data['pengguna']);
			$this->flashmsg('Pendaftaran berhasil. Silahkan login');
			redirect('login');
		}
	}
}
