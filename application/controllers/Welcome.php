<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        // Load the URL Helper
        $this->load->helper('url'); 

        // Retrieve all users from the database
        $data['users'] = $this->User_model->get_all_users();

        // Load the view and pass the retrieved data to the view
        $this->load->view('layout', ['content' => 'user/index', 'users' => $data['users']]);
    }
}
