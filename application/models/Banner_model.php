<?php
/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 */

class Banner_model extends MY_Model
{
	protected $table = 'banners';

	public $id = 0;
	public $title = '';
	public $image = '';
	public $link = '';
	public $created_at = '';
	public $updated_at = '';

	protected function setDataFromPost()
	{
		$this->title = $this->input->post('title');
		$this->image = $this->input->post('image');
		$this->link = $this->input->post('link');
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

	public function getImageUrl($baseUrl = true)
	{
		if (!$this->image) {
			return '';
		}
		return ($baseUrl) ? base_url(UPLOAD_PATH . $this->image) : UPLOAD_PATH . $this->image;
	}

	public function getImageWidth()
	{
		return 1600;
	}

	public function getImageHeight()
	{
		return 590;
	}
}
