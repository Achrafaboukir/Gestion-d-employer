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
        $this->db->select('employe.*, posts.post_name');
        $this->db->from('employe');
        $this->db->join('posts', 'posts.post_id = employe.post_id', 'left'); // Adjust the join to match your table structure
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function get_employee_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }
    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
    public function delete_employee($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    // Add other necessary methods...
}
