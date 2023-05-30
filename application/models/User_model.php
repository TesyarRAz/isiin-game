<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function userWhere($where)
    {
        return $this->db->where($where)->get('tbl_user')->row_array();
    }
}