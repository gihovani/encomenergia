<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 */
class Sitemap extends MY_Controller
{
	public function __construct($isAdmin = false)
	{
		parent::__construct($isAdmin);
		$this->load->model('post_model');
	}

	public function index()
	{
		$filter = ['active' => 1];
		$data = [
			'items' => $this->post_model->items($filter, null, 'Post_model'),
		];
		$content = $this->load->view('sitemap/xml', $data, true);
		$this->show($content, 'text/xml');
	}
}
