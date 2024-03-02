<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public $validation_for = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');// Load Library Ignited-Datatables        
        $this->load->model('m_pendaftaran');
		$this->load->model('m_stock');
        // echo "a";
        $this->load->helper('form');
		$this->load->library('form_validation');        
    }

	public function index()
	{	
        $data['pendaftaran']=$this->m_pendaftaran->get_pendaftaran();
		$data['lensa']=$this->m_stock->get_lensa();
		$data['frame']=$this->m_stock->get_frame();
		$this->load->view('admin/transaksi/index',$data);
	}

	function get_data_pendaftaran(){ //data data produk by JSON object
		// print_r("ss");
		header('Content-Type: application/json');
		echo $this->m_pendaftaran->get_all_pendaftaran();
        // die();
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
				'keterangan' 		=> form_error('keterangan'),
				'status_r' 		=> form_error('status_r'),
				'status_l' 		=> form_error('status_l'),
				'status_od' 		=> form_error('status_od'),
				'status_os' 		=> form_error('status_os'),
				'jumlah' 		=> form_error('jumlah'),
				'bpjs' 		=> form_error('bpjs'),
				'sisa' 		=> form_error('sisa'),
			);
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );			
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{			
			date_default_timezone_set("Asia/Jakarta");;
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
					'status_pd'		=> $this->input->post('status_pd'),
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
		// $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		// $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required|numeric');
	}

}