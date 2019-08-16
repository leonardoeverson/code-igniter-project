<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadastro extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('CadastroModel');
		$this->load->helper('url_helper');
	}

	public function cadastrarUsuario(){

		$data['title'] = 'Cadastro de Usuários';

		$this->loadHeader($data);

		$this->formSetRules();

		if ($this->form_validation->run() === FALSE){
			$this->load->view('usuario/cadastro');
		} else {
			if($this->CadastroModel->cadastroUsuario()){
				$data['mensagem'] = 'Cadastro realizado com sucesso';
				$this->load->view('templates/sucesso', $data);
				$this->load->view('usuario/cadastro');
			}else{
				$data['mensagem'] = 'Erro ao realizar o cadastro';
				$this->load->view('templates/erro', $data);
				$this->load->view('usuario/cadastro');
			}
		}

		$this->load->view('templates/footer');
	}

	public function formSetRules(){
		//tratamento de forms
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Regras do Formulário
		$this->form_validation->set_rules('email', 'O campo E-mail é obrigatório', 'required');
		$this->form_validation->set_rules('senha1', 'O campo Senha é obrigatório', 'required');
		$this->form_validation->set_rules('senha2', 'O campo de confirmação da senha é obrigatório', 'required');
	}

	protected function loadHeader($data){
		$this->load->view('templates/header', $data);
	}

}
