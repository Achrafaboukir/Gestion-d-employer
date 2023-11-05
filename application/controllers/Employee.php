<?php
// application/controllers/Employee.php
class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('layout', ['content' => 'employee/index', 'employees' => $data['employees']]);
    }

    public function create() {
        // If there are roles or posts to select, you should load them from a model as well
        $this->load->view('layout', ['content' => 'employee/create']);
    }

    public function store() {
        $this->form_validation->set_rules('nom', 'Name', 'required');
        $this->form_validation->set_rules('prenom', 'Surname', 'required');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email|is_unique[employee.mail]');
        $this->form_validation->set_rules('adresse', 'Address', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');
        $this->form_validation->set_rules('poste', 'Post', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            $data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'mail' => $this->input->post('mail'),
                'adresse' => $this->input->post('adresse'),
                'telephone' => $this->input->post('telephone'),
                'poste' => $this->input->post('poste')
            ];

            // If you want to hash the password before storing it
            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            if ($this->Employee_model->create($data)) {
                $this->session->set_flashdata('success', 'Employee created successfully.');
                redirect('employee/index');
            } else {
                $this->session->set_flashdata('error', 'There was a problem creating the employee.');
                redirect('employee/create');
            }
        }
    }

    public function edit($id) {
        // Fetch the employee data for editing
        $employee = $this->Employee_model->get_employee_by_id($id);
        $this->load->view('layout', ['content' => 'employee/edit', 'employee' => $employee]);
    }

    public function update($id) {
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id);
        } else {
            $data = [
                // ... Other fields ...
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Hash the password
                // ... Other fields ...
            ];

            if ($this->Employee_model->update_employee($id, $data)) {
                $this->session->set_flashdata('success', 'Employee updated successfully.');
                redirect('employee/index');
            } else {
                $this->session->set_flashdata('error', 'There was a problem updating the employee.');
                $this->edit($id);
            }
        }
    }

    public function delete($id) {
        if ($this->Employee_model->delete_employee($id)) {
            $this->session->set_flashdata('success', 'Employee deleted successfully.');
        } else {
            $this->session->set_flashdata('error', 'There was a problem deleting the employee.');
        }
        redirect('employee/index');
    }

    // The rest of your CRUD operations like edit, update, delete etc.
}
