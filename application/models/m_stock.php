<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_stock extends CI_Model {


    public function get_all_frame() {
        $this->datatables->select('id,nama,kode_frame,state,harga');
        $this->datatables->from('stock_frame');
        $this->datatables->add_column('view', '<button type="button" onclick="edit_frame(`$1`)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>  <button onclick="hapus_barang(`$1`)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>','id,nama,kode_frame,state,harga');
        return $this->datatables->generate();
    }

    public function get_all_lensa() {
        $this->datatables->select('id,jenis_lensa,ukuran_sph,ukuran_cyl,stok');
        $this->datatables->from('stock_lensa');
        $this->datatables->add_column('view', '<button type="button" onclick="edit_lensa(`$1`)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>  <button onclick="hapus_lensa(`$1`)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>','id,jenis_lensa,ukuran_sph,ukuran_cyl,stok');
        return $this->datatables->generate();
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