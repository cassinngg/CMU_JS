<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	public function index(){
		$this->load->model('volume_model'); // Adjust 'volume_model' to match the actual filename of your model
		$this->load->model('author_model');
		$query = $this->input->get('query');
		$data['articles'] = $this->article_model->fetch_articles($query);
		$this->load->view('templates/header');
		$this->load->view('admin/articles/index', $data);
		$this->load->view('templates/footer');
		$search = $this->input->get('search'); // Get the search query

        if ($search) {
            // If there is a search query, fetch articles based on the search query
            $data['articles'] = $this->article_model->search_articles($search);
        } else {
            // Otherwise, fetch all articles
            $data['articles'] = $this->article_model->fetch_article();
        }
	}

	public function view($id){
		$this->load->model('volume_model'); // Adjust 'volume_model' to match the actual filename of your model
		$this->load->model('author_model');
		$data['article'] = $this->article_model->get_article_by_id($id);
		$data['volume'] = $this->volume_model->get_volume_by_id($data['article']['vol_id']);
		$this->load->view('templates/header');
		$this->load->view('global/view_article', $data);
		$this->load->view('templates/footer');
	}

	public function view_article($id){
		$this->load->model('volume_model'); // Adjust 'volume_model' to match the actual filename of your model
		$this->load->model('author_model');
		$this->load->model('article_model');

		$data['author'] = $this->author_model->get_author_by_id($id);

		$data['article'] = $this->article_model->get_article_by_id($id);
		$data['volume'] = $this->volume_model->get_volume_by_id($data['article']['vol_id']);
		$this->load->view('templates/header');
		$this->load->view('admin/view_article', $data);
		$this->load->view('templates/footer');
	}
	


	public function new_article(){

		$this->load->model('volume_model'); // Adjust 'volume_model' to match the actual filename of your model
		$this->load->model('author_model');
		$data['volume'] = $this->volume_model->fetch_volume();
		$data['authors'] = $this->author_model->fetch_published_author();
		$this->load->view('templates/header');
		$this->load->view('admin/new_article', $data);
		$this->load->view('templates/footer');

	}

// public function add_article(){

//     // Set validation rules

// 	$this->load->library('form_validation');
//     $this->form_validation->set_rules('title', 'Title', 'required');
//     $this->form_validation->set_rules('keywords', 'Keywords', 'required');
//     $this->form_validation->set_rules('abstract', 'Abstract', 'required');
//     $this->form_validation->set_rules('doi', 'DOI', 'required');
//     $this->form_validation->set_rules('date-published', 'Date Published', 'required');
//     $this->form_validation->set_rules('vol-id', 'Volume', 'required');
// 	$this->form_validation->set_rules('auid', 'Author', 'required');

//     // Check if form is submitted and validated
//     if($this->form_validation->run() == FALSE){
// 		$this->load->model('volume_model'); // Adjust 'volume_model' to match the actual filename of your model
// 			$this->load->model('author_model');
       
// 		$data['authors'] = $this->author_model->fetch_published_author();
// 		$data['volume'] = $this->volume_model->fetch_volume();
//         $this->load->view('templates/header');
//         $this->load->view('admin/new_article', $data);
//         $this->load->view('templates/footer');
//     } else {
//         $config['upload_path'] = './public/articles/';
//         $config['allowed_types'] = 'pdf|doc|docx'; 
//         $config['max_size'] = 2048; // 2MB maximum file size
//         $config['file_name'] = uniqid(); // Unique file name

//         $this->upload->initialize($config);

//         if ($this->upload->do_upload('filename')) {
  
//             $upload_data = $this->upload->data();
//             $file_name = $upload_data['file_name'];

//             $data = array(
//                 'title' => $this->input->post('title'),
//                 'keywords' => $this->input->post('keywords'),
//                 'abstract' => $this->input->post('abstract'),
//                 'doi' => $this->input->post('doi'),
//                 'date-published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
//                 'published' => $this->input->post('published') ? 1 : 0, 
//                 'vol_id' => $this->input->post('vol_id'),
// 				'auid' => $this->input->post('auid'),
//                 'filename' => $file_name 
//             );

//             $this->article_model->add_article($data);

