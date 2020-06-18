<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 */
class Cms extends MY_Controller
{
	public function __construct($isAdmin = true)
	{
		parent::__construct($isAdmin);
		$this->load->model('post_model');
	}

	public function index($offset = 0)
	{
		$filter = [];
		$count = $this->post_model->count($filter);
		$offset = intval($offset);
		if ($offset < 0) {
			$offset = 0;
		}
		$data = [
			'items' => $this->post_model->items($filter, ITEMS_PER_PAGE, $offset, 'Post_model', 'id desc'),
			'count' => $count,
			'pagination' => $this->pagination->initialize([
				'base_url' => site_url('cms/index'),
				'total_rows' => $count
			])
		];
		$this->html('admin/cms/index', $data);
	}

	public function create()
	{
		if ($this->form_validation->run()) {
			$this->post_model->insert();
			return $this->redirect('Post Criado Com Sucesso!', 'cms/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array()
		];
		return $this
			->html('admin/cms/create', $data);
	}

	public function update($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Conteúdo Não Encontrado!', 'cms/index');
		}
		if ($this->form_validation->run()) {
			$this->post_model->update($id);
			return $this->redirect('Conteúdo Atualizado Com Sucesso!', 'cms/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array(),
			'item' => $item
		];
		return $this
			->html('admin/cms/update', $data);
	}

	public function delete($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Conteúdo Não Encontrado!', 'cms/index');
		}

		$id = $this->post_model->delete($id);
		$this->redirect(($id ? 'Conteúdo Removido Com Sucesso!' : 'Conteúdo Não Pode Ser Removido!'), 'cms/index');
	}
}
