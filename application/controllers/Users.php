<?php
    class Users extends CI_Controller{

        public function index(){

            $search = $this->input->get('search'); // Get the search query
            
            $data['title'] = 'User Lists';
            $this->load->model('user_model');

            if ($search) {
                // If there is a search query, fetch articles based on the search query
                $data['users'] = $this->user_model->search_user($search);
            } else {
                // Otherwise, fetch all articles
                $data['users'] = $this->user_model->get_users();
            }

            $this->load->view('templates/header');
			$this->load->view('admin/users', $data);
			$this->load->view('templates/footer');
        }
// public function add() {
//     $this->load->model('User_model');

//     $input_data = $this->input->post();
//     if(!empty($input_data)){
//         $this->User_model->insert($input_data);
//         redirect('/users'); // Redirect to users list after saving
//     } else {
//         $this->load->view('admin/add_user');
//     }
// }
public function create(){
    $data['title'] = 'Create User';

    $this->load->view('templates/header');
    $this->load->view('/admin/users/user', $data);
    $this->load->view('templates/footer');
}
    


public function add_user() {
    $data['title'] = 'Add User';
    $this->load->library('form_validation');
    $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

    $this->load->model('user_model');
    
    if ($this->form_validation->run() == FALSE) {
        // Validation failed, reload the add user form with validation errors
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('users/user', $data);
        $this->load->view('templates/footer');
    } else {
        // Validation passed, process the form data
        $this->user_model->add_user($this->input->post());
        redirect('admin/users');
    }
}
    public function update_user($id) {
        $data['title'] = 'Update User';
        $this->load->library('form_validation');
        $this->form_validation->set_rules('complete_name', 'Complete Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    
        $this->load->model('user_model');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, reload the update user form with validation errors
            $data['user'] = $this->user_model->get_user($id); // Retrieve user data for the form
            $this->load->view('templates/header', $data);
            $this->load->view('templates/admin_nav');
            $this->load->view('users/edit_user', $data); // Assuming you have an edit_user view
            $this->load->view('templates/footer');
        } else {
            // Validation passed, process the form data
            $update_data = array(
                'complete_name' => $this->input->post('complete_name'),
                'email' => $this->input->post('email'),
                'pword' => $this->input->post('password') // Assuming 'pword' is the field for password
                // Add other fields as needed
            );
            $this->user_model->update_user($id, $update_data);
            redirect('admin/users');
        }
    }
}