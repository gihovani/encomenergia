<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Config_model $config_model
 */
class Configs extends MY_Controller
{
	public function __construct($isAdmin = true)
	{
		parent::__construct($isAdmin);
		$this->load->model('config_model');
	}

	public function index($offset = 0)
	{
		$filter = [];
		$count = $this->config_model->count($filter);
		$offset = intval($offset);
		if ($offset < 0) {
			$offset = 0;
		}
		$data = [
			'items' => $this->config_model->items($filter, ITEMS_PER_PAGE, $offset, 'Config_model', 'id desc'),
			'count' => $count,
			'pagination' => $this->pagination->initialize([
				'base_url' => site_url('configs/index'),
				'total_rows' => $count
			])
		];
		$this->html('admin/config/index', $data);
	}

	public function create()
	{
		if ($this->form_validation->run()) {
			$this->config_model->insert();
			return $this->redirect('Configuração Criada Com Sucesso!', 'configs/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array()
		];
		return $this->html('admin/config/create', $data);
	}

	public function update($id = 0)
	{
		$item = $this->config_model->item($id, 'id', 'Config_model');
		if (!$item) {
			return $this->redirect('Configuração Não Encontrada!', 'configs/index');
		}
		if ($this->form_validation->run()) {
			$this->config_model->update($id);
			return $this->redirect('Configuração Atualizada Com Sucesso!', 'configs/update/'.$id);
		}

		$data = [
			'errors' => $this->form_validation->error_array(),
			'item' => $item
		];
		return $this->html('admin/config/update', $data);
	}

	public function delete($id = 0)
	{
		$item = $this->config_model->item($id, 'id', 'Config_model');
		if (!$item) {
			return $this->redirect('Configuração Não Encontrada!', 'configs/index');
		}

		$id = $this->config_model->delete($id);
		$this->redirect(($id ? 'Configuração Removida Com Sucesso!' : 'Configuração Não Pode Ser Removida!'), 'configs/index');
	}
}
