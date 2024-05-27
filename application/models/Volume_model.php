<?php
	class Volume_model extends CI_Model{

		public function fetch_volume($query = NULL) {
			if (!is_null($query)) {
					$this->db->order_by('volume_name', 'ASC');
				$this->db->like('volume_name', $query);
				$this->db->or_like('description', $query);
			}
				
				$this->db->order_by('volume_name', 'ASC');
			$query = $this->db->get('volume');
			$volume = $query->result_array();
		
			return $volume;
		}
		public function __construct(){
			$this->load->database();
		}
			

public function fetch_published_volume($query = NULL) {
	if (!is_null($query)) {
		$this->db->order_by('volume_name', 'ASC');
			$this->db->like('volume_name', $query);
			$this->db->or_like('description', $query);
	}
	
	$this->db->where('published', 1);
	$this->db->where('archived', 0);
	$this->db->order_by('volume_name', 'ASC');
	$query = $this->db->get('volume');
	$volume = $query->result_array();

	return $volume;
}

	// 	public function get_volume($id = FALSE){	
	// 		if ($id === FALSE){
	// 		$query = $this->db->get('volume');
	// 		return $query->result_array();
	// 		}

	// 		$query = $this->db->get_where('volume', array('vol_id' => $id));
	// 		return $query->row_array();
    // }
	public function create_volume(){
		$slug = url_title($this->input->post('title'));
	
		$data = array(
			'title' => $this->input->post('title'), // Added missing comma here
			'slug' => $slug,
			'body' => $this->input->post('body')
		);
	
		return $this->db->insert('volume', $data); // Corrected typo from $this->dv to $this->db
	}
	
	public function get_volume_by_id_with_raw_articles($id) {
		$volume = $this->db->get_where('volume', array('vol_id' => $id))->row_array();
		if ($volume) {
			$volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
		}
	
		return $volume;
		}
	


	//UPDATE FUNCTION
	public function update_volumes($id, $update_data) {
		// Assuming $volume_name and $description are part of $update_data or obtained elsewhere
		// Handle file upload
		$config['upload_path'] = './uploads/volumes/'; // Specify the upload directory for volumes
		$config['allowed_types'] = 'pdf|docx|epub'; // Specify allowed file types for volumes
		$config['max_size'] = 2048; // Specify max file size in KB for volumes
		$this->load->library('upload', $config);
	
		
	
		// Get the role value based on the input
		$update_data = array(
			'volume_name' => $this->input->post('volume_name'),
			'description' => $this->input->post('description'),
			'published' => $this->input->post('published')? 1 : 0, 

		);
		// Update volume data
		$this->db->where('vol_id', $id);
		$this->db->update('volume', $update_data);
	}
	
	



	public function get_volume() {
			$this->db->order_by('volume_name', 'ASC');
			$query = $this->db->get('volume');
			$volumes = $query->result_array();


		foreach ($volumes as &$volume) {
			$volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
		}

		return $volumes;
	}

	public function get_archived_volumes() {
		$this->db->order_by('volume_name', 'ASC');
		$this->db->where('archived', 1);
		$query = $this->db->get('volume');
		$volumes = $query->result_array();

		foreach ($volumes as &$volume) {
			$volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
		}

		return $volumes;
	}


	public function get_volume_by_id($id) {
    $volume = $this->db->get_where('volume', array('vol_id' => $id))->row_array();

    if ($volume) {
        $volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
    }

    return $volume;
	}

	public function get_articles_by_volume($id){

	}

	// public function get_volume_by_id($id) {

	// 	$volumes = $this->db->get_where('volume', array('vol_id' => $id))->result_array();

	// 	foreach ($volumes as &$volume) {
	// 		$volume['articles'] = $this->get_articles_by_volume_id($volume['vol_id']);
	// 	}
	// 	return $volumes;
	// }



	public function get_articles_by_volume_id($id){
		// $this->db->select('authors.*, articles.*');
		// $this->db->from('article_author');
		// $this->db->join('articles', 'article_author.article_id = articles.article_id', 'inner');
		// $this->db->join('authors', 'article_author.authid = authors.author_id', 'inner');
		// $this->db->order_by('articles.date_published', 'DESC');
		// $this->db->where('articles.volumeid', $id);
		$this->db->order_by('title', 'ASC');
		$query = $this->db->get_where('articles', array('vol_id'=> $id));
		$articles = $query->result_array();
		foreach ($articles as &$article) {
			$articleauthors = $this->get_authors_by_article_id($article['articleid']);
			$article['authors'] = [];
			foreach ($articleauthors as &$author) {
					$article['authors'][] =  $this->get_authors_by_id($author['auid']);
			}
		}
	
		return $articles;
	}

	public function get_raw_articles_by_volume_id($id){
		$query = $this->db->get('articles');
		return $query->result_array();
	}

	public function get_authors_by_article_id($id){
		$query = $this->db->get_where('article_author', array('articleid' => $id));
		return $query->result_array();
	}

	public function get_authors_by_id($id){
		$query = $this->db->get_where('authors', array('auid'=> $id));
		return $query->row_array();
	}

	public function add_volume($data){
		$this->db->insert('volume', $data);
	}

	public function update_volume($id, $data){
		$this->db->where('vol_id', $id);
		$this->db->update('volume', $data);
	}

	public function delete_volume($id){
			$this->db->where('vol_id', $id);
			$this->db->delete('volume');
	}
}
