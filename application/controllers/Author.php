<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function index(){
		$query = $this->input->get('query');
		$data['author'] = $this->author_model->get_authors($query);
		$this->load->view('templates/header');
		$this->load->view('admin/authors/index', $data);
		$this->load->view('templates/footer');
	}
	public function view_author($id){
		$data['author'] = $this->author_model->get_author_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/authors/view_author', $data);
		$this->load->view('templates/footer');
	}

	public function new_author(){
		$this->load->view('templates/header');
		$this->load->view('admin/authors/new_author');
		$this->load->view('templates/footer');
	}
	

	public function add_author(){
		$this->form_validation->set_rules('author_name','Author Name','required');
		$this->form_validation->set_rules('title','Author Title','required');
		$this->form_validation->set_rules('email','Author Email','required');
		$this->form_validation->set_rules('contact_num','Author Contact','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin/authors/new_author');
			$this->load->view('templates/footer');
		}else{
			$config['upload_path'] = './public/profile-images/';
			$config['allowed_types'] = 'jpeg|png|jpg'; 
			$config['max_size'] = 4096; // 2MB maximum file size
			$config['file_name'] = uniqid(); // Unique file name

			$this->upload->initialize($config);

			if ($this->upload->do_upload('author_image')) {

					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];

					$data = array(
							'author_name' => $this->input->post('author_name'),
							'title' => $this->input->post('author_title'),
							'email' => $this->input->post('author_email'),
							'contact_num' => $this->input->post('contact_num'),
							'author_image' => $file_name 
					);
					
					$this->author_model->add_author($data);

					redirect('admin/authors');
			} else {
					$error = $this->upload->display_errors();
					$data['error'] = $error;
					$this->load->view('templates/header');
					$this->load->view('admin/authors/add_author', $data);
					$this->load->view('templates/footer');
			}
		}
	}
	

	public function edit_author($id){
		$this->load->model('author_model');
		$data['author'] = $this->author_model->get_author_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/authors', $data);
		$this->load->view('templates/footer');
	}
	

	public function update_author($id){
		$data['title'] = 'Update User';
        $this->load->library('form_validation');

		$this->form_validation->set_rules('author_name','Author Name','required');
		$this->form_validation->set_rules('title','Author Title','required');
		$this->form_validation->set_rules('email','Author Email','required');
		$this->form_validation->set_rules('contact','Author Contact','required');
		$this->load->model('author_model');
		if($this->form_validation->run() == FALSE){
			

			$data['author'] = $this->author_model->get_author($id);
			$this->author_model->get_author_by_id($id);
			$this->load->view('templates/header');
			$this->load->view('admin/edit_author', $data);
			$this->load->view('templates/footer');
		}else{
				$update_data = array(
					'author_name' => $this->input->post('author_name'),
					'title' => $this->input->post('title'),
					'email' => $this->input->post('email'),
					'contact_num' => $this->input->post('contact_num'),
				);
			}
			$this->load->model('author_model');
			$this->author_model->update_author($id, $data);
			redirect('admin/authors');
		}
	public function delete_author($id){
		$this->author_model->delete_author($id);
		redirect('admin/authors');
	}

}
