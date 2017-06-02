<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		if($this->session->userdata('group') != '1')
		{
			$this->session->set_flashdata('error', 'Sorry, you are not logged in!');
			redirect('login');
		}
		//load model -> model_products
		$this->load->model('model_products');
	}

	public function index()
	{
		$data['produk'] = $this->model_products->all();
		$this->load->view('backend/view_all_products', $data);
	}

	public function create()
	{
		//form validation sebelum mengeksekusi query insert
		$this->form_validation->set_rules('nama', 'Product Name', 'required');
        $this->form_validation->set_rules('deskripsi', 'Product Description', 'required');
        $this->form_validation->set_rules('harga', 'Price', 'required');
        $this->form_validation->set_rules('stok', 'Stock', 'required|integer');
        //$this->form_validation->set_rules('userfile', 'Image', 'required');

        if ($this->form_validation->run() == FALSE)
       	{
			$this->load->view('backend/form_add_products');
		}
		else
		{
			//load uploading file library
			$config['upload_path'] 		= './uploads/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']    		= '300'; //MB
			$config['max_width'] 		= '2000'; //pixels
			$config['max_height'] 		= '2000'; //pixels

			$this->load->library('upload', $config);

			if (! $this->upload->do_upload())
			{
				//gagal->ke form add prodducts
				$this->load->view('backend/form_add_products');
			}
			else
			{
				//berhasil->lanjut ke query INSERT
				//eksekusi query insert 
				$img = $this->upload->data();
				$data_product = array(
						'nama' => set_value('nama'),
						'deskripsi' => set_value('deskripsi'),
						'harga' => set_value('harga'),
						'stok' => set_value('stok'),
						'gambar' => $img['file_name']
					);
				$this->model_products->create($data_product);
				redirect('admin/produk');
			}
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('nama', 'Product Name', 'required');
        $this->form_validation->set_rules('deskripsi', 'Product Description', 'required');
        $this->form_validation->set_rules('harga', 'Price', 'required');
        $this->form_validation->set_rules('stok', 'Stock', 'required|integer');
        //$this->form_validation->set_rules('userfile', 'Image', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['produk'] = $this->model_products->find($id);
			$this->load->view('backend/form_edit_products', $data);
		}
		else
		{
			if($_FILES['userfile']['nama'] !== '')
			{
				//form submit dengan gambar diisi
				//load uploading file library
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '300'; //MB
				$config['max_width'] = '2000'; //pixels
				$config['max_height'] = '2000'; //pixels

				$this->load->library('upload', $config);

				if (! $this->upload->do_upload())
				{
					$data['produk'] = $this->model_products->find($id);
					$this->load->view('backend/form_edit_products', $data);
				}
				else
				{
					$img = $this->upload->data();
					$data_product = array(
							'nama' => set_value('nama'),
							'deskripsi' => set_value('deskripsi'),
							'harga' => set_value('harga'),
							'stok' => set_value('stok'),
							'gambar' => $img['file_name']
						);
					$this->model_products->update($id, $data_product);
					redirect('admin/produk');
				}
			}
			else
			{
				//form submit dengan gambar dikosongkan
				$img = $this->upload->data();
				$data_product = array(
						'nama' => set_value('nama'),
						'deskripsi' => set_value('deskripsi'),
						'harga' => set_value('harga'),
						'stok' => set_value('stok')
					);
				$this->model_products->update($id, $data_product);
				redirect('admin/produk');

			}
		}
	}

	public function delete($id)
	{
		$this->model_products->delete($id);
		redirect('admin/produk');
	}
}
