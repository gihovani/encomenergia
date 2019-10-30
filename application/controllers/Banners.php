<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Banner_model $banner_model
 */
class Banners extends MY_Controller
{
	public function __construct($isAdmin = true)
	{
		parent::__construct($isAdmin);
		$this->load->model('banner_model');
	}

	public function index($offset = 0)
	{
		$filter = [];
		$count = $this->banner_model->count($filter);
		$offset = intval($offset);
		if ($offset < 0) {
			$offset = 0;
		}
		$data = [
			'items' => $this->banner_model->items($filter, ITEMS_PER_PAGE, $offset, 'Banner_model'),
			'count' => $count,
			'pagination' => $this->pagination->initialize([
				'base_url' => site_url('banners/index'),
				'total_rows' => $count
			])
		];
		$this->html('admin/banner/index', $data);
	}

	public function create()
	{
		if ($this->form_validation->run()) {
			$this->banner_model->insert();
			return $this->redirect('Banner Criado Com Sucesso!', 'banners/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array()
		];
		return $this->html('admin/banner/create', $data);
	}

	public function update($id = 0)
	{
		$item = $this->banner_model->item($id, 'id', 'Banner_model');
		if (!$item) {
			return $this->redirect('Banner Não Encontrado!', 'banners/index');
		}
		if ($this->form_validation->run()) {
			$this->banner_model->update($id);
			return $this->redirect('Banner Atualizado Com Sucesso!', 'banners/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array(),
			'item' => $item
		];
		return $this->html('admin/banner/update', $data);
	}

	public function delete($id = 0)
	{
		$item = $this->banner_model->item($id, 'id', 'Banner_model');
		if (!$item) {
			return $this->redirect('Banner Não Encontrado!', 'banners/index');
		}

		$id = $this->banner_model->delete($id);
		$this->redirect(($id ? 'Banner Removido Com Sucesso!' : 'Banner Não Pode Ser Removido!'), 'banners/index');
	}
}
