<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model {

    protected $table = 'posts';

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Make sure to load the database library
    }

    // Function to insert predefined posts
    public function insert_posts() {
        $posts = [
            ['post_name' => 'gérant'],
            ['post_name' => 'cuisinier'],
            ['post_name' => 'livreur']
        ];

        // Insert posts into the database
        $this->db->insert_batch($this->table, $posts);
    }

    // Function to get all posts
    public function get_all_posts() {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }


    // Additional functions as needed for CRUD operations
    // ...

}

