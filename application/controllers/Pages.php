<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Page_model $page_model
 * @property Banner_model $banner_model
 * @property Contact_model $contact_model
 */
class Pages extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
		$this->load->model('banner_model');
		$this->load->model('contact_model');
    }

	public function view($page = 'home')
	{
        $data = $this->getData($page);
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            $page = $data->type;
        }

        $this->html('pages/'.$page, $data);
	}

	public function files($file)
    {
        $content = '';
        $fileInfo = pathinfo($file);
        $data = $this->getData($fileInfo['filename']);
        $extension = $fileInfo['extension'];
        if ($extension === 'js') {
            $content = $data->scripts;
        } elseif($extension === 'css') {
            $content = $data->styles;
        }
        $this->show($content, $extension);
    }

	public function contact_submit()
    {
        if ($this->form_validation->run()) {
            $post = $this->input->post();
            $response = [
                'success'=> true,
                'post' => $post,
                'email_sended' => $this->contact_model->insert()
            ];
        } else {
            $response = [
                'errors' => $this->form_validation->error_array()
            ];
        }

        $this->show(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

    protected function getData($page)
    {
        $data = $this->page_model->item($page, 'slug');
        if (empty($data)) {
            show_404();
        }

        if ($page === 'home') {
        	$data->posts = $this->page_model->items(['type' => 'post'], 4, 0, 'Page_model');
        	$data->banners = $this->banner_model->items([], NULL, NULL, 'Banner_model');
		}
		$data->services = $this->page_model->items(['type' => 'service'], NULL, NULL, 'Page_model');
        return $data;
    }
}
