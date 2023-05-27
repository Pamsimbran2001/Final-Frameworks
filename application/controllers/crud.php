<?php 


class Crud extends CI_Controller
{
	
	public function index()
	{
		$data['product_details'] = $this->crud_model->getAllProducts();
		$this->load->view('crud_view', $data);
	}

	public function addProduct(){

		$this->form_validation->set_rules('pname','Product Name', 'trim|required');
		$this->form_validation->set_rules('price','Product Price', 'trim|required');
		$this->form_validation->set_rules('qty','Product Quantity', 'trim|required');


		if ($this->form_validation->run() == false) {
			
			$data_error = [

				'error' => validation_errors() 
			];
			$this->session->set_flashdata($data_error);
		}
		else{
			$result = $this->crud_model->insertProduct([
				'productName' => $this->input->post('pname'),
				'productPrice' => $this->input->post('price'),
				'productQuantity' => $this->input->post('qty')

			]);

			if ($result) {
				$this->session->set_flashdata('inserted','Your data has been successfully added!');
			}
		}
		redirect('crud');
	}

	public function editProduct($id){

		$data['singleProduct'] = $this->crud_model->getSingleProduct($id);

		$this->load->view('edit_view', $data);
	}

	public function update($id){

		$this->form_validation->set_rules('pname','Product Name', 'trim|required');
		$this->form_validation->set_rules('price','Product Price', 'trim|required');
		$this->form_validation->set_rules('qty','Product Quantity', 'trim|required');


		if ($this->form_validation->run() == false) {
			
			$data_error = [

				'error' => validation_errors() 
			];
			$this->session->set_flashdata($data_error);
		}
		else{
			$result = $this->crud_model->updateProduct([
				'productName' => $this->input->post('pname'),
				'productPrice' => $this->input->post('price'),
				'productQuantity' => $this->input->post('qty')

			], $id);

			if ($result) {
				$this->session->set_flashdata('updated','Your data has been successfully updated!');
			}
		}
		redirect('crud');
	}
	public function deleteProduct($id){

		$result = $this->crud_model->deleteItem($id);

		if ($result == true) {
				$this->session->set_flashdata('deleted','The product deleted successfully!');
			}
		redirect('crud');
	}

}

?>