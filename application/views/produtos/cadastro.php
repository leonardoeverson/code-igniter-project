<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container" style="margin-top: 30px">
	<?php echo validation_errors(); ?>

	<?php echo form_open('cadastro/index'); ?>
    <hr />
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" aria-describedby="Marca" placeholder="Marca do produto">
        </div>
        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select id="tipo" class="form-control" id="exampleFormControlSelect1">
                <option>Pet</option>
                <option>Garrafa</option>
                <option>Lata</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo">Sabor</label>
            <input type="text" class="form-control" id="tipo" placeholder="Sabor">
        </div>
        <div class="form-group">
            <label for="tipo">Litragem</label>
            <select id="tipo" class="form-control" id="exampleFormControlSelect1">
                <option>250 mL</option>
                <option>600 mL</option>
                <option>1L</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tipo">Valor Unitário</label>
            <input type="text" class="form-control" id="valor" placeholder="Valor Unitário">
        </div>
        <div class="form-group">
            <label for="tipo">Quantidade</label>
            <input type="text" class="form-control" id="quantidade" placeholder="Valor Unitário">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
