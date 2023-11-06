<?php
// application/controllers/Employee.php
class Employee extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Post_model'); // This should match the class and file name exactly

    }

    public function index() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $data['posts'] = $this->Post_model->get_all_posts(); // Retrieve all posts
        $data['content'] = 'employee/index';
        $this->load->view('layout', $data); // Pass posts data to the view
    }


    public function create() {
        $data['posts'] = $this->Post_model->get_all_posts(); // Retrieve all posts
        $data['content'] = 'employee/create';
        $this->load->view('layout', $data); // Pass posts data to the create view
    }

    public function store() {
        $this->form_validation->set_rules('nom', 'Name', 'required');
        $this->form_validation->set_rules('prenom', 'Surname', 'required');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email|is_unique[employe.mail]');
        $this->form_validation->set_rules('adresse', 'Address', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');
        $this->form_validation->set_rules('post_id', 'Post', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->create();
        } else {
            $data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'mail' => $this->input->post('mail'),
                'adresse' => $this->input->post('adresse'),
                'telephone' => $this->input->post('telephone'),
                'post_id' => $this->input->post('post_id') // Make sure this matches your form and database field
            ];

            // If you want to hash the password before storing it
          

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
        if (!$employee) {
            show_404();
            return;
        }
    
        // Fetch all posts
        $posts = $this->Post_model->get_all_posts();
    
        // Prepare the data to pass to the view
        $data = [
            'content' => 'employee/edit',
            'employee' => $employee,
            'posts' => $posts
        ];
    
        // Load the view with the data
        $this->load->view('layout', $data);
    }
    

    public function update($id) {
        // Set form validation rules for fields other than password
        $this->form_validation->set_rules('nom', 'Name', 'required');
        $this->form_validation->set_rules('prenom', 'Surname', 'required');
        $this->form_validation->set_rules('mail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('adresse', 'Address', 'required');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');
        $this->form_validation->set_rules('post_id', 'Post', 'required');
    
       
        if ($this->form_validation->run() === FALSE) {
            // If validation fails, reload the edit form with validation errors
            $this->edit($id);
        } else {
            // Validation passed, process the form data
            $data = [
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'mail' => $this->input->post('mail'),
                'adresse' => $this->input->post('adresse'),
                'telephone' => $this->input->post('telephone'),
                'post_id' => $this->input->post('post_id'), // make sure to get the post_id
            ];
    
            // Update the employee record
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
