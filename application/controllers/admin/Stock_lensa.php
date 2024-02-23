<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_lensa extends CI_Controller {

	public $validation_for = '';

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');// Load Library Ignited-Datatables        
        $this->load->model('m_stock');
        // echo "a";
        $this->load->helper('form');
		$this->load->library('form_validation');        
    }

	public function index()
	{		
        // echo base_url();
		// print_r(base_url());
		$this->load->view('admin/stock/index');
	}

    public function input(){
        $this->load->view('admin/stock/input-lensa');
    }

	function get_data_lensa(){ //data data produk by JSON object
		// print_r("ss");
		header('Content-Type: application/json');
		echo $this->m_stock->get_all_lensa();
        // die();
	}

    public function add()
	{
		$this->validation_for = 'add';
        $data = array();
		$data['status'] = TRUE;

		$cek = $this->input->post('jenis_lensa');

		$this->_validate();
		// print

        if ($this->form_validation->run() == FALSE)
        {					
            $errors = array(				
                'jenis_lensa' 	=> form_error('jenis_lensa'),
                'ukuran_sph'    => form_error('ukuran_sph'),
				'ukuran_cyl'    => form_error('ukuran_cyl'),
                'stok' 			=> form_error('stok'),
			);
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );			
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }else{			
            $insert = array(
					'jenis_lensa'		=> $this->input->post('jenis_lensa'),
					'ukuran_sph' 		=> $this->input->post('ukuran_sph'),
					'ukuran_cyl'		=> $this->input->post('ukuran_cyl'),
					'stok' 			=> str_replace(',', '', $this->input->post('stok')),
				);			
			$this->db->insert('stock_lensa', $insert);
            $data['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
        }
	}

    public function edit($id)
	{
		header('Content-Type: application/json');
		echo json_encode($this->m_stock->get_by_id_lensa($id));
	}

    public function update()
	{
		$this->validation_for = 'update';
		$data = array();
		$data['status'] = TRUE;

		$this->_validate();

        if ($this->form_validation->run() == FALSE){
			$errors = array(
				'jenis_lensa' 	=> form_error('jenis_lensa'),
                'ukuran_sph'    => form_error('ukuran_sph'),
				'ukuran_cyl'    => form_error('ukuran_cyl'),
                'stok' 			=> form_error('stok'),
            );
            $data = array(
                'status' 		=> FALSE,
				'errors' 		=> $errors
            );
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}else{
			$update = array(				
				'jenis_lensa'		=> $this->input->post('jenis_lensa'),
				'ukuran_sph' 		=> $this->input->post('ukuran_sph'),
				'ukuran_cyl'		=> $this->input->post('ukuran_cyl'),
				'stok' 			=> str_replace(',', '', $this->input->post('stok')),
				);
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('stock_lensa', $update);
			$data['status'] = TRUE;
            $this->output->set_content_type('application/json')->set_output(json_encode($data));
		}
	}

    public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('stock_lensa');
	}


    private function _validate()
	{
		$this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('jenis_lensa', 'Jenis Lensa', 'trim|required|min_length[2]|max_length[30]');
        $this->form_validation->set_rules('ukuran_sph', 'Ukuran SPH', 'trim|required');
		$this->form_validation->set_rules('ukuran_cyl', 'Ukuran CYL', 'trim|required');
		$this->form_validation->set_rules('stok', 'Stok', 'trim|required|numeric');
	}

}