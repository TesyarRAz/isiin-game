<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Harus mengisi %s',
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Harus mengisi %s',
        ]);

        if ($this->form_validation->run() == FALSE) {
            return redirect('welcome/login');
        }

        $credentials = $this->input->post(['username', 'password']);

        if ($user = $this->user_model->userWhere(['username' => $credentials['username']])) {
            if (password_verify($credentials['password'], $user['password'])) {
                unset($user['password']);
                
                $this->session->set_userdata($user);

                redirect('admin');
            }
        }

        $this->session->set_flashdata('message', 'Username atau password salah');
        redirect('welcome/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('/');
    }
}
