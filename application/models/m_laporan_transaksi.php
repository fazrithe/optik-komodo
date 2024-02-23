<?php
class M_laporan_transaksi extends CI_Model{

	public function get_all_pendaftaran() {
        $this->datatables->select('id,nama,no_bpjs,alamat,no_telp');
        $this->datatables->from('pendaftaran');
        $this->datatables->add_column('view', '<a href='.base_url()."admin/laporan_transaksi/database_pdf/$1".'>Lihat transaksi</a>','id,nama,no_bpjs,alamat,no_telp');
        return $this->datatables->generate();
    }

	public function get_data_pendaftaran_pdf($id){
		$hsl=$this->db->query("SELECT * from pendaftaran where id=".$id."");
		return $hsl;
	}

    public function get_data_transaksi_pdf($id){
		$hsl=$this->db->query("SELECT * from transaksi where pengguna_id=".$id."");
		return $hsl;
	}

    public function get_data_transaksi_harian_pdf($start_date,$end_date){
		$hsl=$this->db->query("SELECT * from transaksi WHERE tanggal BETWEEN '".$start_date."' AND '".$end_date."'");
		return $hsl;
	}

}