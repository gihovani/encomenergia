<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 * @property Banner_model $banner_model
 * @property Contact_model $contact_model
 * @property Config_model $config_model
 * @property Client_model $client_model
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
		$this->load->model('client_model');
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
			$error = '<ul>' . $this->form_validation->error_string('<li>', '</li>') . '</ul>';
			$this->redirect($error, 'contato');
		}

		$this->show(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
	}

	protected function getListPage($type = null, $baseUrl = 'noticias')
	{
		$term = $this->input->get('termo', true);
		$filter = ['active' => 1];
		if ($type) {
			$filter['type'] = $type;
		} else {
			$baseUrl .= '?termo=' . $term;
			$filter[] = ['operator' => 'like', 'field' => 'content', 'value' => $term];
			$filter[] = ['operator' => 'order_by', 'field' => 'type', 'value' => 'desc'];
			$filter[] = ['operator' => 'order_by', 'field' => 'id', 'value' => 'desc'];
		}
		$offset = intval($this->input->get('per_page'));
		$count = $this->post_model->count($filter);
		$items = $this->post_model->items($filter, 10, $offset, 'Post_model');
		$pagination = $this->pagination->initialize([
			'page_query_string' => true,
			'base_url' => site_url($baseUrl),
			'total_rows' => $count
		]);
		return ['items' => $items, 'pagination' => $pagination, 'term' => $term];
	}

	private function filterLastPosts($slug)
	{
		return [
			'type' => 'post',
			'active' => 1,
			[
				'operator' => 'where',
				'field' => 'slug !=',
				'value' => $slug
			],
			[
				'operator' => 'order_by',
				'field' => 'id',
				'value' => 'desc'
			]
		];

	}

	private function filterLastServices($slug)
	{
		return [
			'type' => 'service',
			'active' => 1,
			[
				'operator' => 'where',
				'field' => 'slug !=',
				'value' => $slug
			],
			[
				'operator' => 'order_by',
				'field' => 'id',
				'value' => 'asc'
			]
		];
	}

	protected function getData($page)
	{
		/** @var Post_model $data */
		$data = $this->post_model->item($page, 'slug', 'Post_model');
		if (empty($data)) {
			show_404();
		}
		$filterLastPosts = $this->filterLastPosts($page);
		$filterServices = $this->filterLastServices($page);
		$data->image = $data->getImageUrl();
		$data->config = $this->config_model->item(1);
		$data->services = $this->post_model->items($filterServices, NULL, NULL, 'Post_model');
		if ($page === 'home') {
			$this
				->setStaticFile('node_modules/slick-carousel/slick/slick.css')
				->setStaticFile('node_modules/slick-carousel/slick/slick.min.js');
			$data->posts = $this->post_model->items($filterLastPosts, 4, 0, 'Post_model');
			$data->banners = $this->banner_model->items([], NULL, NULL, 'Banner_model');
		} elseif ($page === 'noticias') {
			$items = $this->getListPage('post', $page);
			$data->posts = $items['items'];
			$data->pagination = $items['pagination'];
		} elseif ($page === 'servicos') {
			if (count($data->services)) {
				$service = $data->services[0];
				return $this->redirect(null, $service->slug);
			}
			$items = $this->getListPage('service', $page);
			$data->posts = $items['items'];
			$data->pagination = $items['pagination'];
		} elseif ($page === 'portfolio') {
			$this
				->setStaticFile('node_modules/isotope-layout/dist/isotope.pkgd.min.js')
				->setStaticFile('node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css')
				->setStaticFile('node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.js')
				->setStaticFile('assets/js/isotope.js');
			$items = $this->client_model->items(null, null, null, 'Client_model');
			$categories = [];
			foreach ($items as $item) {
				$categories[$item->category] = $item->category;
			}
			$data->items = $items;
			$data->categories = $categories;
		} elseif ($page === 'buscar') {
			$items = $this->getListPage(null, $page);
			$data->title .= ' ' . $this->input->get('termo', true);
			$data->posts = $items['items'];
			$data->pagination = $items['pagination'];
		} else {
			$data->posts = $this->post_model->items($filterLastPosts, 2, 0, 'Post_model');
		}

		if (isset($data->scripts) && !empty($data->scripts)) {
			$this->setStaticFile('files/' . $page . '.js');
		}
		if (isset($data->styles) && !empty($data->styles)) {
			$this->setStaticFile('files/' . $page . '.css');
		}
		return $data;
	}


}
