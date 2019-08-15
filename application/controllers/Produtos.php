<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
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

		//Regras do Formulário
		$this->setFormRules();

		$data['marcas'] = $this->produtos_model->getMarcas();

		//Header
		$this->load->view('templates/header', $data);

		if ($this->form_validation->run() === FALSE){
			$this->load->view('produtos/cadastrar', $data);
		} else {
			if($this->produtos_model->cadastrarProduto()){
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

		$data['marcas'] = $this->produtos_model->getMarcas();

		//Header
		$this->load->view('templates/header', $data);

		if ($this->form_validation->run() === FALSE){
			//Carregar Dados do banco de dados
			$data['produto'] = $this->produtos_model->getProdutobyId($id);
			$this->load->view('produtos/alterar', $data);

		} else {

			if($this->produtos_model->alterarProduto()){
				$data['mensagem'] = 'Dados inseridos com sucesso';
				$this->load->view('templates/sucesso', $data);
			}else{
				$data['mensagem'] = 'O produto já existe no banco de dados';
				$this->load->view('templates/erro', $data);
			}

			$data['produto'] = $this->produtos_model->getProdutobyId($id);
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
		$this->form_validation->set_rules('sabor', 'O campo Sabor é obrigatório', 'required');
		$this->form_validation->set_rules('litragem', 'O campo Litragem é obrigatório', 'required');
		$this->form_validation->set_rules('valor', 'O campo Valor Unitário é obrigatório', 'required');
		$this->form_validation->set_rules('quantidade', 'O campo quantidade é obrigatório', 'required');
	}

	public function excluirProdutos(){

		$id = $this->input->post('produto');

		if($this->produtos_model->excluiProdutosDB($id)){
			$this->output->set_output(json_encode(array('mensagem', 'Produto(s) excluído(s) com sucesso.')));
		}else{
			$this->output->set_output(json_encode(array('mensagem', 'Houve um erro ao executar a ação.')));
		}

	}
}