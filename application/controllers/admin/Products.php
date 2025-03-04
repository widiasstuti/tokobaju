<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
    }

	public function index()
	{
		$data["products"] = $this->product_model->getAll(); // ambil data dari model
        $this->load->view("admin/product/list", $data); // kirim data ke view
    }
    
    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/product/new_form");
    }

}

/* End of file Products.php */
/* Location: ./application/controllers/admin/Products.php */ ?>