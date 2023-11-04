<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index()
    {
        $this->load->helper('url'); // Load the URL Helper
        $this->load->model('User_model'); // Make sure to load the appropriate model
        
        // Fetch users from the database using your model
        $data['users'] = $this->User_model->get_users(); // Adjust the method name according to your model
        
        // Define the content to load into the layout
        $data['content'] = 'user/index'; // Set the view file that will be your content
        
        // Load the layout and pass the $data array which contains the content view and the users
        $this->load->view('layout', $data);
    }
}
