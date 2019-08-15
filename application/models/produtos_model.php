<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produtos_model extends CI_Model{

	public function __construct(){
		$this->load->database();
	}

	public function getProdutos(){
		$query =  $this->db->get('produtos');

		return $query->result();
	}

	public function getProduto(){

		$tipo = $this->input->post('tipo') ;
		$marca = $this->input->post('marca');
		$sabor = $this->input->post('sabor');
		$litragem = $this->input->post('litragem');
		$query = $this->db->query("SELECT * from produtos where marca = '$marca' and tipo = '$tipo' and sabor = '$sabor' and litragem = '$litragem'");

		return $query->result();
	}

	public function getProdutobyId($id){

		$query = $this->db->query("SELECT * FROM produtos where id = $id");

		return $query->result();
	}

	public function alterarProduto($id){
		$query = $this->db->query("UPDATE produtos SET where id = $id");

		return $query->result();
	}

	public function excluiProduto($id){
		$query = $this->db->delete('produtos', array('id' => $id));

		return $query->result();
	}

	public function cadastrarProduto(){

		$this->load->helper('url');

		if(count($this->getProduto()) == 0){
			$data = array(
				'marca'=> $this->input->post('marca'),
				'tipo'=> $this->input->post('tipo'),
				'sabor'=>$this->input->post('sabor'),
				'litragem'=> $this->input->post('litragem'),
				'valor_unitario'=> floatval(str_replace(',','.', $this->input->post('valor'))),
				'quantidade'=> intval($this->input->post('quantidade'))
			);

			$this->db->insert('produtos', $data);

			return true;
		}else{
			return false;
		}

	}
}