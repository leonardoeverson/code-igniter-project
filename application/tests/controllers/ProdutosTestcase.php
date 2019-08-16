<?php


class ProdutosTestcase extends TestCase{

	public function test_index(){
		$output = $this->request('GET', '/');
		$this->assertContains('Listagem de Produtos', $output);
	}

	public function testCadastroProduto(){
		$output = $this->request(
			'POST',
			'/produtos/cadastrarProdutos',
			['marca' => 'Coca-cola', 'sabor'=>'','litragem'=>'250 mL','tipo'=>'Garrafa','valor'=>'1,50','quantidade'=>'10']
		);

		$this->assertContains('Dados inseridos com sucesso', $output);
	}

	public function testGetProduto(){

	}

	public function testAlteraProduto(){

		$output = $this->request(
			'POST',
			'/produtos/alterarProdutos/33',
			['id'=>'33','marca' => 'Coca-cola', 'sabor'=>'','litragem'=>'600 mL','tipo'=>'Garrafa','valor'=>'1,50','quantidade'=>'10']
		);

		$this->assertContains('Dados atualizados com sucesso !', $output);

	}

	public function testexcluirProduto(){

		$output = $this->request(
			'POST',
			'/excluir-produto/33',
			['produto'=>'29']
		);

		$this->assertContains('{"mensagem":"Produto(s) exclu\u00eddo(s) com sucesso."}', $output);

	}
}
