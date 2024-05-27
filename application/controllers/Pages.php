<?php

class Pages extends CI_Controller
{

    public function view($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $this->load->model('article_model');
        $this->load->model('author_model');
        $this->load->model('volume_model');


        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['articles'] = $this->article_model->get_articles();
        $data['authors'] = $this->author_model->get_authors();
        $data['volume'] = $this->volume_model->get_volume();



        $this->load->view('templates/header', $data);
        // $this->load->view('templates/navbar', $data);

        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }
}
