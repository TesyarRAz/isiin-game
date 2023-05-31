<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengisian_model extends CI_Model
{
    public function latest()
    {
        $this->db->order_by('id_pengisian', 'desc');

        return $this;
    }

    public function all()
    {
        $pengisians = $this->db->get('tbl_pengisian')->result_array();

        if (!empty($pengisians)) {
            $games = $this->db->select('tbl_pengisian_game.id_pengisian, tbl_game.id_game, tbl_game.nama_game')
                ->join('tbl_game', 'tbl_game.id_game = tbl_pengisian_game.id_game')
                ->where_in('tbl_pengisian_game.id_pengisian', array_map(fn ($e) => $e['id_pengisian'], $pengisians))
                ->get('tbl_pengisian_game')
                ->result_array();

            for ($i = 0; $i < count($pengisians); $i++) {
                $pengisians[$i]['games'] = array_filter($games, fn ($e) => $e['id_pengisian'] == $pengisians[$i]['id_pengisian']);
            }
        }

        return $pengisians;
    }

    public function page($limit, $page)
    {
        $this->db->limit($limit, $page);

        return $this;
    }

    public function count_all()
    {
        return $this->db->count_all('tbl_pengisian');
    }

    public function insert($data)
    {
        $this->db->insert('tbl_pengisian', $data);

        return $this->db->insert_id();
    }

    public function sync_pengisian_game($id_pengisian, $games)
    {
        $this->db->delete('tbl_pengisian_game', ['id_pengisian' => $id_pengisian]);
        $this->db->insert_batch('tbl_pengisian_game', array_map(fn ($e) => [
            'id_game' => $e,
            'id_pengisian' => $id_pengisian,
        ], array_values($games)));
    }

    public function first_where($where)
    {
        return $this->db->where($where)->get('tbl_pengisian')->row_array();
    }

    public function pengisian_ids_games($id_pengisian)
    {
        return array_map(fn ($e) => $e['id_game'], $this->db->where('id_pengisian', $id_pengisian)->get('tbl_pengisian_game')->result_array());
    }

    public function update($where, $data)
    {
        return $this->db->where($where)->update('tbl_pengisian', $data);
    }

    public function delete($where)
    {
        return $this->db->delete('tbl_pengisian', $where);
    }
}