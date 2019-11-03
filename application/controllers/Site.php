<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 * @property Banner_model $banner_model
 * @property Contact_model $contact_model
 * @property Config_model $config_model
 */
class Site extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('banner_model');
		$this->load->model('contact_model');
		$this->load->model('config_model');
	}

	public function view($page = 'home')
	{
		$data = $this->getData($page);
		if (!file_exists(APPPATH . 'views/site/' . $page . '.php')) {
			$page = $data->type;
		}

		$this->html('site/' . $page, $data);
	}

	public function files($file)
	{
		$content = '';
		$fileInfo = pathinfo($file);
		$data = $this->getData($fileInfo['filename']);
		$extension = $fileInfo['extension'];
		if ($extension === 'js') {
			$content = $data->scripts;
		} elseif ($extension === 'css') {
			$content = $data->styles;
		}
		$this->show($content, $extension);
	}

	public function submit()
	{
		if ($this->form_validation->run()) {
			$post = $this->input->post();
			$response = [
				'success' => true,
				'post' => $post,
				'email_sended' => $this->contact_model->insert()
			];
			$this->redirect('Sua mensagem foi enviada com sucesso!', '/');
		} else {
			$error = '<ul>'.$this->form_validation->error_string('<li>', '</li>').'</ul>';
			$this->redirect($error, 'contato');
		}

		$this->show(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	protected function getListPage($type = null, $baseUrl = 'noticias')
	{
		$term = $this->input->get('termo');
		$filter = ['active' => 1];
		if ($type) {
			$filter['type'] = $type;
		} else {
			$baseUrl .= '?termo='.$term;
			$filter[] = ['operator' => 'like', 'field' => 'content', 'value' => $term];
			$filter[] = ['operator' => 'order_by', 'field' => 'type', 'value' => 'desc'];
			$filter[] = ['operator' => 'order_by', 'field' => 'id', 'value' => 'desc'];
		}
		$offset = intval($this->input->get('per_page'));
		$count = $this->post_model->count($filter);
		$itens = $this->post_model->items($filter, 10, $offset, 'Post_model');
		$pagination = $this->pagination->initialize([
			'page_query_string' => true,
			'base_url' => site_url($baseUrl),
			'total_rows' => $count
		]);
		return ['itens' => $itens, 'pagination' => $pagination, 'term' => $term];
	}
	protected function getData($page)
	{
		/** @var Post_model $data */
		$data = $this->post_model->item($page, 'slug', 'Post_model');
		if (empty($data)) {
			show_404();
		}
		$data->image = $data->getImageUrl();
		$filterLastPosts = ['type' => 'post', 'active' => 1, ['operator' => 'order_by', 'field' => 'id', 'value' => 'desc']];
		$filterServices = ['type' => 'service', 'active' => 1, ['operator' => 'order_by', 'field' => 'title', 'value' => 'asc']];
		if ($page === 'home') {
			$this
				->setStaticFile('node_modules/slick-carousel/slick/slick.css')
				->setStaticFile('node_modules/slick-carousel/slick/slick.min.js');
			$data->posts = $this->post_model->items($filterLastPosts, 4, 0, 'Post_model');
			$data->banners = $this->banner_model->items([], NULL, NULL, 'Banner_model');
		} elseif($page === 'noticias') {
			$itens = $this->getListPage('post', $page);
			$data->posts = $itens['itens'];
			$data->pagination = $itens['pagination'];
		} elseif($page === 'servicos') {
			$itens = $this->getListPage('service', $page);
			$data->posts = $itens['itens'];
			$data->pagination = $itens['pagination'];
		} elseif($page === 'buscar') {
			$itens = $this->getListPage(null, $page);
			$data->posts = $itens['itens'];
			$data->pagination = $itens['pagination'];
		} else {
			$data->posts = $this->post_model->items($filterLastPosts, 2, 0, 'Post_model');
		}

		$data->config = $this->config_model->item(1);
		$data->services = $this->post_model->items($filterServices, NULL, NULL, 'Post_model');
		if (isset($data->scripts) && !empty($data->scripts)) {
			$this->setStaticFile('files/' . $page . '.js');
		}
		if (isset($data->styles) && !empty($data->styles)) {
			$this->setStaticFile('files/' . $page . '.css');
		}
		return $data;
	}


}
