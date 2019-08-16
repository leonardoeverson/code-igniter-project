<?php


class UsuarioTestcase extends TestCase{

	public function test_tela_login_usuario(){

		$output = $this->request('GET', '/login');

		$this->assertContains(
			'Usuario/loginUsuario', $output
		);

	}

	public function test_login_usuario(){

		$output = $this->request(
			'POST',
			'/Usuario/loginUsuario',
			 ['email' => 'john@example.com', 'senha'=>'12345678']
		);

		$this->assertNull($output);
	}
}
