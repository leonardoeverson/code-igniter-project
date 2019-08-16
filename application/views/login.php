<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php echo $erros = validation_errors(); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<div class="card" style="margin-top:70px">
				<article class="card-body">
					<h4 class="card-title text-center mb-4 mt-1">Login</h4>
					<hr>
					<p class="text-success text-center"></p>
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


					if (isset($mensagem)) {
						?>
						<div class="form-group row">
							<div class="alert alert-danger" role="alert" style="width: 100%">
								<?php echo $erros; ?>
							</div>
						</div>
						<?php
					}
					?>

					<?php echo form_open('Usuario/loginUsuario') ?>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-user"></i> </span>
							</div>
							<input name="email" class="form-control" placeholder="Insira um email válido"
								   type="email">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
							</div>
							<input class="form-control" placeholder="******" type="password" name="senha">
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Entrar</button>
						<button type="button" id="btn" class="btn btn-success btn-block">Cadastre-se</button>
					</div>
					<p class="text-center"><a href="#" class="btn"></a></p>
					</form>
				</article>
			</div>
		</div>
	</div>
</div>
<script>
	$('#btn').on('click',()=>{
        location.href = '/index.php/cadastro-usuario'
	})
</script>
