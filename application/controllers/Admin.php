<?php

class Admin extends CI_Controller {

    public function index($page = 'index')
    {
        if (!file_exists(APPPATH.'views/admin/'.$page.'.php')){
            show_404();
        }

        $this->load->model('article_model');
        $this->load->model('author_model');
        $this->load->model('volume_model');
        $this->load->model('user_model');

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['articles'] = $this->article_model->get_articles();
        $data['authors'] = $this->author_model->get_authors();
        $data['volume'] = $this->volume_model->get_volume();
        $data['users'] = $this->user_model->get_users();

        // $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }

    public function view($userid = NULL){
        $data['user'] = $this->user_model->get_users($userid);

        if(empty($data['users'])){
            show_404();
        }

        $data['complete_name'] = $data['user']['complete_name'];

        // $this->load->view('templates/header', $data);
            $this->load->view('admin/view', $data);
            // $this->load->view('admin/'.$page, $data);
            $this->load->view('templates/footer', $data);
    }
    
    public function delete($userid){
        // echo $userid;
        $this->user_model->delete_user($userid);
        redirect('admin/users');
    }

    public function delete_auth($id){
        // Corrected from $this->Author_model to $this->author_model
        $this->author_model->delete_author($id);
        redirect('admin/authors');
    } 
    


 public function create(){
    $data['title'] = 'Create Author';

    $this->load->view('templates/header');
    $this->load->view('/admin/authors', $data);
    $this->load->view('templates/footer');
}
    


    public function add_author() {
        $data['title'] = 'Add Author';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        $this->load->model('author_model');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the add user form with validation errors
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('authors/author', $data);
            $this->load->view('templates/footer');
        } else {
            // Validation passed, process the form data
            $this->author_model->add_author($this->input->post());
            redirect('admin/authors');
        }
    }
    public function update_author($id) {
        $data['title'] = 'Update Author';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('author_name', 'Author Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        $this->load->model('author_model');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the update user form with validation errors
            $data['author'] = $this->author_model->get_author($id); // Retrieve user data for the form
            $this->load->view('templates/header', $data);
            $this->load->view('authors/edit_author', $data); // Assuming you have an edit_user view
            $this->load->view('templates/footer');
        } else {
            // Validation passed, process the form data
            $update_data = array(
                'author_name' => $this->input->post('author_name'),
                'email' => $this->input->post('email'),
                'contact_num' => $this->input->post('contact_num'),
                'title' => $this->input->post('title') // Assuming 'pword' is the field for password
                // Add other fields as needed
            );
            $this->author_model->update_author($id, $update_data);
            redirect('admin/authors');
        }
    
    //ARTICLES
    }
    public function add_article(){

        // Set validation rules
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $this->form_validation->set_rules('doi', 'DOI', 'required');
        $this->form_validation->set_rules('date-published', 'Date Published', 'required');
        $this->form_validation->set_rules('volume_id', 'Volume', 'required');
    
        // Check if form is submitted and validated
        if($this->form_validation->run() == FALSE){
            // Validation failed, load view with validation errors
            $data['volumes'] = $this->volume_model->fetch_volume();
            $this->load->view('templates/header');
            $this->load->view('admin/articles/new_article', $data);
            $this->load->view('templates/footer');
        } else {
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
                    'date_published' => date('Y-m-d H:i:s', strtotime($this->input->post('date-published'))),
                    'published' => $this->input->post('published') ? 1 : 0, 
                    'vol_id' => $this->input->post('vol_id'),
                    'filename' => $file_name 
                );
    
                $this->articles_model->add_article($data);
    
                // Redirect after successful insertion
                redirect('admin/articles');
            } else {
                // File upload failed, display error
                $error = $this->upload->display_errors();
                            $data['volumes'] = $this->volume_model->fetch_volume();
                            $data['error'] = $error;
                            $this->load->view('templates/header');
                            $this->load->view('admin/articles/new_article', $data);
                            $this->load->view('templates/footer');
            }
        }
        }
    public function delete_article($id){
        // echo $userid;
        $this->article_model->delete_article($id);
        redirect('admin/articles');
    }
    public function update_article($id) {
            $data['title'] = 'Update Article';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('abstract', 'Abstract', 'required');
        $config['upload_path'] = './uploads/'; // Specify the upload directory
        $config['allowed_types'] = 'gif|jpg|png'; // Specify allowed file types
        $config['max_size'] = 2048; // Specify max file size in KB
        $this->load->library('upload', $config);
            $this->load->model('article_model');
        
            if ($this->form_validation->run() == FALSE) {
                // Validation failed, reload the update user form with validation errors
                $data['article'] = $this->article_model->get_articles($id); // Retrieve user data for the form
                $this->load->view('templates/header', $data);
                $this->load->view('articles/edit_article', $data); // Assuming you have an edit_user view
                $this->load->view('templates/footer');
            } else {
                if ($this->upload->do_upload('new_profile_pic')) {
                    $data = $this->upload->data();
                    $profile_pic = 'uploads/'. $data['file_name'];
                    // Convert the new image to Base64
                    $binary_image = base64_encode(file_get_contents($profile_pic));
                    


                } else {
                    // Use the existing image if the upload fails
                    $profile_pic = $article['profile_pic'];
                    $binary_image = $article['profile_pic']; // Assuming the existing image is already Base64-encoded
                }
                
                // Validation passed, process the form data
                $update_data = array(
                    'profile_pic' => $binary_image,
                    'title' => $this->input->post('title'),
                    'keywords' => $this->input->post('keywords'),
                    'abstract' => $this->input->post('abstract'),
                    'auid' => $this->input->post('auid')

                     
                );
                 // Perform the update query
    $this->db->where('articleid', $id);
    $this->db->update('articles', $update_data);

                redirect('admin/articles');
            }
    }
          //VOLUME
    public function delete_volume($id){
        $this->load->model('volume_model'); 
        // Corrected from $this->Author_model to $this->author_model
        $this->volume_model->delete_volume($id);
        redirect('admin/volumes');
    } 
    


 public function create_volume(){
    $data['title'] = 'Create Volume';

    $this->load->view('templates/header');
    $this->load->view('/admin/volume', $data);
    $this->load->view('templates/footer');
}
    

