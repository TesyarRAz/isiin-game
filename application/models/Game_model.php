<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game_model extends CI_Model {
    public function latest()
    {
        $this->db->order_by('id_game', 'desc');

        return $this;
    }

    public function latest_kategori()
    {
        $this->db->order_by('id_kategori', 'desc');

        return $this;
    }

    public function page($limit, $page)
    {
        $this->db->limit($limit, $page);

        return $this;
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_game');
    }

    public function all()
    {
        return $this->db->get('tbl_game')->result_array();
    }

    public function all_kategori()
    {
        return $this->db->get('tbl_kategori')->result_array();
    }
}