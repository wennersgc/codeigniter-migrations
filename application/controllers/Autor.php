<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autor extends CI_Controller {

	public function index()
	{
		$autor =  Autores::find(1);

		$data['autor'] = Autores::find($autor->id);
		$data['artigos'] = Autores::find(1)->artigos()->get();

		$this->load->view('view_teste', $data);

	}

}

/* End of file Controllername.php */
