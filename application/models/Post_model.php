<?php
/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 */

class Post_model extends MY_Model
{
	protected $table = 'posts';
	protected $types = ['service' => 'Serviços', 'post' => 'Notícia', 'page' => 'Página'];

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
	public $active = 0;
	public $created_at = '';
	public $updated_at = '';

	protected function setDataFromPost()
	{
		$title = $this->input->post('title');
		$slug = $this->input->post('slug');
		if (empty($slug)) {
			$slug = $title;
		}

		$this->slug = url_title(convert_accented_characters($slug), 'dash', true);
		$this->title = $title;
		$this->type = $this->input->post('type');
		$this->image = $this->input->post('image');
		$this->description = $this->input->post('description');
		$this->keywords = $this->input->post('keywords');
		$this->author = $this->input->post('author');
		$this->content = $this->input->post('content');
		$this->styles = $this->input->post('styles');
		$this->scripts = $this->input->post('scripts');
		$this->active = ($this->input->post('active') ? 1 : 0);
	}

	public function update($id)
	{
		$this->setDataFromPost();
		$removeImage = $this->input->post('image_remove');
		if (empty($this->image) && !$removeImage) {
			$oldValues = $this->item($id);
			$this->image = $oldValues->image;
		}
		if ($this->timestamps) {
			$this->updated_at = CURRENT_DATETIME;
		}

		unset($this->id, $this->created_at);
		if (!isset($_POST['styles'])) {
			unset($this->styles);
		}
		if (!isset($_POST['scripts'])) {
			unset($this->scripts);
		}
		return $this->db->update($this->table, $this, [$this->primaryKey => $id]);
	}

	public function getType()
	{
		if (!$this->type || !isset($this->types[$this->type])) {
			return '';
		}

		return $this->types[$this->type];
	}

	public function getImageUrl($baseUrl = true)
	{
		if (!$this->image) {
			return '';
		}
		return ($baseUrl) ? base_url(UPLOAD_PATH . $this->image) : UPLOAD_PATH . $this->image;
	}

	public function getImageWidth()
	{
		return 400;
	}

	public function getImageHeight()
	{
		return 245;
	}
}
