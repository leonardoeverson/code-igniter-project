<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.18/datatables.min.js"></script>
<h5><?php echo $title; ?></h5>
<hr/>
<table class="table" id="table">
	<thead>
	<tr>
		<th scope="col"></th>
		<th scope="col">Marca</th>
		<th scope="col">Tipo</th>
		<th scope="col">Sabor</th>
		<th scope="col">Litragem</th>
		<th scope="col">Valor Unitário</th>
		<th scope="col">Quantidade</th>
		<th scope="col">Editar</th>
		<th scope="col">Excluir</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($produtos as $produto) {
		echo '<tr><td><input type="checkbox" class="checkbox form-control"></td>';
		echo '<td>' . $produto->marca . '</td>';
		echo '<td>' . $produto->tipo . '</td>';
		echo '<td>' . $produto->sabor . '</td>';
		echo '<td>' . $produto->litragem . '</td>';
		echo '<td>' . $produto->valor_unitario . '</td>';
		echo '<td>' . $produto->quantidade . '</td>';
		echo '<td><button type="button" class="btn btn-primary alterar" id=' . $produto->id . '>Alterar</button></td>';
		echo '<td><button type="button" class="btn btn-danger excluir"  id=' . $produto->id . '>Excluir</button></td></tr>';
	}; ?>
	</tbody>
</table>


<script>
    let tabela = $('#table').DataTable({
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                }
            }
        }
        ,
        buttons: [
            {
                text: 'Excluir Itens',
                action: function (e, dt, node, config) {
                    excluiItens(1);
                }
            }
        ]
    });

    $('.excluir').on('click', () => {
        excluiItens(2, e.target.id)
    });

    $('.alterar').on('click', (e) => {
        location.href = '/index.php/alterar/' + e.target.id
    });


    function excluiItens(tipo, id) {

        if (tipo == 1) {

            let selected = [];

            for (let i = 0; i < $('.checkbox').length; i++) {
                if ($('.checkbox').checked) {
                    selected.push($('.checkbox').attr('id'));
                }
            }

            send_action(dados);
        } else {
            send_action(id);
        }
    }

    function send_action(dados) {
        $.ajax({
            method: "POST",
            url: "index.php/cadastro/excluir",
            dataType: 'html',
            data: {produto: dados}
        })
            .done(function (msg) {
                alert(msg);
            });
    }

</script>
