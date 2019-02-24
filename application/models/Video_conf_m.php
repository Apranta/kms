<?php 

class Video_conf_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'video_conf';
		$this->data['primary_key']	= 'id_video';
	}

	public function getDateBerlangsung()
	{
		$query = $this->db->query('SELECT * FROM ' . $this->data['table_name'] . ' WHERE date <= NOW() ');
		return $query->result();
	}

	public function getDateBerakhir()
	{
		$query = $this->db->query('SELECT * FROM ' . $this->data['table_name'] . ' WHERE date > NOW()');
		return $query->result();
	}
}