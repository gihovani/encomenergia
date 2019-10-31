<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 */
class Posts extends MY_Controller
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
			'items' => $this->post_model->items($filter, ITEMS_PER_PAGE, $offset, 'Post_model'),
			'count' => $count,
			'pagination' => $this->pagination->initialize([
				'base_url' => site_url('posts/index'),
				'total_rows' => $count,
				'enable_query_strings' => true
			])
		];
		$this->html('admin/post/index', $data);
	}

	public function create()
	{
		if ($this->form_validation->run()) {
			$this->post_model->insert();
			return $this->redirect('Post Criado Com Sucesso!', 'posts/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array()
		];
		return $this
			->setStaticFile('assets/ckeditor/ckeditor.js')
			->setStaticFile('assets/ckeditor/ckfinder.js')
			->setStaticFile('assets/js/ckeditor.js')
			->html('admin/post/create', $data);
	}

	public function update($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Post Não Encontrado!', 'posts/index');
		}
		if ($this->form_validation->run()) {
			$this->post_model->update($id);
			return $this->redirect('Post Atualizado Com Sucesso!', 'posts/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array(),
			'item' => $item
		];
		return $this
			->setStaticFile('assets/ckeditor/ckeditor.js')
			->setStaticFile('assets/ckeditor/ckfinder.js')
			->setStaticFile('assets/js/ckeditor.js')
			->html('admin/post/update', $data);
	}

	public function delete($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Post Não Encontrado!', 'banners/index');
		}

		$id = $this->post_model->delete($id);
		$this->redirect(($id ? 'Post Removido Com Sucesso!' : 'Post Não Pode Ser Removido!'), 'posts/index');
	}
}
