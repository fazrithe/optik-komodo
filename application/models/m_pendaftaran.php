<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pendaftaran extends CI_Model {


    public function get_all_pendaftaran() {
        $this->datatables->select('id,nama,no_bpjs,alamat,no_telp');
        $this->datatables->from('pendaftaran');
        $this->datatables->add_column('view', '<button type="button" onclick="edit_pendaftaran(`$1`)" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>  <button onclick="hapus_pendaftaran(`$1`)" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>','id,nama,no_bpjs,alamat,no_telp');
        return $this->datatables->generate();
    }

    public function get_by_id($id)
	{
        $this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

    function get_pendaftaran(){
		$hsl=$this->db->query("SELECT * FROM pendaftaran");
		return $hsl;
	}
}