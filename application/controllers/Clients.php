<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Client_model $client_model
 */
class Clients extends MY_Controller
{
	public function __construct($isAdmin = true)
	{
		parent::__construct($isAdmin);
		$this->load->model('client_model');
	}

	public function index($offset = 0)
	{
		$filter = [];
		$count = $this->client_model->count($filter);
		$offset = intval($offset);
		if ($offset < 0) {
			$offset = 0;
		}
		$data = [
			'items' => $this->client_model->items($filter, ITEMS_PER_PAGE, $offset, 'Client_model'),
			'count' => $count,
			'pagination' => $this->pagination->initialize([
				'base_url' => site_url('clients/index'),
				'total_rows' => $count
			])
		];
		$this->html('admin/client/index', $data);
	}

	public function create()
	{
		if ($this->form_validation->run()) {
			$this->client_model->insert();
			return $this->redirect('Cliente Criado Com Sucesso!', 'clients/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array()
		];
		return $this->html('admin/client/create', $data);
	}

	public function update($id = 0)
	{
		$item = $this->client_model->item($id, 'id', 'Client_model');
		if (!$item) {
			return $this->redirect('Cliente Não Encontrado!', 'clients/index');
		}
		if ($this->form_validation->run()) {
			$this->client_model->update($id);
			return $this->redirect('Cliente Atualizado Com Sucesso!', 'clients/index');
		}

		$data = [
			'errors' => $this->form_validation->error_array(),
			'item' => $item
		];
		return $this->html('admin/client/update', $data);
	}

	public function delete($id = 0)
	{
		$item = $this->client_model->item($id, 'id', 'Client_model');
		if (!$item) {
			return $this->redirect('Cliente Não Encontrado!', 'clients/index');
		}

		$id = $this->client_model->delete($id);
		$this->redirect(($id ? 'Cliente Removido Com Sucesso!' : 'Cliente Não Pode Ser Removido!'), 'clients/index');
	}
}
