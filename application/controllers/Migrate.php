<?php
/**
 * Migrate
 *
 * @copyright Copyright © 2019 GG2 Solucoes. All rights reserved.
 * @author    gihovani@gmail.com
 * @property CI_Input $input
 * @property CI_Output $output
 */

class Migrate extends CI_Controller
{
    /**
     * @var CI_Migration
     */
    public $migration;
	private function show($text)
	{
		$this->output
			->set_output($text)
			->_display();
		exit();
	}
    public function index()
    {
    	$message = 'Não foi possivel fazer a migração.';
    	if (!is_cli()) {
			show_error($message);
		}
        $this->load->library('migration');
        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        }

		$latestMigrate = $this->migration->latest();
        if (!$latestMigrate) {
			show_error($message);
		}
		return $this->show('Migração feita com sucesso: ' . $latestMigrate);
    }
}
