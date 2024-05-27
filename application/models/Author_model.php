<?php
	class Author_model extends CI_Model{

	
		public function fetch_author($query = NULL) {
			if (!is_null($query)) {
					$this->db->order_by('author_name', 'ASC');
				$this->db->like('author_name', $query);
				$this->db->or_like('email', $query);
			}
				
				$this->db->order_by('author_name', 'ASC');
			$query = $this->db->get('authors');
			$authors = $query->result_array();
		
			return $authors;
		}

		public function get_author_by_id($id){
			$query = $this->db->get_where('authors', array('auid' => $id));
			return $query->row_array();
		}
	
		public function fetch_published_author($query = NULL) {
			if (!is_null($query)) {
				$this->db->order_by('author_name', 'ASC');
				$this->db->like('author_name', $query);
				$this->db->or_like('email', $query);
			}
			
			$this->db->order_by('author_name', 'ASC');
			$query = $this->db->get('authors');
			$authors = $query->result_array();
		
			return $authors;
		}

		

		public function __construct(){
			$this->load->database();
		}

		public function get_authors($id = FALSE){	
			if ($id === FALSE){
			$query = $this->db->get('authors');
			return $query->result_array();
			}

			$query = $this->db->get_where('authors', array('auid' => $id));
			return $query->row_array();
    }
	
	public function create_author(){
		$slug = url_title($this->input->post('title'));
	
		$data = array(
			'title' => $this->input->post('title'), // Added missing comma here
			'slug' => $slug,
			'body' => $this->input->post('body')
		);
	
		return $this->db->insert('authors', $data); // Corrected typo from $this->dv to $this->db
	}
	
	public function add_author($data){
		$this->db->insert('authors', $data);
	}

	// public function add_author(){
	// 	// $slug = url_title($this->input->post('complete_name'));
	
	// 	// Handle file upload
	// 	$config['upload_path'] = './uploads/'; // Specify the upload directory
	// 	$config['allowed_types'] = 'gif|jpg|png'; // Specify allowed file types
	// 	$config['max_size'] = 2048; // Specify max file size in KB
	// 	$this->load->library('upload', $config);
	
	// 	if ($this->upload->do_upload('profile_pic')) {
	// 		$data = $this->upload->data();
	// 		$profile_pic = 'uploads/' . $data['file_name']; // File path to store in the database
	// 		$binary_image = base64_encode(file_get_contents($profile_pic));
	// 	} else {
	// 		$profile_pic = 'assets/images/profile.png';
	// 		$binary_image = ''; // No binary data for default image
	// 	}
	// }
	// 	public function get_author($id = FALSE){	
	// 		if ($id === FALSE){
	// 		$query = $this->db->get('authors');
	// 		return $query->result_array();
	// 		}

	// 		$query = $this->db->get_where('authors', array('auid' => $id));
	// 		return $query->row_array();
    
	
	// 	// Prepare data for insertion
	// 	$data = array(
	// 		'author_name' => $this->input->post('author_name'),
	// 		// 'slug' => $slug,
	// 		'email' => $this->input->post('email'),
	// 		'contact_num' => $this->input->post('contact_num'),
	// 		'title' => $this->input->post('title'),
	// 		'profile_pic' => $binary_image
	// 	);
	
	// 	return $this->db->insert('authors', $data);
	// 	redirect('admin/authors');

	// }
	
	// public function update_author($id, $data){
	// 	$this->db->where('auid', $id);
	// 	$this->db->update('authors', $data);
	// }
	public function update_author($id, $update_data) {
		// Handle file upload
		// $config['upload_path'] = './uploads/';
		// $config['allowed_types'] = 'gif|jpg|png';
		// $config['max_size'] = 2048;
		// $this->load->library('upload', $config);
	
		// if ($this->upload->do_upload('edit_pic')) {
		// 	$upload_data = $this->upload->data();
		// 	$edit_pic = 'uploads/' . $upload_data['file_name'];
		// 	$binary_image = base64_encode(file_get_contents($profile_pic));
		// } else {
		// 	$edit_pic = 'assets/img/person.png';
		// 	$binary_image = ''; 
		// }
	
		// Prepare data for update
	
		// Update user data
		$this->db->where('auid', $id);
		$this->db->update('authors', $update_data);
	}
	public function delete_author($id){
		$this->db->where('auid', $id);
		$this->db->delete('authors');
	}
}

