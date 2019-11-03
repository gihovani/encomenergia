<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 */
class Pages extends MY_Controller
{
	public function __construct($isAdmin = true)
	{
		parent::__construct($isAdmin);
		$this->load->model('post_model');
	}

	public function index($offset = 0)
	{
		$filter = ['type' => 'page'];
		$count = $this->post_model->count($filter);
		$offset = intval($offset);
		if ($offset < 0) {
			$offset = 0;
		}
		$data = [
			'items' => $this->post_model->items($filter, ITEMS_PER_PAGE, $offset, 'Post_model'),
			'count' => $count,
			'pagination' => $this->pagination->initialize([
				'base_url' => site_url('pages/index'),
				'total_rows' => $count
			])
		];
		$this->html('admin/page/index', $data);
	}

	public function create()
	{
		if ($this->form_validation->run()) {
			$this->post_model->insert();
			return $this->redirect('Página Criada Com Sucesso!', 'pages/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array()
		];
		return $this
			->setStaticFile('assets/ckeditor/ckeditor.js')
			->setStaticFile('assets/ckeditor/ckfinder.js')
			->setStaticFile('assets/js/ckeditor.js')
			->html('admin/page/create', $data);
	}

	public function update($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Página Não Encontrada!', 'pages/index');
		}
		if ($this->form_validation->run()) {
			$this->post_model->update($id);
			return $this->redirect('Página Atualizada Com Sucesso!', 'pages/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array(),
			'item' => $item
		];
		return $this
			->setStaticFile('assets/ckeditor/ckeditor.js')
			->setStaticFile('assets/ckeditor/ckfinder.js')
			->setStaticFile('assets/js/ckeditor.js')
			->html('admin/page/update', $data);
	}

	public function delete($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Página Não Encontrada!', 'pages/index');
		}

		$id = $this->post_model->delete($id);
		$this->redirect(($id ? 'Página Removida Com Sucesso!' : 'Página Não Pode Ser Removida!'), 'pages/index');
	}
}
