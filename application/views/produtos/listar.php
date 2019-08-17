<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>

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
		echo '<tr><td><input type="checkbox" class="checkbox form-control" id=' . $produto->id . '></td>';
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
<div class="modal" tabindex="-1" role="dialog" id="modal" data-toggle="modal" data-target="modal">
	<div class="modal-dialog" role="document">
		<div class="modal-content" style="background-color: rgba(0,0,0,.0001) !important; border: none">
			<div class="modal-body">
				<div class="d-flex justify-content-center">
					<div class="spinner-border" role="status">
						<span class="sr-only">Loading...</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

    //Modal
    $('#modal').modal({
        keyboard: false,
        backdrop: 'static'
    });
    $('#modal').modal('toggle');

	//limpar checkbox
	for(let i = 0; i < $('.checkbox').length; i++ ){
        $('.checkbox')[i].checked = false;
	}

    let tabela = $('#table').DataTable({
		dom:'Bfrtip',
        "pageLength": 10,
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
        },
        buttons: [{
            text: 'Excluir Itens',
			className: 'btn btn-danger',
            attr: {
                id: 'excluir_itens'
            },
            action: function (e, dt, node, config) {
                excluiItens(1);
            }
        }
        ]
    });

    $('.excluir').on('click', (e) => {
        excluiItens(2, e.target.id)
    });

    $('.alterar').on('click', (e) => {
        location.href = '/index.php/alterar-produto/' + e.target.id
    });


    function excluiItens(tipo, id) {
		let confirm__ = confirm("Você realmente deseja excluir o(s) produto(s) ?");

		if(confirm__){

            $('#modal').modal('show');

            if (tipo == 1) {

                let selected = [];

                for (let i = 0; i < $('.checkbox').length; i++) {
                    if ($('.checkbox')[i].checked) {
                        selected.push($('.checkbox')[i].id);
                    }
                }

                if(selected.length > 0){
                    send_action(selected.join(','));
                }else{
                    alert('Você deve selecionar pelo menos um item.')
                }


            } else {
                send_action(id);
            }
		}
    }

    function send_action(dados) {
        $.ajax({
            method: "POST",
            url: "/index.php/excluir-produto/",
            dataType: 'html',
            data: {produto: dados}
        })
            .done(function (msg) {
                try{
                    let temp = JSON.parse(msg);
                    $('#modal').modal('hide');
					alert(temp['mensagem']);
				}catch (e) {
					alert(msg)
                }

                location.reload();
            });
    }

</script>

<style>
	#excluir_itens{
		margin-bottom: -40px;
	}
</style>
