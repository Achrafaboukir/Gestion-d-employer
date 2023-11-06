<?php
class Auth extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('form_validation');
}

public function login() {
    // Validation rules
    $this->form_validation->set_rules('login', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
        // Load the login page with any validation errors
        $this->load->view('auth/login');
    } else {
        $email = $this->input->post('login');
        $password = $this->input->post('password'); // This would be the field name for the password input in your form

        // Check credentials in User_model
        $user = $this->User_model->validate_user($email, $password);

        if ($user) {
            // Set session data
            $sessionData = [
                'user_id' => $user['id'],
                'email' => $user['login'],
                'role' => $user['role_name'],
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($sessionData);
            // Redirect to the 'dashboard' controller's index method
            redirect('user/index');
        } else {
            // Set an error message
            $this->session->set_flashdata('login_error', 'Invalid email or password.');
            redirect('auth/login');
        }
    }
}

public function logout() {
    $this->session->sess_destroy();
    redirect('auth/login');
}
}
