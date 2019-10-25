<?php
/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 */

class Page_model extends MY_Model {
    protected $table = 'pages';

    public $id = 0;
    public $type = '';
    public $slug = '';
    public $title = '';
    public $image = '';
    public $description = '';
    public $keywords = '';
    public $author = '';
    public $content = '';
    public $styles = '';
    public $scripts = '';
    public $created_at = '';
    public $updated_at = '';

    protected function setDataFromPost()
    {
        $title = $this->input->post('title');
        $slug = $this->input->post('slug');
        if (empty($slug)) {
            $slug = $title;
        }
        $author = $this->input->post('author');

        $this->slug = url_title(convert_accented_characters($slug), 'dash', true);
        $this->title = $title;
        $this->type = $this->input->post('type');
        $this->image = $this->input->post('image');
        $this->description = $this->input->post('description');
        $this->keywords = $this->input->post('keywords');
        $this->author = ($author) ? $author : 'Encom Energia';
        $this->content = $this->input->post('content');
        $this->styles = $this->input->post('styles');
        $this->scripts = $this->input->post('scripts');
    }

    public function update($id)
    {
        $this->setDataFromPost();
        $removeImage = $this->input->post('image_remove');
        if (empty($this->image) && !$removeImage) {
            $oldValues = $this->item($id);
            $_POST['image'] = $oldValues->image;
        }
        return parent::update($id);
    }

    public function getImageUrl() {
        return ($this->image) ? base_url('uploads/'.$this->image) : '';
    }
}
