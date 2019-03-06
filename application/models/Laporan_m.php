<?php 

class Laporan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'laporan';
		$this->data['primary_key']	= 'id_laporan';
	}
}