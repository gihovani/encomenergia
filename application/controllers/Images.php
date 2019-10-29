<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Images extends MY_Controller
{
	public function cut()
	{
		$fileName = $this->input->get('fileName');
		$height = intval($this->input->get('height'));
		$width = intval($this->input->get('width'));
		$returnTo = urldecode($this->input->get('returnTo'));
		$filePath = realpath(APPPATH . '../' . $fileName);

		if (!list($currentWidth, $currentHeight) = getimagesize($filePath)) {
			return $this->redirect('Imagem não encontrada', $returnTo);
		}

		if ($this->form_validation->run()) {
			$ret = $this->_imagem_crop();
			if (isset($ret['success'])) {
				$this->redirect($ret['success'], $returnTo);
			} elseif (isset($ret['danger'])) {
				$this->session->set_flashdata('message', $ret['danger']);
			}
		}
		$data = [
			'errors' => $this->form_validation->error_array()
		];
		$action = sprintf('images/cut/?fileName=%s&height=%s&width=%s&returnTo=%s', $fileName, $height, $width, $returnTo);
		$data['width'] = $width;
		$data['height'] = $height;
		$data['currentWidth'] = $currentWidth;
		$data['currentHeight'] = $currentHeight;
		$data['ratio'] = ceil((($currentWidth * 100) / 600) / 100);
		$data['action'] = $action;
		$data['image'] = $filePath;
		$data['imageUrl'] = base_url($fileName) . '?' . time();
		$this
			->setStaticFile('assets/imgareaselect-0.9.10/css/imgareaselect-animated.css')
			->setStaticFile('assets/imgareaselect-0.9.10/scripts/jquery.imgareaselect.min.js')
			->html('admin/image/cut', $data);
	}

	private function _imagem_crop()
	{
		// Imagem original
		$image = $this->input->post('image');
		$fileInfo = pathinfo($image);
		$extension = $fileInfo['extension'];

		// As coordenadas X e Y dentro da imagem original
		// recebidas pelo formulário
		$left = $this->input->post('x1');
		$top = $this->input->post('y1');
		$width = $this->input->post('x2') - $left;
		$height = $this->input->post('y2') - $top;

		// Este será o tamanho final da imagem
		$cropWidth = $this->input->post('width');
		$cropHeight = $this->input->post('height');

		if (!getimagesize($image)) {
			return ['danger' => "tipo de imagem invalido"];
		}

		if ($extension === 'jpeg') {
			$extension = 'jpg';
		}
		switch ($extension) {
			case 'bmp' :
				$currentImage = imagecreatefromwbmp($image);
				break;
			case 'gif' :
				$currentImage = imagecreatefromgif($image);
				break;
			case 'jpg' :
				$currentImage = imagecreatefromjpeg($image);
				break;
			case 'png' :
				$currentImage = imagecreatefrompng($image);
				break;
			default :
				return ['danger' => 'tipo de imagem invalido'];
		}

		$new = imagecreatetruecolor($cropWidth, $cropHeight);

		// preserve transparency
		if ($extension === "gif" || $extension === "png") {
			imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
			imagealphablending($new, false);
			imagesavealpha($new, true);
		}

		imagecopyresampled($new, $currentImage, 0, 0, $left, $top, $cropWidth, $cropHeight, $width, $height);

		switch ($extension) {
			case 'bmp' :
				imagewbmp($new, $image);
				break;
			case 'gif' :
				imagegif($new, $image);
				break;
			case 'jpg' :
				imagejpeg($new, $image, 100);
				break;
			case 'png' :
				imagepng($new, $image);
				break;
			default;
		}
		imagedestroy($currentImage);
		imagedestroy($new);

		return ['success' => "A imagem foi recortada corretamente"];
	}
}
