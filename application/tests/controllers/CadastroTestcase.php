<?php


class CadastroTestcase extends TestCase{

	public function test_index(){
		$output = $this->request('GET', '/cadastro-usuario');
		$this->assertContains('<title>Cadastro de Usuários</title>', $output);
	}

	public function testCadastro(){

		//$this->request('GET', '/cadastro-usuario');

		$output = $this->request(
			'POST',
			'/cadastro/cadastrarUsuario',
			 ['email' => 'john@example.com', 'senha1'=>'12345678','senha2'=>'12345678']
		);

		$this->assertContains('Dados cadastrados com sucesso!', $output);
	}


}
