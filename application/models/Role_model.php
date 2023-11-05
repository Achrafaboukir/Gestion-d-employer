<?php
// application/models/Role_model.php
class Role_model extends CI_Model {
    
    protected $table = 'roles';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_roles() {
        $query = $this->db->get($this->table);
        return $query->result_array(); // Return the result as an array of roles
    }

    public function get_role_by_name($role_name) {
        $this->db->where('role_name', $role_name);
        $query = $this->db->get($this->table);
        return $query->row_array(); // Return a single row result as an array
    }


    // Other methods...
}
