<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pengerjaan extends CI_Model {


    public function get_by_id($no_nota)
	{
        $this->db->select('a.*, b.nama as nama_pengguna');
		$this->db->from('transaksi a');
		$this->db->join('pendaftaran b','a.pengguna_id = b.id');
		$this->db->where('nota',$no_nota);
		$query = $this->db->get();
		return $query->result();
	}

    function get_pendaftaran(){
		$hsl=$this->db->query("SELECT * FROM pendaftaran");
		return $hsl;
	}
}