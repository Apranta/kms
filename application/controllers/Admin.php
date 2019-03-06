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
	    $this->data['bagian']		= $this->session->userdata('bagian');
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
		$this->load->model('User_m');
	}

	public function index()
	{
		$this->load->model('Profile_m');
		$this->data['profile'] = $this->Profile_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

	public function data_user()
	{
		$this->load->model('User_m');
		if ($this->GET('action') === 'delete') {
			$this->User_m->delete($this->GET('id'));
			$this->flashmsg('Data berhasil di hapus');
			redirect('admin/data-user');
			exit;
		}
		$this->data['data']		= $this->User_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'data_user';
		$this->template($this->data, $this->module);
	}

	public function detail_user($id)
	{
		$this->load->model('User_m');
		$this->data['data']		= $this->User_m->get_row(['id_user'=>$id]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_user';
		$this->template($this->data, $this->module);
	}

	public function edit_user($id)
	{
		$this->load->model('User_m');
		$this->data['data']		= $this->User_m->get_row(['id_user'=>$id]);
		if($this->post('submit'))
		{
			$password = $this->post('password');
			if($this->post('password_baru') && $this->post('konfirm_baru')){
				if($this->post('konfirm_baru')!=$this->post('password_baru'))
				{
					$this->flashmsg('Password baru dan konfirmasi password tidak sama');
					redirect('admin/edit_user/'.$id);
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
			redirect('admin/edit_user/'.$id);
			exit;
		}
		
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'edit_user';
		$this->template($this->data, $this->module);
	}

	public function tambah_karyawan()
	{
		$this->load->model('User_m');
		
		if ($this->POST('simpan')) {
			$this->User_m->insert([
				'username' => $this->POST('username'),
				'nama'		=> $this->POST('nama'),
				'alamat'		=> $this->POST('alamat'),
				'tempat_lahir'		=> $this->POST('tempat_lahir'),
				'tanggal_lahir'		=> $this->POST('tanggal_lahir'),
				'telepon'		=> $this->POST('telepon'),
				'password'		=> md5('123456'),
				'role'		=> $this->POST('role'),
				'jabatan'		=> $this->POST('jabatan'),
				'bagian'		=> $this->POST('bagian'),
			]);
			$this->flashmsg('Data save successfully dan password default user adalah 123456');
			redirect('admin/data-user');
			exit;
		}
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'tambah_karyawan';
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
				'validasi' => 'validasi',
				'date' => date("Y-m-d")
			];
			$this->Tacit_m->insert($data);
			$this->flashmsg('Data saved successfully', 'success');
			redirect('admin/tacit');
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
		$this->data['tacit'] = $this->Tacit_m->get_row("id_tacit = $id");
		if($this->POST('submit')){
			$data = [
				'judul_tacit' => $this->POST('judul'),
				'masalah' => $this->POST('masalah'),
				'solusi' => $this->POST('solusi'),
			];
			$this->Tacit_m->update($id,$data);
			$this->flashmsg('Data update successfully', 'success');
			redirect('admin/tacit');
			exit;
		}
		$this->template($this->data, $this->module);
	}
	public function validateExplicit($id)
	{
		$this->load->model('User_m');
		$this->load->model('explicit_m');
		$this->explicit_m->update($id,['validasi'=>'validasi']);
		redirect('admin/explicit');
	}
	public function validateTacit($id)
	{
		$this->load->model('User_m');
		$this->load->model('tacit_m');
		$this->tacit_m->update($id,['validasi'=>'validasi']);
		redirect('admin/tacit');
	}
	public function delete_tacit($id)
	{
		$this->load->model("Tacit_m");
		$this->Tacit_m->delete($id);
		$this->flashmsg('Data saved successfully', 'success');
		redirect('admin/tacit');
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
					"id_user" => $this->data['id_pengguna'],
					"judul" => $this->POST('judul'),
					"keterangan" => $this->POST('masalah'),
					"date" => date("Y-m-d"),
					"validasi" => 'validasi',
				];
				$this->Explicit_m->insert($data);
				$this->uploadPDF($this->db->insert_id(),'explicit','file');
				$this->flashmsg('Data save successfully');
				redirect('admin/explicit');
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
				redirect('admin/explicit');
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
		redirect('admin/explicit');
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

	public function profile_perusahaan()
	{
		$this->load->model('Profile_m');
		$aksi = $this->GET('aksi');
		if ($aksi === 'delete') {
			$this->Profile_m->delete($this->GET('id'));
			$this->flashmsg('Data Delete successfully');
			redirect('admin/profile_perusahaan');
			exit;
		}
		if ($this->POST('simpan')) {
			$this->Profile_m->insert([
				'nama'	=> $this->POST('nama'),
				'isi'	=> $this->POST('isi')
			]);
			$this->flashmsg('Data save successfully');
			redirect('admin/profile_perusahaan');
			exit;
		}
		$this->data['data']	= $this->Profile_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'profile_perusahaan';
		$this->template($this->data, $this->module);
	}

	public function edit_profile()
	{
		$this->load->model('Profile_m');
		$id = $this->uri->segment(3);
		$this->check_allowance(!isset($id));
		if ($this->POST('simpan')) {
			$this->Profile_m->update($this->POST('id') , [
				'nama'	=> $this->POST('nama'),
				'isi'	=> $this->POST('isi')
			]);
			$this->flashmsg('Data save successfully');
			redirect('admin/profile_perusahaan');
			exit;
		}
		$this->data['data']	= $this->Profile_m->get_row(['id_profile' => $id]);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'edit_profile';		
		$this->template($this->data, $this->module);
	}

	public function komentar()
	{
		$this->load->model('Komentar_m');
		if ($this->POST('simpan')) {
			$this->Komentar_m->insert([
				'id_pegawai' 	=> 	$this->data['id_pengguna'],
				'id_jenis'		=>	$this->POST('id_jenis'),
				'jenis'			=>	$this->POST('jenis'),
				'komentar'		=> 	$this->POST('komentar')
			]);
			$url = 'detail_'.$this->POST('jenis').'/'.$this->POST('id_jenis');
			redirect('admin/' . $url,'refresh');
			exit;
		}
	}

	public function detail_explicit()
	{
		$this->load->library('tanggal');
		$this->load->model('Explicit_m');

		$this->load->model('Komentar_m');
		$id = $this->uri->segment(3);
		$this->check_allowance(!isset($id));
		$this->data['data']		= $this->Explicit_m->get_row(['id_explicit' => $id]);
		$this->data['komentar']	= $this->Komentar_m->get(['id_jenis' => $id , 'jenis' => 'explicit']);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_explicit';
		$this->template($this->data, $this->module);
	}

	public function detail_tacit()
	{
		$this->load->library('tanggal');
		$this->load->model('Tacit_m');

		$this->load->model('Komentar_m');
		$id = $this->uri->segment(3);
		$this->check_allowance(!isset($id));
		$this->data['data']		= $this->Tacit_m->get_row(['id_tacit' => $id]);
		$this->data['komentar']	= $this->Komentar_m->get(['id_jenis' => $id , 'jenis' => 'tacit']);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'detail_tacit';
		$this->template($this->data, $this->module);
	}

	public function laporan()
	{
		$this->load->model('Laporan_m');
		if ($this->GET('aksi') === 'delete') {
			$this->Laporan_m->delete($this->GET('id'));
			redirect('admin/laporan','refresh');
			exit;
		}
		if ($this->POST('simpan')) {
			$this->Laporan_m->insert([
				'id_pegawai' => $this->POST('pegawai'),
				'deskripsi'		=> $this->POST('deskripsi')
			]);
			$this->uploadPDF($this->db->insert_id(), 'laporan' ,'file');
			redirect('admin/laporan','refresh');exit;
		}
		$this->data['data']		= $this->Laporan_m->get();
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'laporan';
		$this->template($this->data, $this->module);
	}
}