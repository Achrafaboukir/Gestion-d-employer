<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function login($username, $password) {
        // Validate the user can login
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Assuming the password is stored as an md5 hash
        $result = $this->db->get('users');

        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

}
