<?php
class User_model extends CI_Model {
    
    protected $userTable = 'utilisateur';
    protected $roleTable = 'roles';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_all_users() {
        $this->db->select('u.id, u.nom, u.prenom, u.login, r.role_name');
        $this->db->from('utilisateur u');
        $this->db->join('roles r', 'u.role_id = r.role_id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->userTable);
    }

    public function get_user_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->userTable);
        return $query->row_array(); // Assuming you want to get a single row as an array
    }
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('utilisateur', $data);
    }

    public function create($data) {
        $insert = $this->db->insert('utilisateur', $data);
        if($insert){
            return $this->db->insert_id(); // returns the ID of the inserted row
        } else {
            return false; // return false if insert failed
        }
    }
    

    // ... other methods ...
}
