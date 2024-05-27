<?php
	class User_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_users($id = FALSE){	
			if ($id === FALSE){
			$query = $this->db->get('users');
			return $query->result_array();
			}

			$query = $this->db->get_where('users', array('userid' => $id));
			return $query->row_array();
    }
	public function create_user(){
		$slug = url_title($this->input->post('title'));
	
		$data = array(
			'title' => $this->input->post('title'), // Added missing comma here
			'slug' => $slug,
			'body' => $this->input->post('body')
		);
	
		return $this->db->insert('users', $data); // Corrected typo from $this->dv to $this->db
	}
	
	public function delete_user($id){
		$this->db->where('userid', $id);
		$this->db->delete('users');
}
public function search_user($search) {
		$this->db->like('complete_name', $search);
		$query = $this->db->get('users');
		return $query->result_array();
}
public function add_user(){
	// $slug = url_title($this->input->post('complete_name'));

	// Handle file upload
	$config['upload_path'] = './uploads/'; // Specify the upload directory
	$config['allowed_types'] = 'gif|jpg|png'; // Specify allowed file types
	$config['max_size'] = 2048; // Specify max file size in KB
	$this->load->library('upload', $config);

	if ($this->upload->do_upload('profile_pic')) {
		$data = $this->upload->data();
		$profile_pic = 'uploads/' . $data['file_name']; // // Encode the image to Base64
        $binary_image = base64_encode(file_get_contents($profile_pic));
    } else {
        $profile_pic = 'assets/images/profile.png';
        $binary_image = ''; // No binary data for default image
    }

	$role_map = array(
		'viewer' => 3,
		'author' => 2,
		'admin' => 1
	);

	// Get the role value based on the input
	$role_name = $this->input->post('role');
	$role = isset($role_map[$role_name]) ? $role_map[$role_name] : 3;

	// Prepare data for insertion
	$data = array(
		'complete_name' => $this->input->post('complete_name'),
		// 'slug' => $slug,
		'email' => $this->input->post('email'),
		'pword' => $this->input->post('password'),
		'profile_pic' => $profile_pic,
		'role' => $role
	);

	return $this->db->insert('users', $data);
}
	


	//UPDATE FUNCTION
	public function update_user($id, $update_data) {
		// Handle file upload
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload('edit_pic')) {
			$upload_data = $this->upload->data();
			$edit_pic = 'uploads/' . $upload_data['file_name'];
			$binary_image = base64_encode(file_get_contents($profile_pic));
		} else {
			$edit_pic = 'assets/img/person.png';
			$binary_image = ''; 
		}
	
		$role_map = array(
			'viewer' => 3,
			'author' => 2,
			'admin' => 1
		);
	
		// Get the role value based on the input
		$role_name = $this->input->post('role');
		$role = isset($role_map[$role_name]) ? $role_map[$role_name] : 3;
	
		// Prepare data for update
		$update_data['profile_pic'] = $edit_pic;
		$update_data['role'] = $role;
	
		// Update user data
		$this->db->where('userid', $id);
		$this->db->update('users', $update_data);
	}
		
}
