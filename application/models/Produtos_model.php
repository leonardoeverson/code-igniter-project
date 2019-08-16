<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produtos_model extends CI_Model{

	public function __construct(){

		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');

	}

	public function getProdutos(){

		$query = $this->db->get_where('produtos',array('ativo'=> 1));
		return $query->result();

	}

	public function getProduto(){

		$tipo = $this->input->post('tipo');
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

	public function getProdutobyData($query){
		$result = $this->db->query($query);
		return $result;
	}

	public function alterarProduto(){

		$dados = 'SELECT * FROM produtos where id != ' . $this->input->post('id');
		$dados .= ' and marca = ' . $this->db->escape($this->input->post('marca'));
		$dados .= ' and tipo = ' . $this->db->escape($this->input->post('tipo'));
		$dados .= ' and sabor = ' . $this->db->escape($this->input->post('sabor'));
		$dados .= ' and litragem = ' . $this->db->escape($this->input->post('litragem'));

		if ($this->getProdutobyData($dados)->num_rows() == 0) {

			$this->db->set('marca', $this->input->post('marca'));
			$this->db->set('tipo', $this->input->post('tipo'));
			$this->db->set('sabor', $this->input->post('sabor'));
			$this->db->set('litragem', $this->input->post('litragem'));
			$this->db->set('valor_unitario', floatval(str_replace(',', '.', $this->input->post('valor'))));
			$this->db->set('quantidade', intval($this->input->post('quantidade')));

			$this->db->where('id', $this->input->post('id'));
			$this->db->update('produtos');

			return true;
		} else {
			return false;
		}
	}

	public function excluiProdutosDB($id){

		$pos = strpos($id, ',');
		if ($pos === false) {
			$result = $this->db->delete('produtos', array('id' => $id));

			if ($result == 1) {
				return true;
			} else {
				return false;
			}

		} else {

			$ids = explode(',', $id);

			for ($i = 0; $i < count($ids); $i++) {
				$this->db->delete('produtos', array('id' => $ids[$i]));
			}

			return true;
		}
	}

	public function cadastrarProduto(){

		if (count($this->getProduto()) == 0) {

			$data = array(
				'marca' => $this->input->post('marca'),
				'tipo' => $this->input->post('tipo'),
				'sabor' => $this->input->post('sabor'),
				'litragem' => $this->input->post('litragem'),
				'valor_unitario' => floatval(str_replace(',', '.', $this->input->post('valor'))),
				'quantidade' => intval($this->input->post('quantidade')),
				'id_usuario_cadastro' => $this->session->id_usuario,
				'ativo'=> 1,
				'hora_cadastro' =>'NOW()'
			);

			$this->db->insert('produtos', $data);

			return true;
		} else {
			return false;
		}

	}

	public function getMarcas(){
		$query = $this->db->get('marcas');

		return $query->result();
	}
}
