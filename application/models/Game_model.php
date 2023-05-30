<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {
    public function latest()
    {
        $this->db->order_by('id_game', 'desc');

        return $this;
    }

    public function all()
    {
        return $this->db->get('tbl_game')->result_array();
    }
}