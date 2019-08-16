<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CadastroModel extends CI_Model {

	public function __construct(){
		$this->load->database();
		$this->load->library('encryption');
	}

	public function cadastroUsuario(){

		$data = array(
			'email' => $this->input->post('email'),
			'senha' => $this->hashSenha($this->input->post('senha1'))
		);

		$retorno  = $this->db->insert('usuarios', $data);

		var_dump($retorno);

		exit();
		//return true;
	}

	protected function hashSenha($senha){
		return password_hash($senha, PASSWORD_DEFAULT);
	}

	public function verifyEmail($email){
		$this->db->where('email', $email);
	}

}