//             // Redirect after successful insertion
//             redirect('admin/articles');
//         } else {
//             // File upload failed, display error
//             $error = $this->upload->display_errors();
// 			echo $error;
// 						// $data['volume'] = $this->volume_model->fetch_volume();
// 						// $data['error'] = $error;
// 						// $this->load->view('templates/header');
// 						// $this->load->view('admin/new_article', $data);
// 						// $this->load->view('templates/footer');
//         }
//     }
// 	}
	

	public function add_article(){

		// Set validation rules
		// $this->form_validation->set_rules('title', 'Title', 'required');
		// $this->form_validation->set_rules('keywords', 'Keywords', 'required');
		// $this->form_validation->set_rules('abstract', 'Abstract', 'required');
		// $this->form_validation->set_rules('doi', 'DOI', 'required');
		// $this->form_validation->set_rules('date-published', 'Date Published', 'required');
		// $this->form_validation->set_rules('vol-id', 'Volume', 'required');
		// $this->form_validation->set_rules('auid', 'Author', 'required');
	
		// // Check if form is submitted and validated
		// if($this->form_validation->run() == FALSE){
		// 	// Validation failed, load view with validation errors
		// 	$this->load->model('volume_model'); // Adjust 'volume_model' to match the actual filename of your model
		// 	$this->load->model('author_model');
		// 	$data['authors'] = $this->author_model->fetch_published_author();
		// 	$data['volume'] = $this->volume_model->fetch_volume();
        // 	$this->load->view('templates/header');
        // 	$this->load->view('admin/new_article', $data);
        // 	$this->load->view('templates/footer');
		// } else {

			$this->load->library('upload');
			$config['upload_path'] = './public/articles/';
			$config['allowed_types'] = 'pdf|doc|docx';
			$config['max_size'] = 2048; // 2MB maximum file size
			$config['file_name'] = uniqid(); // Unique file name
	
			$this->upload->initialize($config);
	
			if ($this->upload->do_upload('filename')) {

				$upload_data = $this->upload->data();
				$file_name = $upload_data['file_name'];
	
				$data = array(
					'title' => $this->input->post('title'),
					'keywords' => $this->input->post('keywords'),
					'abstract' => $this->input->post('abstract'),
					'doi' => $this->input->post('doi'),
					'date-published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
					'vol_id' => $this->input->post('vol_id'),
					'auid' => $this->input->post('auid'),
					'filename' => $file_name 
				);
	
				$this->article_model->add_article($data);
	
				// Redirect after successful insertion
				redirect('admin/articles');
			} else {
				// File upload failed, display error
				$error = $this->upload->display_errors();
				echo $error;
			}
		
		}





	
	public function edit_article($id){
		$this->load->model('volume_model'); // Adjust 'volume_model' to match the actual filename of your model
		$this->load->model('article_model');
		$data['volume'] = $this->volume_model->fetch_volume();
		$data['article'] = $this->article_model->get_article_by_id($id);
		
		$this->load->model('author_model');
		$data['authors'] = $this->author_model->fetch_published_author();
			
		$this->load->view('templates/header');
		$this->load->view('admin/edit_article', $data);
		$this->load->view('templates/footer');
	}

	public function update_article($id){
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('keywords', 'Keywords', 'required');
		$this->form_validation->set_rules('abstract', 'Abstract', 'required');
		$this->form_validation->set_rules('doi', 'DOI', 'required');
		$this->form_validation->set_rules('date-published', 'Date Published', 'required');
		$this->form_validation->set_rules('vol_id', 'Volume', 'required');
		$this->form_validation->set_rules('auid', 'Author', 'required');
	
		// Check if form is submitted and validated
		if($this->form_validation->run() == FALSE){
			$this->load->model('volume_model'); 
			$this->load->model('author_model');
		$data['authors'] = $this->author_model->fetch_published_author();
			
			// Validation failed, load view with validation errors
			$data['volume'] = $this->volume_model->fetch_volume();
			$data['article'] = $this->article_model->get_article_by_id($id);
			$this->load->view('templates/header');
			$this->load->view('admin/edit_article', $data);
			$this->load->view('templates/footer');
		} else {
			// Check if file input has data
			if (!empty($_FILES['filename']['name'])) {
				$config['upload_path'] = './public/articles/';
				$config['allowed_types'] = 'pdf|doc|docx'; 
				$config['max_size'] = 2048; // 2MB maximum file size
				$config['file_name'] = uniqid(); // Unique file name
				$this->load->library('upload');

				$this->upload->initialize($config);
	
				if ($this->upload->do_upload('filename')) {
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];
				} else {
					// File upload failed, display error
					$error = $this->upload->display_errors();
					echo $error;
					return; // Exit function if file upload fails
				}

				$data = array(
					'title' => $this->input->post('title'),
					'keywords' => $this->input->post('keywords'),
					'abstract' => $this->input->post('abstract'),
					'doi' => $this->input->post('doi'),
					'date-published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
					'published' => $this->input->post('published') ? 1 : 0, 
					'vol_id' => $this->input->post('vol_id'),
					'auid' => $this->input->post('auid')
				);
			} else {
				$data = array(
					'title' => $this->input->post('title'),
					'keywords' => $this->input->post('keywords'),
					'abstract' => $this->input->post('abstract'),
					'doi' => $this->input->post('doi'),
					'date-published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
					'published' => $this->input->post('published') ? 1 : 0, 
					'vol_id' => $this->input->post('vol_id'),
					'auid' => $this->input->post('auid')
				);
			}
	
			// Prepare data for article update
			
	
			// Update article
			$this->article_model->update_article($id, $data);
			// Redirect after successful insertion
			redirect('admin/articles');
		}
	}
	

	public function download($filename) {
		$file_path = FCPATH . 'public/articles/' . $filename;
	
		// Check if file exists
		if (file_exists($file_path)) {
			// Load the download helper
			$this->load->helper('download');
	
			// Set the file MIME type
			$mime = mime_content_type($file_path);
	
			// Generate the server response for the file download
			force_download($filename, file_get_contents($file_path), $mime);
		} else {
			// File not found, handle the error
			echo "File not found!";
		}
	}
	

	public function delete_article($id){
		$this->load->model('article_model');
		$this->article_model->delete_article($id);
		redirect('admin/articles');
	}


}
