<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * @property Post_model $post_model
 * @property Banner_model $banner_model
 * @property Contact_model $contact_model
 */
class Pages extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
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
        $data = $this->post_model->item($page, 'slug');
        if (empty($data)) {
            show_404();
        }

        if ($page === 'home') {
        	$data->posts = $this->post_model->items(['type' => 'post'], 4, 0, 'Post_model');
        	$data->banners = $this->banner_model->items([], NULL, NULL, 'Banner_model');
		}
		$data->services = $this->post_model->items(['type' => 'service'], NULL, NULL, 'Post_model');

		$this
			->setStaticFile('node_modules/slick-carousel/slick/slick.css')
			->setStaticFile('assets/css/style.css')
			->setStaticFile('node_modules/slick-carousel/slick/slick.min.js')
			->setStaticFile('assets/js/default.js');
		if (isset($data->scripts) && !empty($data->scripts)) {
			$this->setStaticFile('files/'.$page.'.js');
		}
		if (isset($data->styles) && !empty($data->styles)) {
			$this->setStaticFile('files/'.$page.'.css');
		}
        return $data;
    }
}
