<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller {}

class User_Controller extends MY_Controller {
    public function __construct() {
        parent::__construct();

        if (!$this->session->has_userdata('id_user')) {
            redirect('welcome/login');
        }
    }
}

class Admin_Controller extends User_Controller {
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('role') == 'admin') {
            redirect('welcome/login');
        }
    }
}