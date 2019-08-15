<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('produtos_model');
		$this->load->helper('url_helper');
	}

	public function listarProdutos(){

		//Título da página
		$data['title'] = 'Listagem de Produtos';

		//Captura de produtos cadastrados
		$data['produtos'] = $this->produtos_model->getProdutos();

		//Templates
		$this->load->view('templates/header', $data);
		$this->load->view('produtos/listar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function cadastrarProdutos(){

		//Título
		$data['title'] = 'Cadastro de Produtos';

		//tratamento de forms
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Regras do Formulário
		$this->form_validation->set_rules('marca', 'Marca', 'required');
		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
		$this->form_validation->set_rules('sabor', 'Sabor', 'required');
		$this->form_validation->set_rules('litragem', 'Litragem', 'required');
		$this->form_validation->set_rules('valor', 'Valor Unitário', 'required');
		$this->form_validation->set_rules('quantidade', 'quantidade', 'required');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('templates/header', $data);
			$this->load->view('produtos/cadastrar', $data);
			$this->load->view('templates/footer', $data);
		} else {
			if($this->produtos_model->cadastrarProduto()){

				$data['mensagem'] = 'Dados inseridos com sucesso';

				$this->load->view('templates/header', $data);
				$this->load->view('templates/sucesso', $data);
				$this->load->view('produtos/cadastrar');
				$this->load->view('templates/footer', $data);
			}else{

				$data['mensagem'] = 'O produto já existe no banco de dados';

				$this->load->view('templates/header', $data);
				$this->load->view('templates/erro', $data);
				$this->load->view('produtos/cadastrar');
				$this->load->view('templates/footer', $data);
			}
		}
	}

	public function alterarProdutos($id){

		$data['title'] = 'Alteração de dados';

		//tratamento de forms
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Regras do Formulário
		$this->form_validation->set_rules('marca', 'Marca', 'required');
		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
		$this->form_validation->set_rules('sabor', 'Sabor', 'required');
		$this->form_validation->set_rules('litragem', 'Litragem', 'required');
		$this->form_validation->set_rules('valor', 'Valor Unitário', 'required');
		$this->form_validation->set_rules('quantidade', 'quantidade', 'required');

		if ($this->form_validation->run() === FALSE){

			//Carregar Dados do banco de dados
			$data['produto'] = $this->produtos_model->getProdutobyId($id);

			$this->load->view('templates/header', $data);
			$this->load->view('produtos/alterar', $data);
			$this->load->view('templates/footer', $data);
		} else {
			if($this->produtos_model->alterarProduto()){

				$data['mensagem'] = 'Dados inseridos com sucesso';

				//Carregar Dados do banco de dados
				$data['produto'] = $this->produtos_model->getProdutobyId($id);

				$this->load->view('templates/header', $data);
				$this->load->view('templates/sucesso', $data);
				$this->load->view('produtos/alterar');
				$this->load->view('templates/footer', $data);
			}else{

				$data['mensagem'] = 'O produto já existe no banco de dados';

				$this->load->view('templates/header', $data);
				$this->load->view('templates/erro', $data);
				$this->load->view('produtos/alterar');
				$this->load->view('templates/footer', $data);
			}
		}
	}

	public function excluirProduto($id){
		$this->produtos_model->excluirProduto($id);
	}


	public function sucessoMensagem(){
		//Título
		$data['title'] = 'Cadastro de Produtos';

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sucesso');
		$this->load->view('produtos/cadastrar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function erroMensagem(){

	}
}
