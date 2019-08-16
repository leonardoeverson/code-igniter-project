<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CadastroModel extends CI_Model {

	public function __construct(){
		$this->load->database();
		$this->load->library('encryption');
	}

	public function cadastroUsuario(){

	}
}
