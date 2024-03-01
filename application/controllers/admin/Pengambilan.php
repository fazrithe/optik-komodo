<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengambilan extends CI_Controller {

	public $validation_for = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');// Load Library Ignited-Datatables        
        $this->load->model('m_pendaftaran');
		$this->load->model('m_stock');
		$this->load->model('m_pengambilan');
        // echo "a";
        $this->load->helper('form');
		$this->load->library('form_validation');        
    }

	public function index()
	{	
		$this->load->view('admin/pengambilan/index');
	}
	public function search()
	{
		$no_nota = $this->input->post('no_nota');
		echo json_encode($this->m_pengambilan->get_by_id($no_nota));
	}

	public function selesai($id)
	{
		$pembayaran = $this->input->post('pembayaran');
		$update = array(				
			'status_pengambilan'		=> 1,
			'tanggal_pengambilan'	=> date("Y-m-d"),
			'pembayaran_sisa' => $pembayaran
			);
		$this->db->where('id', $id);
		$this->db->update('transaksi', $update);
	}

	public function get_data_pengambilan()
	{
		header('Content-Type: application/json');
		echo $this->m_pengambilan->get_data_pengambilan();
		 
	}

    public function add()
	{
		$this->validation_for = 'add';
        $data = array();
		$data['status'] = TRUE;

		$cek = $this->input->post('pengguna_id');

		$this->_validate();
		// print

        if ($this->form_validation->run() == FALSE)
        {					
            $errors = array(				
                'pengguna_id' 		=> form_error('pengguna_id'),
				'nota' 		=> form_error('nota'),
				'resep' 		=> form_error('resep'),
				'frame' 		=> form_error('frame'),
				'lensa' 		=> form_error('lensa'),
				'keterangan' 		=> form_error('keterangan'),
				'status_r' 		=> form_error('status_r'),
				'status_l' 		=> form_error('status_l'),
				'status_od' 		=> form_error('status_od'),
				'status_os' 		=> form_error('status_os'),
				'jumlah' 		=> form_error('jumlah'),
				'bpjs' 		=> form_error('bpjs'),
				'uang_muka' 		=> form_error('uang_muka'),
				'sisa' 		=> form_error('sisa'),
				'pembayaran' 		=> form_error('pembayaran'),
			);
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );			
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{			
            $insert = array(
					'pengguna_id'		=> $this->input->post('pengguna_id'),
					'paket'		=> $this->input->post('paket'),
					'tanggal' => date("Y-m-d"),
					'nota'		=> $this->input->post('nota'),
					'resep'		=> $this->input->post('resep'),
					'frame'		=> $this->input->post('frame'),
					'lensa'		=> $this->input->post('lensa'),
					'keterangan'		=> $this->input->post('keterangan'),
					'status_r'		=> $this->input->post('status_r'),
					'status_l'		=> $this->input->post('status_l'),
					'status_od'		=> $this->input->post('status_od'),
					'status_os'		=> $this->input->post('status_os'),
					'jumlah'		=> $this->input->post('jumlah'),
					'bpjs'		=> $this->input->post('bpjs'),
					'uang_muka'		=> $this->input->post('uang_muka'),
					'sisa'		=> $this->input->post('sisa'),
					'pembayaran'		=> $this->input->post('pembayaran'),
				);			
			$this->db->insert('transaksi', $insert);
            $data['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
	}

    public function edit($id)
	{
		header('Content-Type: application/json');
		echo json_encode($this->m_pendaftaran->get_by_id($id));
	}

    public function update()
	{
		$this->validation_for = 'update';
		$data = array();
		$data['status'] = TRUE;

		$this->_validate();

        if ($this->form_validation->run() == FALSE){
			$errors = array(
				'nama' 		=> form_error('nama'),
                'no_bpjs'   => form_error('no_bpjs'),
				'alamat'    => form_error('alamat'),
                'no_telp' 	=> form_error('no_telp'),
            );
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}else{
			$update = array(				
				'nama'		=> $this->input->post('nama'),
					'no_bpjs' 	=> $this->input->post('no_bpjs'),
					'alamat'	=> $this->input->post('alamat'),
					'no_telp' 	=> str_replace(',', '', $this->input->post('no_telp')),
				);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('pendaftaran', $update);
			$data['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

    public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('pendaftaran');
	}


    private function _validate()
	{
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('sisa', 'sisa', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
		$this->form_validation->set_rules('pembayaran', 'pembayaran', 'required');
		// $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		// $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required|numeric');
	}

}