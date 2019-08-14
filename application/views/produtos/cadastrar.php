<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<div class="container" style="margin-top: 30px">
	<?php echo validation_errors(); ?>

	<?php echo form_open('produtos/cadastrarProdutos', 'meth', '', ); ?>
    <hr />
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" aria-describedby="Marca" placeholder="Marca do produto" maxlength="30" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select id="tipo" name="tipo" class="form-control" required>
                <option value="Pet">Pet</option>
                <option value="Garrafa">Garrafa</option>
                <option value="Lata">Lata</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sabor">Sabor</label>
            <input type="text" class="form-control" id="sabor" name="sabor" placeholder="Sabor" required>
        </div>
        <div class="form-group">
            <label for="litragem">Litragem</label>
            <select id="litragem" name="litragem" class="form-control" required>
                <option value="250 mL">250 mL</option>
                <option value="600 mL">600 mL</option>
                <option value="1L">1L</option>
            </select>
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
