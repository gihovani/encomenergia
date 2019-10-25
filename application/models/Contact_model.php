<?php
/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder $db
 * @property CI_Input $input
 * @property CI_Email $ci_email
 */

class Contact_model extends MY_Model {
    protected $table = 'contacts';

    public $id = 0;
    public $name = '';
    public $email = '';
    public $phone = '';
    public $message = '';
    public $created_at = '';
    public $updated_at = '';

    protected function setDataFromPost()
    {
        $this->name = $this->input->post('name');
        $this->email = $this->input->post('email');
        $this->phone = $this->input->post('phone');
        $this->message = $this->input->post('message');
    }

    public function insert()
    {
        $insert = parent::insert();
        $this->sendEmail();
        return $insert;
    }

    protected function sendEmail($subject = 'E-mail do Site')
    {
        $msg = sprintf(
            'Nome: %s<br />E-mail: %s<br />Telefone: %s<br />Mensagem: %s',
            $this->name, $this->email, $this->phone, $this->message
        );
        $this->load->library('email', null, 'ci_email');
        $this->ci_email->from(EMAIL_FROM);
        $this->ci_email->to(EMAIL_TO);
        $this->ci_email->subject($subject);
        $this->ci_email->message($msg);
        return $this->ci_email->send();
    }
}
