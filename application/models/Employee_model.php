<?php 
// application/models/Employee_model.php
class Employee_model extends CI_Model {
    
    protected $table = 'employe';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_all_employees() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_employee_by_id($id) {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row_array();
    }

    // Add other necessary methods...
}
