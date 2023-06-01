<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Game extends CI_Controller
{
    public function index()
    {
        $config["base_url"] = site_url('game');
        $config["total_rows"] = $this->game_model->count_all();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        
        $this->template->setup_pagination($config);
        $this->pagination->initialize($config);
        
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['games'] = $this->game_model->latest()->page($config['per_page'], $page)->all();

        if ($id_pengisian = $this->session->userdata('id_pengisian')) {
            $data['active_pengisian'] = $this->pengisian_model->latest()->first_where(['id_pengisian' => $id_pengisian]);
        }

        $this->template->render_app('game', $data);
    }
}
