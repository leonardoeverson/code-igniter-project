<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller{

	public function listarProdutos(){
		$data['title'] = 'Listagem de Produtos';

		$this->load->view('templates/header', $data);
		$this->load->view('produtos/listar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function cadastrarProdutos(){

		//tratamento de forms
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Título
		$data['title'] = 'Cadastro de Produtos';

		//Regras do Formulário
		$this->form_validation->set_rules('marca', 'Marca', 'required');
		$this->form_validation->set_rules('tipo', 'tipo', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('produtos/cadastrar');
			$this->load->view('templates/footer');

		}
		else
		{
			$this->produtos_model->cadastroProduto();
			$this->load->view('produtos/cadastrar/sucesso');
		}
	}

	public function alterarProdutos(){

	}
}
