<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php echo validation_errors(); ?>

<hr>
<div class="container">
	<?php echo form_open('cadastro/cadastrarUsuario'); ?>
	<h4><?php echo $title; ?></h4>
	<hr>
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="email" name="email" placeholder="Insira um e-mail válido" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
		<div class="col-sm-5">
			<input type="password" class="form-control" id="senha1" name="senha1" placeholder="Insira a senha" required>
		</div>
	</div>
	<div class="form-group row">
		<label for="inputPassword" class="col-sm-2 col-form-label">Confirme a senha</label>
		<div class="col-sm-5">
			<input type="password" class="form-control" id="senha2" name="senha2" placeholder="Confirme a senha" required>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Confirmar cadastro</button>
	</form>
</div>
