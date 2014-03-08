<?php echo "<script src='".base_url('assets/plugins/jquery.confirm.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/modalexclusao.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/plugins/data_table.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/tabela.js')."'></script>"; ?>
<legend>Lista de Clientes Cadastrados</legend>

<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>

<a href="<?php echo base_url('cliente/novo_cliente')?>" type="button"
	class="btn btn-success navbar-right"> <span
	class="glyphicon glyphicon-plus"></span> Novo Cliente
</a>
<br>


<!--inicio da tabela com lista de clientes-->


<table id="tabela" class="table table-bordered table-striped custab table-condensed">
	<thead>
		<tr class="text-primary">
			<th>Nome</th>
			<th>Endereço</th>
			<th>Telefone</th>
			<th><span class="glyphicon glyphicon-pencil"></span> Editar</th>
			<th><span class="text-danger"><span class="glyphicon glyphicon-trash">
                             </span>Excluir</span>
                        </th>

		</tr>
	</thead>

        <tbody>
	<tr>
        <?php foreach ($clientes as $cliente):?>
                <td><?php echo $cliente->get_nome() ;?></td>
		 <td><?php echo $cliente->get_endereco() ;?></td>
		 <td><?php echo $cliente->get_telefone1() ;?></td>
       
		<td>
                    <a href="<?php echo base_url('cliente/editar').'/'.$cliente->get_id()?>">
                        <span class="glyphicon glyphicon-pencil"></span> 
                    </a>
                </td>
		<td class="text-center">
                    <a class="confirm text-danger" 
                       href="<?php echo base_url('cliente/excluir').'/'.$cliente->get_id()?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
		</td>
	</tr>
        <?php endforeach;?>
        </tbody>

	
</table>

