<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		if ($kode = $this->input->get('kode')) {
			if ($this->pengisian_model->exists(['kode_pengisian' => $kode])) {
				$this->pengisian_model->add_user_to_pengisian(['kode_pengisian' => $kode], ['id_user' => $this->session->userdata('id_user')]);

				redirect('game');
			}
			
			redirect('welcome');
		}

		$data = [];

		if ($this->session->has_userdata('id_user')) {
			$data['pengisian'] = $this->pengisian_model->where(['id_user' => $this->session->userdata('id_user')])->latest()->all();
		}

		$this->template->render_app('welcome_message', $data);
	}

	public function harga()
	{
		$this->template->render_app('harga');
	}

	public function login()
	{
		if ($this->session->has_userdata('id_user')) {
			redirect('/');
		}

		$this->template->render_app('auth/login');
	}

	public function register()
	{
		if ($this->session->has_userdata('id_user')) {
			redirect('/');
		}

		$this->template->render_app('auth/register');
	}
}
