<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ProdutosModel');
		$this->load->helper('url_helper');

		//if(!isset($this->session->logged)){
		//	redirect('/login');
		//}
	}

	public function listarProdutos(){

		//Título da página
		$data['title'] = 'Listagem de Produtos';

		//Captura de produtos cadastrados
		$data['produtos'] = $this->ProdutosModel->getProdutos();

		//Templates
		$this->loadHeader($data);

		$this->load->view('produtos/listar', $data);
		$this->load->view('templates/footer', $data);
	}

	public function cadastrarProdutos(){

		$data['title'] = 'Cadastro de Produtos';

		$this->setFormRules();

		$data['marcas'] = $this->ProdutosModel->getMarcas();

		$this->loadHeader($data);

		if ($this->form_validation->run() === FALSE){
			$this->load->view('produtos/cadastrar', $data);
		} else {
			if($this->ProdutosModel->cadastrarProduto()){
				$data['mensagem'] = 'Dados inseridos com sucesso';
				$this->load->view('templates/sucesso', $data);
				$this->load->view('produtos/cadastrar');
			}else{
				$data['mensagem'] = 'O produto já existe no banco de dados';
				$this->load->view('templates/erro', $data);
				$this->load->view('produtos/cadastrar');
			}
		}

		$this->load->view('templates/footer', $data);
	}

	public function alterarProdutos($id){

		$data['title'] = 'Alteração de dados';

		//Regras do Formulário
		$this->setFormRules();

		$data['marcas'] = $this->ProdutosModel->getMarcas();

		//Header
		$this->loadHeader($data);

		if ($this->form_validation->run() === FALSE){
			//Carregar Dados do banco de dados
			$data['produto'] = $this->ProdutosModel->getProdutobyId($id);
			$this->load->view('produtos/alterar', $data);

		} else {

			if($this->ProdutosModel->alterarProduto()){
				$data['mensagem'] = 'Dados atualizados com sucesso !';
				$this->load->view('templates/sucesso', $data);
			}else{
				$data['mensagem'] = 'O produto já existe no banco de dados';
				$this->load->view('templates/erro', $data);
			}

			$data['produto'] = $this->ProdutosModel->getProdutobyId($id);
			$this->load->view('produtos/alterar',$data);
		}

		//Footer
		$this->load->view('templates/footer', $data);
	}

	protected function setFormRules(){

		//tratamento de forms
		$this->load->helper('form');
		$this->load->library('form_validation');

		//Regras do Formulário
		$this->form_validation->set_rules('marca', 'O campo Marca é obrigatório', 'required');
		$this->form_validation->set_rules('tipo', 'O campo Tipo é obrigatório', 'required');
		//$this->form_validation->set_rules('sabor', 'O campo Sabor é obrigatório', 'required');
		$this->form_validation->set_rules('litragem', 'O campo Litragem é obrigatório', 'required');
		$this->form_validation->set_rules('valor', 'O campo Valor Unitário é obrigatório', 'required');
		$this->form_validation->set_rules('quantidade', 'O campo quantidade é obrigatório', 'required');
	}

	protected function loadHeader($data){
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
	}

	public function excluirProdutos(){

		$id = $this->input->post('produto');

		if($this->ProdutosModel->excluiProdutosDB($id)){
			$this->output->set_output(json_encode(array('mensagem'=>'Produto(s) excluído(s) com sucesso.')));
		}else{
			$this->output->set_output(json_encode(array('mensagem'=>'Houve um erro ao executar a ação.')));
		}

	}
}
