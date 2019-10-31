<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 */
class Services extends MY_Controller
{
	public function __construct($isAdmin = true)
	{
		parent::__construct($isAdmin);
		$this->load->model('post_model');
	}

	public function index($offset = 0)
	{
		$filter = ['type' => 'service'];
		$count = $this->post_model->count($filter);
		$offset = intval($offset);
		if ($offset < 0) {
			$offset = 0;
		}
		$data = [
			'items' => $this->post_model->items($filter, ITEMS_PER_PAGE, $offset, 'Post_model'),
			'count' => $count,
			'pagination' => $this->pagination->initialize([
				'base_url' => site_url('services/index'),
				'total_rows' => $count
			])
		];
		$this->html('admin/service/index', $data);
	}

	public function create()
	{
		if ($this->form_validation->run()) {
			$this->post_model->insert();
			return $this->redirect('Serviço Criado Com Sucesso!', 'services/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array()
		];
		return $this
			->setStaticFile('assets/ckeditor/ckeditor.js')
			->setStaticFile('assets/ckeditor/ckfinder.js')
			->setStaticFile('assets/js/ckeditor.js')
			->html('admin/service/create', $data);
	}

	public function update($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Serviço Não Encontrado!', 'services/index');
		}
		if ($this->form_validation->run()) {
			$this->post_model->update($id);
			return $this->redirect('Serviço Atualizado Com Sucesso!', 'services/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array(),
			'item' => $item
		];
		return $this
			->setStaticFile('assets/ckeditor/ckeditor.js')
			->setStaticFile('assets/ckeditor/ckfinder.js')
			->setStaticFile('assets/js/ckeditor.js')
			->html('admin/service/update', $data);
	}

	public function delete($id = 0)
	{
		$item = $this->post_model->item($id, 'id', 'Post_model');
		if (!$item) {
			return $this->redirect('Serviço Não Encontrado!', 'services/index');
		}

		$id = $this->post_model->delete($id);
		$this->redirect(($id ? 'Serviço Removido Com Sucesso!' : 'Serviço Não Pode Ser Removido!'), 'services/index');
	}
}
