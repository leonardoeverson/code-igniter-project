<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produtos_model extends CI_Model{

	public function __construct(){

		$this->load->database();
	}

	public function getProdutos(){

	}

	public function getProduto($id){

	}

	public function alterarProduto(){

	}

	public function cadastrarProdutoDB(){

		$this->load->helper('url');

		//to-do
		/*
		 *  1 - checar se já existe produto no banco de dados
		 *
		 */
		$data = array(
			'marca'=> $this->input->post('marca'),
			'tipo'=> $this->input->post('tipo'),
			'sabor'=>$this->input->post('sabor'),
			'litragem'=> $this->input->post('litragem'),
			'valor_unitario'=> doubleval($this->input->post('valor')),
			'quantidade'=> intval($this->input->post('quantidade'))
		);

		return $this->db->insert('produtos', $data);
	}
}
