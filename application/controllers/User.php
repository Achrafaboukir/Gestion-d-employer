<?php
// application/controllers/User.php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Role_model'); // Load Role_model
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
      
        if (!is_logged_in()) {
            redirect('auth/login');
        }
    }

    public function index() {
        // Check if the user is logged in and has the 'admin' role
        if ($this->session->userdata('logged_in') && $this->session->userdata('role') === 'admin') {
            $data['title'] = 'User List';
            $data['users'] = $this->User_model->get_all_users();
            $data['content'] = 'user/index';
            $this->load->view('layout', $data);
        } else {
            // If not admin, show error message and redirect
            $this->session->set_flashdata('error', 'You do not have permission to view this page.');
            redirect('employee/index'); // Or redirect to some other page
        }
    }
    
    

    public function create() {
        access_only_for_admins();
        $data['roles'] = $this->Role_model->get_all_roles(); // Fetch all roles
        $data['content'] = 'user/create';
        $this->load->view('layout', $data); // Pass the roles to the view
    }
    
    

    public function store() {
        access_only_for_admins();
        // Set form validation rules
        $this->form_validation->set_rules('nom', 'Name', 'required');
        $this->form_validation->set_rules('prenom', 'Surname', 'required');
        $this->form_validation->set_rules('login', 'Email', 'required|valid_email|is_unique[utilisateur.login]', array('is_unique' => 'This email is already taken.'));
        $this->form_validation->set_rules('mot_de_passe', 'Password', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required|integer');
    
        if ($this->form_validation->run() === FALSE) {
            // Validation failed, reload the form with validation errors
            $this->create();
        } else {
            // Validation passed, process the form data
            $data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'login' => $this->input->post('login'),
                // Hash the password securely
                'mot_de_passe' => password_hash($this->input->post('mot_de_passe'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id')
            ];
    
            // Attempt to insert the user data into the database
            $result = $this->User_model->create($data);
    
            // Check the result of the insert operation
            if ($result) {
                // User creation successful, set success message and redirect to user list
                $this->session->set_flashdata('success', 'User created successfully.');
                redirect('user/index');
            } else {
                // User creation failed, log the error and set an error message
                log_message('error', 'User creation failed: ' . $this->db->_error_message());
                $this->session->set_flashdata('error', 'There was a problem creating the user.');
                redirect('user/create');
            }
        }
    }
    

    // Add these methods to your User controller

public function delete($id) {
    access_only_for_admins();
    if ($this->User_model->delete_user($id)) {
        $this->session->set_flashdata('success', 'User deleted successfully.');
    } else {
        $this->session->set_flashdata('error', 'There was a problem deleting the user.');
    }
    redirect('user/index');
}

public function update($id) {
    access_only_for_admins();
    if (!$id) {
        show_404();
    }

    // Load the user's current data
    $currentUser = $this->User_model->get_user_by_id($id);

    // Set form validation rules
    $this->form_validation->set_rules('nom', 'Name', 'required');
    $this->form_validation->set_rules('prenom', 'Surname', 'required');
    // Check if 'login' has been changed from the original value
    if ($currentUser['login'] != $this->input->post('login')) {
        $is_unique_email =  '|is_unique[utilisateur.login]';
    } else {
        $is_unique_email =  '';
    }
    $this->form_validation->set_rules('login', 'Email', 'required|valid_email'.$is_unique_email, array('is_unique' => 'This email is already taken.'));
    $this->form_validation->set_rules('role_id', 'Role', 'required|integer');

    if ($this->form_validation->run() === FALSE) {
        // Validation failed, reload the edit form with validation errors
        $this->edit($id);
    } else {
        // Validation passed, process the form data
        $data = [
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'login' => $this->input->post('login'),
            'role_id' => $this->input->post('role_id')
        ];

        // Check if password was provided
        if (!empty($this->input->post('mot_de_passe'))) {
            $data['mot_de_passe'] = password_hash($this->input->post('mot_de_passe'), PASSWORD_DEFAULT);
        }

        // Update the user record
        if ($this->User_model->update_user($id, $data)) {
            $this->session->set_flashdata('success', 'User updated successfully.');
        } else {
            $this->session->set_flashdata('error', 'There was a problem updating the user.');
        }

        redirect('user/index');
    }
}

// You need to create an edit method to load the edit form
public function edit($id) {
    access_only_for_admins();
    if (!$id) {
        show_404();
    }

    // Get the user's current data
    $data['user'] = $this->User_model->get_user_by_id($id);
    if (!$data['user']) {
        show_404();
    }

    // Load additional data needed for the edit form
    $data['roles'] = $this->Role_model->get_all_roles();

    $data['title'] = 'Edit User';
    $data['content'] = 'user/edit'; // The view file for the edit form
    $this->load->view('layout', $data);
}

    
    
    

    // Additional functions such as edit, update, delete...
}
