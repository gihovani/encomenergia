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
 * @property CI_URI $uri
 */
class MY_Controller extends CI_Controller
{
	protected $data;
	protected $isAdmin;
	protected $staticFiles = ['css' => [], 'js' => []];

	public function __construct($isAdmin = false)
	{
		$this->isAdmin = $isAdmin;
		parent::__construct();
		$this->checkLogin();
		$this->setDefaultStaticFiles();
	}

	protected function setDefaultStaticFiles()
	{
		$this
			->setStaticFile('node_modules/bootstrap/dist/css/bootstrap.min.css')
			->setStaticFile('node_modules/jquery/dist/jquery.min.js')
			->setStaticFile('node_modules/popper.js/dist/umd/popper.min.js')
			->setStaticFile('node_modules/bootstrap/dist/js/bootstrap.min.js');
	}

	protected function checkLogin()
	{
		if ($this->isAdmin && !$this->session->userdata('login')) {
			$this->redirect('Você foi não tem permissão para acessar esta página!', 'login/index');
		}
	}

	protected function redirect($message = null, $redirectUrl = '/')
	{
		if ($message) {
			$this->session->set_flashdata('message', $message);
		}
		redirect($redirectUrl);
	}

	public function doUpload()
	{
		$field = 'image';
		if (!(isset($_FILES[$field]) && !empty($_FILES[$field]['name']))) {
			return true;
		}

		if (!$this->upload->do_upload($field)) {
			$this->form_validation->set_message('do_upload', 'The '.$field.' is not valid: (' . $this->upload->display_errors('', '') . ')');
			return false;
		} else {
			$_POST[$field] = $this->upload->data('file_name');
			return true;
		}
	}

	public function setStaticFile($filePath)
	{
		if (strpos($filePath, 'http') === false) {
			$filePath = base_url($filePath);
		}

		if (strpos($filePath, '.css') !== false) {
			$this->staticFiles['css'][] = $filePath;
		} elseif (strpos($filePath, '.js') !== false) {
			$this->staticFiles['js'][] = $filePath;
		}
		return $this;
	}

	public function html($page, $data)
	{
		$this->data = $data;
		$this->setData('message', $this->session->flashdata('message'));

		if ($this->router->class === 'site') {
			$this
				->setStaticFile('assets/css/style.css?v='.SITE_VERSION)
				->setStaticFile('assets/js/default.js?v='.SITE_VERSION);
			return $this->template(['site/top', 'templates/message', $page, 'site/bottom']);
		}

		$this->setStaticFile('assets/css/admin.css');
		if ($this->isAdmin) {
			$this->setData('menuActive', $this->router->class);
			$this->setData('login', $this->session->userdata('login'));
			return $this->template(['admin/navbar', 'templates/message', $page]);
		}

		return $this->template([$page]);
	}

	public function setData($key, $value)
	{
		if (is_array($this->data)) {
			$this->data[$key] = $value;
		} elseif (is_object($this->data)) {
			$this->data->{$key} = $value;
		}
	}

	protected function template($templateFiles = [])
	{
		$this->setData('js', $this->staticFiles['js']);
		$this->setData('css', $this->staticFiles['css']);
		$this->load->view('templates/header', $this->data);
		foreach ($templateFiles as $view) {
			$this->load->view($view, $this->data);
		}
		$this->load->view('templates/footer', $this->data);
	}

	public function show($content, $mimeType = 'json', $statusCode = 200)
	{
		$this->output
			->set_status_header($statusCode)
			->set_content_type($mimeType, 'utf-8')
			->set_output($content)
			->_display();
		exit;
	}
}
