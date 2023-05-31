<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->template->render_app('welcome_message');
	}

	public function harga()
	{
		$this->template->render_app('harga');
	}

	public function login()
	{
		$this->template->render_app('auth/login');
	}

	public function register()
	{
		$this->template->render_app('auth/register');
	}
}
