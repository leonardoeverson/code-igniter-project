<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller{

	public function __construct(){
		parent::__construct();

		$this->load->library('session');
		$this->load->model('UsuarioModel');
		$this->load->helper('url_helper');
	}

	public function loginUsuario(){

		$data['title'] = 'Página de Login';

		$this->formSetRules();

		$this->load->view('templates/header', $data);

		if ($this->form_validation->run() === FALSE){
			$this->load->view('login');
		} else {

			if($this->UsuarioModel->loginUsuario()){
					redirect('/');
			}else{
				$data['mensagem'] = 'Senha e/ou email incorretos';
				$this->load->view('login', $data);
			}
		}

		$this->load->view('templates/footer');
	}

	public function formSetRules(){
		//tratamento de forms
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_message('required', 'O campo %s é obrigatório');

		//Regras do Formulário
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('senha', 'Senha', 'required');

	}

	protected function loadHeader($data){
		$this->load->view('templates/header', $data);
	}

	public function logoutUsuario(){
		$this->session->sess_destroy();
		redirect('/login');
	}
}
