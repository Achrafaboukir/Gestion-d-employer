<?php
// application/controllers/Employee.php
class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
    }

    public function index() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('employee/index', $data);
    }

    public function create() {
        $this->load->view('employee/create');
    }

    public function store() {
        // Get form data
        $data = [
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'mail' => $this->input->post('mail'),
            'adresse' => $this->input->post('adresse'),
            'telephone' => $this->input->post('telephone'),
            'poste' => $this->input->post('poste')
        ];

        // Validate data and save through model
        if ($this->Employee_model->create($data)) {
            redirect('employee/index');
        } else {
            // Load the form view again with error messages
        }
    }

    // Additional functions such as edit, update, delete...
}
