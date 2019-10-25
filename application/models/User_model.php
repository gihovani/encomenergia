<?php
/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 */

class User_model extends MY_Model {
    protected $table = 'users';

    public $id = 0;
    public $name = '';
    public $login = '';
    public $password = '';
    public $created_at = '';
    public $updated_at = '';

    protected function setDataFromPost()
    {
        $this->name = $this->input->post('name');
        $this->login = $this->input->post('login');
        $this->password = $this->input->post('password');
    }
    public function login()
    {
        $this->setDataFromPost();
        $items = $this->items(['login' => $this->login, 'password' => $this->password]);
        return count($items) ? $items[0] : null;
    }
}
