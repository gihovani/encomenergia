<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property User_model $user_model
 */
class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct(true);
        $this->load->model('user_model');
    }

    public function index($offset = 0)
    {
        $filter = [];
        $count = $this->user_model->count($filter);
        $offset = intval($offset);
        if ($offset < 0) {
            $offset = 0;
        }
        $data = [
            'items' => $this->user_model->items($filter, ITEMS_PER_PAGE, $offset),
            'count' => $count,
            'pagination' => $this->pagination->initialize([
                'base_url' => site_url('posts/index'),
                'total_rows' => $count
            ])
        ];
        $this->html('admin/user/index', $data);
    }

    public function create()
    {
        if ($this->form_validation->run()) {
            $this->user_model->insert();
            return $this->redirect('Usuário Criado Com Sucesso!', 'users/index');
        }

        $data = [
            'errors' => $this->form_validation->error_array()
        ];
        return $this->html('admin/user/create', $data);
    }

    public function update($id = 0)
    {
        $item = $this->user_model->item($id);
        if (!$item) {
            return $this->redirect('Usuário Não Encontrado!', 'users/index');
        }
        if ($this->form_validation->run()) {
            $this->user_model->update($id);
            return $this->redirect('Usuário Atualizado Com Sucesso!', 'users/index');
        }

        $data = [
            'errors' => $this->form_validation->error_array(),
            'item' => $item
        ];
        return $this->html('admin/user/update', $data);
    }

    public function delete($id = 0)
    {
        $item = $this->user_model->item($id);
        if (!$item) {
            return $this->redirect('Usuário Não Encontrado!', 'users/index');
        }

        $id = $this->user_model->delete($id);
        $this->redirect(($id ? 'Usuário Removido Com Sucesso!' : 'Usuário Não Pode Ser Removido!'), 'users/index');
    }
}
