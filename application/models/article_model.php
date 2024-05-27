<?php
	class Article_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}
	// 	public function get_articles($id = FALSE){	
	// 		if ($id === FALSE){
	// 		$query = $this->db->get('articles');
	// 		return $query->result_array();
	// 		}

	// 		$query = $this->db->get_where('articles', array('articleid' => $id));
	// 		return $query->row_array();
    // }
		public function fetch_articles($query=NULL){
			if ($query !== NULL ) {
				$this->db->order_by('title', 'ASC');
				$this->db->like('title', $query);
				$this->db->or_like('keywords', $query);
				$this->db->like('abstract', $query);
				$this->load->library('ckeditor');
			}
			$this->db->order_by('title', 'ASC');
			$query = $this->db->get('articles');
			$articles = $query->result_array();
		
			return $articles;
		}
		// public function get_articles($query = NULL) {
		// 	$this->db->select('articles.articleid, articles.title, articles.keywords, articles.abstract, articles.published, articles.date-published, authors.author_name, authors.email, authors.contact_num');
		// 	$this->db->from('article_author');
		// 	$this->db->join('articles', 'article_author.articleid = articles.articleid', 'inner');
		// 	$this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
		// 	$this->db->order_by('articles.date-published', 'DESC');
			
		// 	if ($query!== NULL) {
		// 		$this->db->like('articles.title', $query);
		// 		$this->db->or_like('articles.keywords', $query);
		// 		$this->db->like('articles.abstract', $query);
		// 	}
			
		// 	$query = $this->db->get();
		// 	return $query->result_array();
		// }
		public function get_articles($id = FALSE){	
			if ($id === FALSE){
			$query = $this->db->get('articles');
			return $query->result_array();
			}

			$query = $this->db->get_where('articles', array('articleid' => $id));
			return $query->row_array();
    }
		

	public function delete_article($id){
		$this->db->where('articleid', $id);
		$this->db->delete('articles');
}

public function get_article_by_id($id){
	$article = $this->db->get_where('articles', array('articleid' => $id))->row_array();
	$articleauthors = $this->volume_model->get_authors_by_article_id($article['articleid']);
		$article['authors'] = [];
		foreach ($articleauthors as &$author) {
				$article['authors'][] =  $this->volume_model->get_authors_by_id($author['auid']);
		}
	return $article;
}
public function get_author_by_id($id){
	$query = $this->db->get_where('authors', array('auid' => $id));
	return $query->row_array();
}
	
		public function get_articles_by_volume_id($id){
			$this->db->select('authors.*, articles.*');
			$this->db->from('article_author');
			$this->db->join('articles', 'article_author.articleid = articles.articleid', 'inner');
			$this->db->join('authors', 'article_author.auid = authors.auid', 'inner');
			$this->db->order_by('articles.date-published', 'DESC');
			$this->db->where('articles.volumeid', $id);
	
			$query = $this->db->get();
			return $query->result_array();
		}
	
		public function add_article($data){
		$this->db->insert('articles', $data);
		}
	
		public function update_article($id, $data){
				$this->db->where('articleid', $id);
				$this->db->update('articles', $data);
		}
	
		
		public function fetch_article() {
			$this->db->select('articles.*, volume.vol_name');
			$this->db->from('articles');
			$this->db->join('volume', 'articles.volumeid = volume.vol_id');
			$this->db->order_by('articles.title', 'asc');
			$query = $this->db->get();
			return $query->result_array();
		}
	
		public function search_articles($search) {
			$this->db->select('articles.*, volume.vol_name');
			$this->db->from('articles');
			$this->db->join('volume', 'articles.volumeid = volume.vol_id');
			$this->db->like('articles.title', $search);
			$this->db->order_by('articles.title', 'asc');
			$query = $this->db->get();
			return $query->result_array();
		}
	public function index() {
        // Load CKEditor library
        $this->load->library('ckeditor');
        
        // Configure CKEditor
        $this->ckeditor->basePath = base_url().'assets/admin/ckeditor/';
        $this->ckeditor->config['toolbar'] = array(
            array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
        );
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '730px';
        $this->ckeditor->config['height'] = '300px';
        
        // Add CKFinder to CKEditor
        $this->load->library('ckfinder');
        $this->ckfinder->SetupCKEditor($this->ckeditor, base_url().'assets/admin/ckfinder/');
        
        // Load the view
        $this->load->view('my_view', array('ckeditor' => $this->ckeditor));
    }
	}
	

// 		public function get_articles($id = FALSE){	
// 			if ($id === FALSE){
// 			$query = $this->db->get('articles');
// 			return $query->result_array();
// 			}

// 			$query = $this->db->get_where('articles', array('articleid' => $id));
// 			return $query->row_array();
//     }
// 	public function create_article(){
// 		$slug = url_title($this->input->post('title'));
	
// 		$data = array(
// 			'title' => $this->input->post('title'), // Added missing comma here
// 			'slug' => $slug,
// 			'body' => $this->input->post('body')
// 		);
	
// 		return $this->db->insert('articles', $data); // Corrected typo from $this->dv to $this->db
// 	}
	
// 	public function delete_article($id){
// 		$this->db->where('articleid', $id);
// 		$this->db->delete('articles');
// }

// public function add_article($data){
//     $this->db->insert('articles', $data);
// 	}
	


// 	//UPDATE FUNCTION
// 	public function update_article($id, $update_data) {
// 		// Handle file upload
// 		$config['upload_path'] = './uploads/';
// 		$config['allowed_types'] = 'gif|jpg|png';
// 		$config['max_size'] = 2048;
// 		$this->load->library('upload', $config);
	
// 		if ($this->upload->do_upload('edit_pic')) {
// 			$upload_data = $this->upload->data();
// 			$edit_pic = 'uploads/' . $upload_data['file_name'];
// 			$binary_image = base64_encode(file_get_contents($profile_pic));
// 		} else {
// 			$edit_pic = 'assets/images/person.png';
// 			$binary_image = ''; // No binary data for default image
// 		}
// 		$published_map = array(
// 			'unpublished' => 2,
// 			'published' => 1
// 		);
	
// 		// Get the role value based on the input
// 		$published_name = $this->input->post('published');
// 	$published = isset($published_map[$published_name]) ? $published_map[$published_name] : 3;

	
// 		// Prepare data for update
// 		$update_data['profile_pic'] = $edit_pic;
// 		$update_data['published'] = $published;
	
// 		// Update user data
// 		$this->db->where('articleid', $id);
// 		$this->db->update('articles', $update_data);
// 	}
// }