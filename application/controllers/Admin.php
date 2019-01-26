<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';

		$this->data['id_pengguna'] 	= $this->session->userdata('id_pengguna');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
		if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 'admin')
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai admin untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
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
		$this->load->model('Tacit_m');
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tacit';
		$this->data['tacit'] = $this->Tacit_m->getDataJoin(['user'],['tacit.id_user = user.id_user']);
		$this->template($this->data, $this->module);
	}

	public function tambah_tacit()
	{
		$this->load->model('User_m');
		$this->load->model('Tacit_m');
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tambah_tacit';
		$this->data['user'] = $this->User_m->get("role like 'staff'");
		if($this->POST('submit')){
			$data = [
				'id_tacit' => null,
				'judul_tacit' => $this->POST('judul'),
				'masalah' => $this->POST('masalah'),
				'solusi' => $this->POST('solusi'),
				'id_user' => $this->POST('user'),
				'validasi' => $this->POST('validasi'),
				'date' => $this->POST('date')
			];
			$this->Tacit_m->insert($data);
			$this->flashmsg('Data saved successfully', 'success');
			redirect('Admin/tacit');
			exit;
		}
		$this->template($this->data, $this->module);
	}

	public function edit_tacit($id)
	{
		$this->load->model('User_m');
		$this->load->model('Tacit_m');
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'edit_tacit';
		$this->data['user'] = $this->User_m->get("role like 'staff'");
		$this->data['tacit'] = $this->Tacit_m->get_row("id_tacit = $id");
		if($this->POST('submit')){
			$data = [
				'judul_tacit' => $this->POST('judul'),
				'masalah' => $this->POST('masalah'),
				'solusi' => $this->POST('solusi'),
				'id_user' => $this->POST('user'),
				'validasi' => $this->POST('validasi'),
				'date' => $this->POST('date')
			];
			$this->Tacit_m->update($id,$data);
			$this->flashmsg('Data update successfully', 'success');
			redirect('Admin/tacit');
			exit;
		}
		$this->template($this->data, $this->module);
	}
	public function delete_tacit($id)
	{
		$this->load->model("Tacit_m");
		$this->Tacit_m->delete($id);
		$this->flashmsg('Data saved successfully', 'success');
		redirect('Admin/tacit');
	}

	public function detail_tacit()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_tacit';
		$this->template($this->data, $this->module);
	}

	public function explicit()
	{
		$this->load->model('Explicit_m');
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'explicit';
		$this->data['explicit'] = $this->Explicit_m->getDataJoin(['user'],['explicit.id_user = user.id_user']);
		$this->template($this->data, $this->module);
	}

	public function tambah_explicit()
	{
		$this->load->model('User_m');
		$this->load->model('Explicit_m');
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tambah_explicit';
		$this->data['user'] = $this->User_m->get("role like 'staff'");
		if($this->POST('submit'))
		{
			
				$data = [
					"id_explicit" => null,
					"id_user" => $this->POST('user'),
					"judul" => $this->POST('judul'),
					"keterangan" => $this->POST('masalah'),
					"date" => $this->POST('date'),
					"validasi" => $this->POST('validasi'),
				];
				$this->Explicit_m->insert($data);
				$this->uploadPDF($this->db->insert_id(),'explicit','file');
				$this->flashmsg('Data save successfully');
				redirect('Admin/explicit');
				exit;
		}
		$this->template($this->data, $this->module);
	}

	public function edit_explicit($id)
	{
		$this->load->model("Explicit_m");
		$this->load->model('User_m');
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'edit_explicit';
		$this->data['user'] = $this->User_m->get("role like 'staff'");
		$this->data['e'] = $this->Explicit_m->get_row("id_explicit = ".$id);
		if($this->POST('submit'))
		{
				$data = [
					"id_user" => $this->POST('user'),
					"judul" => $this->POST('judul'),
					"keterangan" => $this->POST('masalah'),
					"date" => $this->POST('date'),
					"validasi" => $this->POST('validasi'),
				];
				$this->Explicit_m->update($id,$data);
				
				if($_FILES['file'])
				{
					$this->uploadPDF($id,'explicit','file');
				}
				
				$this->flashmsg('Data save successfully');
				redirect('Admin/explicit');
				exit;
		}
		$this->template($this->data, $this->module);
	}

	public function delete_explicit($id)
	{
		$this->load->model("Explicit_m");
		unlink('assets/file/explicit/'.$id.'.pdf');
		$this->Explicit_m->delete($id);
		$this->flashmsg('Data saved successfully', 'success');
		redirect('Admin/explicit');
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
	public function search()
	{
		$this->load->model('User_m');
		$this->load->model('Tacit_m');
		$this->load->model('Explicit_m');
		if($this->POST('submit'))
		{
			$cari = $this->POST('cari');
			$this->data['explicit'] = $this->Explicit_m->getDataJoinWhere(['user'],['explicit.id_user = user.id_user'],"judul like '%$cari%' or keterangan like '%$cari%'");
			$this->data['tacit'] = $this->Tacit_m->getDataJoinWhere(['user'],['tacit.id_user = user.id_user'],"judul_tacit like '%$cari%' or masalah like '%$cari%' or solusi like '%$cari%'");
		}else{
			$this->data['explicit'] = $this->Explicit_m->getDataJoin(['user'],['explicit.id_user = user.id_user']);
			$this->data['tacit'] = $this->Tacit_m->getDataJoin(['user'],['tacit.id_user = user.id_user']);
		}
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'search';
		$this->template($this->data, $this->module);
	}
}