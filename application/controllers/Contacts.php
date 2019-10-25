<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Contact_model $contact_model
 */
class Contacts extends MY_Controller
{
    public function __construct()
    {
        parent::__construct(true);
        $this->load->model('contact_model');
    }

    public function index($offset = 0)
    {
        $filter = [];
        $count = $this->contact_model->count($filter);
        $offset = intval($offset);
        if ($offset < 0) {
            $offset = 0;
        }
        $data = [
            'items' => $this->contact_model->items($filter, ITEMS_PER_PAGE, $offset, 'Contact_model'),
            'count' => $count,
            'pagination' => $this->pagination->initialize([
                'base_url' => site_url('contacts/index'),
                'total_rows' => $count
            ])
        ];
        $this->html('admin/contact/index', $data);
    }

    public function create()
    {
        if ($this->form_validation->run()) {
            $this->contact_model->insert();
            return $this->redirect('Contato Criado Com Sucesso!', 'contacts/index');
        }

        $data = [
            'errors' => $this->form_validation->error_array()
        ];
        return $this->html('admin/contact/create', $data);
    }

    public function update($id = 0)
    {
        $item = $this->contact_model->item($id, 'id', 'Contact_model');
        if (!$item) {
            return $this->redirect('Contato Não Encontrado!', 'contacts/index');
        }
        if ($this->form_validation->run()) {
            $this->contact_model->update($id);
            return $this->redirect('Contato Atualizado Com Sucesso!', 'contacts/index');
        }

        $data = [
            'errors' => $this->form_validation->error_array(),
            'item' => $item
        ];
        return $this->html('admin/contact/update', $data);
    }

    public function delete($id = 0)
    {
        $item = $this->contact_model->item($id, 'id', 'Contact_model');
        if (!$item) {
            return $this->redirect('Contato Não Encontrado!', 'contacts/index');
        }

        $id = $this->contact_model->delete($id);
        $this->redirect(($id ? 'Contato Removido Com Sucesso!' : 'Contato Não Pode Ser Removido!'), 'contacts/index');
    }
}
