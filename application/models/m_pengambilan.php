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

	public function get_data_pengambilan() {
		$this->datatables->select('a.id,a.nota,c.nama as nama_frame,d.jenis_lensa, a.tanggal, a.sisa, a.status_pengambilan, a.pembayaran_sisa');
        $this->datatables->from('transaksi a');
		$this->datatables->join('pendaftaran b','a.pengguna_id = b.id');
		$this->datatables->join('stock_frame c','a.frame = c.id');
		$this->datatables->join('stock_lensa d','a.lensa = d.id');
        $this->datatables->add_column('view', '
		<select class="form-select" id="pembayaran" aria-label="Floating label select example" onchange="pembayaran(`$1`)">`
                                <option selected value="cash">Cash</option>
                                <option value="qris">Qris</option>
                                <option value="edc">EDC</option>
                                <option value="transfer">Transfer</option>
                                </select>',
		'a.id,a.nota,c.nama as nama_frame,d.jenis_lensa, a.tanggal_pengambilan, a.sisa, a.status, a.pembayaran_sisa');
        return $this->datatables->generate();
    }
}