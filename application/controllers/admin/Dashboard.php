<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
    public function index()
    {
        $this->template->render_admin('admin/index');
    }
}
