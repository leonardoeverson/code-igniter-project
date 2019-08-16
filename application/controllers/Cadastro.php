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

			if($this->CadastroModel->verifyEmail($this->input->post('email'))){
				if($this->CadastroModel->cadastroUsuario()){
					$data['mensagem'] = 'Cadastro realizado com sucesso';
					$this->load->view('templates/sucesso', $data);
					$this->load->view('usuario/cadastro');
				}else{
					$data['mensagem'] = 'Erro ao realizar o cadastro';
					$this->load->view('templates/erro', $data);
					$this->load->view('usuario/cadastro');
				}
			}else{
				$data['mensagem'] = 'Já existe um cadastro para este E-mail';
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
		$this->form_validation->set_message('required', 'O campo %s é obrigatório');

		//Regras do Formulário
		$this->form_validation->set_rules('email', 'E-mail', 'required');
		$this->form_validation->set_rules('senha1', 'Senha', 'required');
		$this->form_validation->set_rules('senha2', 'Confirmação da senha', 'required|matches[senha1]');
	}

	protected function loadHeader($data){
		$this->load->view('templates/header', $data);
	}

}
