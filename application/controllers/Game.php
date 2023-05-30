<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller {
    public function index()
    {
        $data['games'] = $this->game_model->latest()->all();

        $this->template->render_app('game', $data);
    }
}