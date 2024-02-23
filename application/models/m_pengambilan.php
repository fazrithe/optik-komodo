<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pengambilan extends CI_Model {


    public function get_by_id($no_nota)
	{
        $this->db->select('a.*, b.nama as nama_frame, c.jenis_lensa as jenis_lensa');
		$this->db->from('transaksi a');
		$this->db->join('stock_frame b','a.frame = b.id');
		$this->db->join('stock_lensa c','a.lensa = c.id');
		$this->db->where('nota',$no_nota);
		$query = $this->db->get();
		return $query->result();
	}

    function get_pendaftaran(){
		$hsl=$this->db->query("SELECT * FROM pendaftaran");
		return $hsl;
	}
}