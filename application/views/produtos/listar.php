<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

<h5><?php echo $title; ?></h5>
<hr/>
<table class="table" id="table">
	<thead>
	<tr>
		<th scope="col">Marca</th>
		<th scope="col">Tipo</th>
		<th scope="col">Sabor</th>
		<th scope="col">Litragem</th>
		<th scope="col">Valor Unitário</th>
		<th scope="col">Estoque</th>
		<th scope="col">Editar</th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td></td>
	</tr>
	</tbody>
</table>


<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
