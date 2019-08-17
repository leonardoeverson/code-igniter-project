<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $erros = validation_errors(); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#"></a>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="/">Início<span class="sr-only">(current)</span></a>
			</li>
		</ul>
	</div>
</nav>
<div class="container" style="margin-top: 10px">
	<?php echo form_open('cadastro/cadastrarUsuario'); ?>
	<h4><?php echo $title; ?></h4>
	<hr>

	<?php
	if ($erros != null) {
		?>
		<div class="form-group row">
			<div class="alert alert-danger" role="alert" style="width: 100%">
				<?php echo $erros; ?>
			</div>
		</div>
		<?php
	}
	?>
	<div class="form-group row">
		<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="email" name="email" placeholder="Insira um e-mail válido"
				   required>
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
			<input type="password" class="form-control" id="senha2" name="senha2" placeholder="Confirme a senha"
				   required>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Confirmar cadastro</button>
	</form>
</div>
