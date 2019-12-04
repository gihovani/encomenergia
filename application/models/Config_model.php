<?php
/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 * @property CI_Email $ci_email
 */

class Config_model extends MY_Model
{
	protected $table = 'configs';

	public $id = 0;
	public $email = '';
	public $phone = '';
	public $facebook = '';
	public $instagram = '';
	public $youtube = '';
	public $whatsapp = '';
	public $googlemap = '';
	public $created_at = '';
	public $updated_at = '';

	protected function setDataFromPost()
	{
		$this->email = $this->input->post('email');
		$this->phone = $this->input->post('phone');
		$this->facebook = $this->input->post('facebook');
		$this->instagram = $this->input->post('instagram');
		$this->youtube = $this->input->post('youtube');
		$this->whatsapp = $this->input->post('whatsapp');
		$this->googlemap = $this->input->post('googlemap');
	}
}
