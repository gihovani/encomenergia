<?php
/**
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_Form_validation $form_validation
 * @property CI_Output $output
 * @property CI_Session $session
 * @property CI_Pagination $pagination
 * @property CI_Upload $upload
 * @property CI_Router $router
 */
class MY_Controller extends CI_Controller
{
    protected $isAdmin;
    public function __construct($isAdmin = false)
    {
        $this->isAdmin = $isAdmin;
        parent::__construct();
        $this->checkLogin();
    }

    protected function checkLogin()
    {
        if ($this->isAdmin && !$this->session->userdata('login')) {
            $this->redirect('Você foi não tem permissão para acessar esta página!', 'login/index');
        }
    }

    protected function html($page, $data)
    {
        $message = $this->session->flashdata('message');
        if (is_array($data)) {
            $data['message'] = $message;
        } elseif(is_object($data)) {
            $data->message = $message;
        }

        $this->load->view('templates/header', $data);
        if ($this->isAdmin) {
            $data['menuActive'] = $this->router->class;
            $data['login'] = $this->session->userdata('login');
            $this->load->view('admin/navbar', $data);
        }
        if ($this->router->class === 'pages') {
			$this->load->view('pages/top', $data);
		}
        $this->load->view($page, $data);
		if ($this->router->class === 'pages') {
			$this->load->view('pages/bottom', $data);
		}
        $this->load->view('templates/footer', $data);
    }

    protected function show($content, $mimeType = 'json', $statusCode = 200)
    {
        $this->output
            ->set_status_header($statusCode)
            ->set_content_type($mimeType, 'utf-8')
            ->set_output($content)
            ->_display();
        exit;
    }

    protected function redirect($message = null, $redirectUrl = '/')
    {
        if ($message) {
            $this->session->set_flashdata('message', $message);
        }
        redirect($redirectUrl);
    }

    public function do_upload()
    {
        if (!(isset($_FILES['image']) && !empty($_FILES['image']['name']))) {
            return true;
        }

        if ( ! $this->upload->do_upload('image'))
        {
            $this->form_validation->set_message('do_upload', 'The image is not valid: ('.$this->upload->display_errors('', '').')');
            return false;
        } else {
            $_POST['image'] = $this->upload->data('file_name');
            return true;
        }
    }
}
