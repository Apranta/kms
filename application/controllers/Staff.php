<?php 

class Staff extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->module = 'staff';

		$this->data['id_pengguna'] 	= $this->session->userdata('id_pengguna');
		$this->data['username'] 	= $this->session->userdata('username');
	    $this->data['id_role']		= $this->session->userdata('id_role');
	    $this->data['bagian']		= $this->session->userdata('bagian');
		if (!isset($this->data['id_pengguna'], $this->data['username'], $this->data['id_role']))
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login terlebih dahulu', 'danger');
			redirect('login');
		}

		if ($this->data['id_role'] != 'staff')
		{
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login sebagai staff untuk mengakses halaman tersebut', 'danger');
			redirect('login');
		}
	}

	public function index()
	{
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
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
		if($this->POST('submit')){
			$data = [
				'judul_tacit' => $this->POST('judul'),
				'masalah' => $this->POST('masalah'),
				'solusi' => $this->POST('solusi'),
				'id_user' => $this->data['id_pengguna'],
				'validasi' => "menunggu",
				'date' => date("Y-m-d")
			];
			$this->Tacit_m->insert($data);
			$this->flashmsg('Data saved successfully', 'success');
			redirect('staff/tacit');
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
			];
			$this->Tacit_m->update($id,$data);
			$this->flashmsg('Data update successfully', 'success');
			redirect('staff/tacit');
			exit;
		}
		$this->template($this->data, $this->module);
	}
	public function delete_tacit($id)
	{
		$this->load->model("Tacit_m");
		$this->Tacit_m->delete($id);
		$this->flashmsg('Data saved successfully', 'success');
		redirect('staff/tacit');
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
		if($this->POST('submit'))
		{
			
				$data = [
					"id_user" => $this->data['id_pengguna'],
					"judul" => $this->POST('judul'),
					"keterangan" => $this->POST('masalah'),
					'date' => date("Y-m-d"),
					"validasi" => "menunggu",
				];
				$this->Explicit_m->insert($data);
				$this->uploadPDF($this->db->insert_id(),'explicit','file');
				$this->flashmsg('Data save successfully');
				redirect('staff/explicit');
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
		$this->data['e'] = $this->Explicit_m->get_row("id_explicit = ".$id);
		if($this->POST('submit'))
		{
				$data = [
					"judul" => $this->POST('judul'),
					"keterangan" => $this->POST('masalah'),
				];
				$this->Explicit_m->update($id,$data);
				
				if($_FILES['file'])
				{
					$this->uploadPDF($id,'explicit','file');
				}
				
				$this->flashmsg('Data save successfully');
				redirect('staff/explicit');
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
		redirect('staff/explicit');
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
		$this->data['data'] = $this->user_m->get_row(['id_user'=>$this->data['id_pengguna']]);
		$this->template($this->data, $this->module);
	}

	public function edit_user($id)
	{
		$this->load->model('User_m');
		$this->data['data']		= $this->User_m->get_row(['id_user'=>$id]);
		if($this->post('submit'))
		{
			$password = $this->post('password');
			if($this->post('password_lama') && $this->post('password_baru') && $this->post('konfirm_baru')){
				if($this->data['data']->password != md5($this->post('password_lama')))
				{
					$this->flashmsg('Wrong Password');
					redirect('staff/profile/'.$id);
					exit;
				}
				if($this->post('konfirm_baru')!=$this->post('password_baru'))
				{
					$this->flashmsg('Password baru dan konfirmasi password tidak sama');
					redirect('staff/profile/'.$id);
					exit;
				}
				$password = md5($this->post('password_baru'));
			}
			$user = [
				'username'=>$this->post('username'),
				'nama'=>$this->post('nama'),
				'alamat'=>$this->post('alamat'),
				'tempat_lahir'=>$this->post('tempat_lahir'),
				'tanggal_lahir'=>$this->post('tanggal_lahir'),
				'telepon'=>$this->post('telepon'),
				'password'=>$password,
				'role'=>$this->post('role'),
				'jabatan'=>$this->post('jabatan'),
			];
			$this->User_m->update($id, $user);
			$this->flashmsg('edit sukses');
			redirect('staff/profile/'.$id);
			exit;
		}
		
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'edit_user';
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

	public function data_video()
	{
		$this->load->model('Video_conf_m');
		if ($this->POST('simpan')) {
			$this->Video_conf_m->insert([
				'judul_video' => $this->POST('judul'),
				'url'			=> $this->POST('url'),
				'date'			=> $this->POST('date'),
				'deskripsi'		=> $this->POST('deskripsi'),
				'id_user'		=> $this->data['id_pengguna']
			]);
				$this->flashmsg('Data save successfully');
				redirect('admin/data_video');
				exit;
		}
		$date = date('Y-m-d');
		$this->data['video']	= $this->Video_conf_m->get(['id_user' => $this->data['id_pengguna']]);
		$this->data['berakhir']	= $this->Video_conf_m->getDateBerlangsung();
		$this->data['berlangsung']	= $this->Video_conf_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'data_video';
		// $this->dump($this->data);
		// exit;
		$this->template($this->data, $this->module);
	}
	public function detail_video()
	{
		$this->load->model('Video_conf_m');
		$this->data['id_video'] = $this->uri->segment(3);
		$this->check_allowance(!isset($this->data['id_video']));
		$this->data['data']	= $this->Video_conf_m->get_row(['id_video' => $this->data['id_video']]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_video';
		// $this->dump($this->data);
		// exit;
		$this->template($this->data, $this->module);
	}
}