public function view_volume($id){
    $this->load->model('volume_model');
    $data['volume'] = $this->volume_model->get_volume_by_id_with_raw_articles($id);
    $this->load->view('templates/header');
    $this->load->view('admin/view_volume', $data);
    $this->load->view('templates/footer');
}
    public function add_volume() {
        $data['title'] = 'Add Volume';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('volume_name', 'Volume Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
    
        $this->load->model('volume_model');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the add user form with validation errors
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('volumes/volume', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
				'volume_name' => $this->input->post('volume_name'),
				'description' => $this->input->post('description'),
				'published' => $this->input->post('published')? 1 : 0,
                'archived' => $this->input->post('archived') ? 1 : 0, 

			);
            $this->volume_model->add_volume($data);

            // Validation passed, process the form data
            redirect('admin/volumes');
        }
    }
    public function edit_volume($id){
        $this->load->model('volume_model'); 
		$data['volume'] = $this->volume_model->get_volume_by_id($id);
		$this->load->view('templates/header');
		$this->load->view('admin/edit_volume', $data);
		$this->load->view('templates/footer');
	}
    public function update_volume($id) {
        $data['title'] = 'Update Volume';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('volume_name', 'Volume Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
    
        $this->load->model('volume_model');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the update user form with validation errors
            $data['volume'] = $this->volume_model->get_volume($id); // Retrieve user data for the form
            $this->load->view('templates/header', $data);
            $this->load->view('volumes/edit_volume', $data); // Assuming you have an edit_user view
            $this->load->view('templates/footer');
        } else {
            // Validation passed, process the form data
            $update_data = array(
                'volume_name' => $this->input->post('volume_name'),
                'description' => $this->input->post('descripiton'),
                'archived' => $this->input->post('archived') ? 1 : 0, 

                
                
                
            );
            $this->volume_model->update_volumes($id, $update_data);
            redirect('admin/volumes');
        }
    }
    

    }
