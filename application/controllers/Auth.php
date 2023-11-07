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
        $password = $this->input->post('password');

        // Check credentials in User_model
        $user = $this->User_model->validate_user($email, $password);

        if ($user) {
            // Set session data
            $sessionData = [
                'user_id' => $user['id'],
                'nom' => $user['nom'],
                'prenom' => $user['prenom'],
                'role' => $user['role_name'], // Store the role name in the session
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($sessionData);

            // Redirect based on role
            if ($sessionData['role'] == 'Admin') {
                redirect('layout'); // Assuming you have a dashboard controller for admins
            } else {
                redirect('employee/index'); // Non-admins get redirected to employee index
            }
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
