<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property User_model $user_model
 */
class Login extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

	public function index()
	{
        if ($this->form_validation->run()) {

            return $this->redirect(null, 'posts/index');
        }
        $data = [
            'errors' => $this->form_validation->error_array()
        ];

        return $this->html('admin/login', $data);
	}

	public function logout()
    {
        $this->session->unset_userdata('login');
        $this->redirect('Você foi desconectado com sucesso!', 'login/index');
    }

    public function login_check()
    {
        $login = $this->user_model->login();
        if ($login) {
            $this->session->set_userdata('login', $login);
            return TRUE;
        } else {
            $this->form_validation->set_message('login_check', 'The {field} is not valid.');
            return FALSE;
        }
    }
}
