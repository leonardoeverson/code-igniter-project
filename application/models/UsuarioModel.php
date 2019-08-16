<?php


class UsuarioModel extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function loginUsuario(){

		$resultado = $this->db->get_where('usuarios',array('email'=>$this->input->post('email')))->result();

		if($this->verificaSenha($this->input->post('senha'), $resultado->senha)){
			return true;
		}else{
			return false;
		}
	}

	public function verificaSenha($senha, $senhaDB){
		return password_verify($senha, $senhaDB);
	}
}
