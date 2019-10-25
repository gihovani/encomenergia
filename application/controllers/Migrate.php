<?php
/**
 * Migrate
 *
 * @copyright Copyright © 2019 GG2 Solucoes. All rights reserved.
 * @author    gihovani@gmail.com
 */

class Migrate extends CI_Controller
{
    /**
     * @var CI_Migration
     */
    public $migration;
    public function index()
    {
        $this->load->library('migration');
        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
        print $this->migration->latest();
        exit;
    }
}
