<?php
// application/controllers/User.php
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $data['title'] = 'User List'; // Add page title here
        $data['users'] = $this->user_model->get_users(); // Assuming you have a method to get users
        $data['content'] = 'user/index'; // The view file that will be loaded into the layout
        $this->load->view('layout', $data);
    }
    

    public function create() {
        $this->load->view('user/create');
    }

    public function store() {
        // Get form data
        $data = [
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'login' => $this->input->post('login'),
            'mot_de_passe' => password_hash($this->input->post('mot_de_passe'), PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        ];

        // Validate data and save through model
        if ($this->User_model->create($data)) {
            redirect('user/index');
        } else {
            // Load the form view again with error messages
        }
    }

    // Additional functions such as edit, update, delete...
}
