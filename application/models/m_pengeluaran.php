<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pengeluaran extends CI_Model {


    public function get_all_harian() {
        $this->datatables->select('id,nama_barang,harga,status');
        $this->datatables->from('pengeluaran_harian');
        $this->datatables->add_column('view', '<button onclick="hapus_harian(`$1`)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>','id,nama_barang,harga,status');
        return $this->datatables->generate();
    }

    public function get_all_bulanan()
	{
        $this->db->select('*');
		$this->db->from('pengeluaran_bulanan');
		$query = $this->db->get();
		return $query->result();
	}

    public function get_by_id($id)
	{
        $this->db->select('*');
		$this->db->from('stock_frame');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

    public function get_by_id_lensa($id)
	{
        $this->db->select('*');
		$this->db->from('stock_lensa');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

    function get_lensa(){
		$hsl=$this->db->query("SELECT * FROM stock_lensa");
		return $hsl;
	}

    function get_frame(){
		$hsl=$this->db->query("SELECT * FROM stock_frame");
		return $hsl;
	}
}