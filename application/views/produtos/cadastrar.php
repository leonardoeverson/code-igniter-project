<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<div class="container" style="margin-top: 30px">
	<?php $erros = validation_errors(); ?>

	<?php echo form_open('produtos/cadastrarProdutos'); ?>
	<hr/>
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
	<div class="form-group">
		<label for="marca">Marca</label>
		<?php

			$options = array();

			foreach ($marcas as $marca) {
				$options[$marca->nome] = $marca->nome;
			}

			echo form_dropdown('marca', $options, '', 'class="form-control" id="marca" required');
		?>
	</div>
	<div class="form-group">
		<label for="tipo">Tipo</label>
		<?php

		$options = array(
			'Pet' => 'Pet',
			'Garrafa' => 'Garrafa',
			'Lata' => 'Lata'
		);

		echo form_dropdown('tipo', $options, '', 'class="form-control" id="tipo" required');
		?>
	</div>
	<div class="form-group">
		<label for="sabor">Sabor</label>
		<input type="text" class="form-control" id="sabor" name="sabor" placeholder="Sabor" required>
	</div>
	<div class="form-group">
		<label for="litragem">Litragem</label>
		<?php

		$options = array(
			'250 mL' => '250 mL',
			'600 mL' => '600 mL',
			'1L' => '1L'
		);

		echo form_dropdown('litragem', $options, '', 'class="form-control" id="litragem" required');

		?>
	</div>
	<div class="form-group">
		<label for="valor">Valor Unitário</label>
		<input type="text" class="form-control" id="valor" name="valor" placeholder="Valor Unitário" required>
	</div>
	<div class="form-group">
		<label for="quantidade">Quantidade</label>
		<input type="text" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade" required>
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
	</form>

	<script>
        $('#valor').mask('#.##0,00', {reverse: true});
        $('#quantidade').mask("#")
	</script>
</div>
