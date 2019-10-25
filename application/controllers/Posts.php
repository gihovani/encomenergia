<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Page_model $page_model
 */
class Posts extends MY_Controller
{
    public function __construct()
    {
        parent::__construct(true);
        $this->load->model('page_model');
    }

    public function index($offset = 0)
    {
        $filter = [];
        $count = $this->page_model->count($filter);
        $offset = intval($offset);
        if ($offset < 0) {
            $offset = 0;
        }
        $data = [
            'items' => $this->page_model->items($filter, ITEMS_PER_PAGE, $offset, 'Page_model'),
            'count' => $count,
            'pagination' => $this->pagination->initialize([
                'base_url' => site_url('posts/index'),
                'total_rows' => $count
            ])
        ];
        $this->html('admin/post/index', $data);
    }

    public function create()
    {
        if ($this->form_validation->run()) {
            $this->page_model->insert();
            return $this->redirect('Post Criado Com Sucesso!', 'posts/index');
        }

        $data = [
            'errors' => $this->form_validation->error_array()
        ];
        return $this->html('admin/post/create', $data);
    }

    public function update($id = 0)
    {
        $item = $this->page_model->item($id, 'id', 'Page_model');
        if (!$item) {
            return $this->redirect('Post Não Encontrado!', 'posts/index');
        }
        if ($this->form_validation->run()) {
            $this->page_model->update($id);
            return $this->redirect('Post Atualizado Com Sucesso!', 'posts/index');
        }

        $data = [
            'errors' => $this->form_validation->error_array(),
            'item' => $item
        ];
        return $this->html('admin/post/update', $data);
    }

    public function delete($id = 0)
    {
        $item = $this->page_model->item($id, 'id', 'Page_model');
        if (!$item) {
            return $this->redirect('Post Não Encontrado!', 'banners/index');
        }

        $id = $this->page_model->delete($id);
        $this->redirect(($id ? 'Post Removido Com Sucesso!' : 'Post Não Pode Ser Removido!'), 'posts/index');
    }
}
