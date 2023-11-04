<?php
// application/models/User_model.php
class User_model extends CI_Model {
    
    protected $table = 'utilisateur';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create($data) {
        return $this->db->insert($this->table, $data);
    }

    public function get_all_users() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_user_by_id($id) {
        $query = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row_array();
    }

    // Add other necessary methods...
}
