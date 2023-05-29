<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
    private $instance;

    public function __construct() {
        $this->instance = &get_instance();
    }

    public function render_admin($content, $data = [])
    {   
		$this->instance->load->view('templates/admin/index', [
            'topbar' => $this->instance->load->view('templates/admin/topbar', [], true),
            'sidebar' => $this->instance->load->view('templates/admin/sidebar', [], true),
            'content' => $this->instance->load->view($content, $data, true),
            'footer' => $this->instance->load->view('templates/admin/footer', [], true),
        ]);
    }
}