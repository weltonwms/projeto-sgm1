<?php echo "<script src='".base_url('assets/plugins/jquery.confirm.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/modalexclusao.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/plugins/data_table.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/tabela.js')."'></script>"; ?>
<legend>Lista de Contas a Receber</legend>

<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>

<a href="<?php echo base_url('conta/nova_conta')?>" type="button"
	class="btn btn-success navbar-right"> <span
	class="glyphicon glyphicon-plus"></span> Nova Conta
</a>
<br>


<!--inicio da tabela com lista de contas-->


<table id="tabela" class="table table-bordered table-striped custab table-condensed">
	<thead>
		<tr class="text-primary">
			<th>Código</th>
			<th>Nr Doc</th>
			<th>Devedor</th>
                        <th class="col-md-1 text-center">Total Mensalidades</th>
                        <th class="col-md-1 text-center">Mensalidades a Receber</th>
			<th class="col-md-1 text-center"><span class="glyphicon glyphicon-pencil"></span> Editar</th>
			<th class="col-md-1 text-center"><span class="text-danger"><span class="glyphicon glyphicon-trash">
                             </span>Excluir</span>
                        </th>
                        <th class="col-md-1 text-center"><span class="text-success"><span class="glyphicon glyphicon-usd">
                                           </span> Gerenciar Mensalidades</span></th>

		</tr>
	</thead>

        <tbody>
	
        <?php foreach ($contas as $conta):?>
         <tr>
                <td><?php echo $conta->get_id() ;?></td>
		 <td><?php echo $conta->get_nr_doc() ;?></td>
		 <td><?php echo $conta->get_nome_cliente() ;?></td>
                 <td><?php echo $conta->get_total_mensalidades() ;?></td>
                 <td><?php echo $conta->get_total_mensalidades_receber() ;?></td>
		<td class="text-center">
                    <a href="<?php echo base_url('conta/editar').'/'.$conta->get_id()?>">
                        <span class="glyphicon glyphicon-pencil"></span> 
                    </a>
                </td>
		<td class="text-center">
                    <a class="confirm_conta text-danger" 
                       href="<?php echo base_url('conta/excluir').'/'.$conta->get_id()?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
		</td>
                <td class="text-center">
                    <a class="text-success" 
                       href="<?php echo base_url('mensalidade/gerenciar').'/'.$conta->get_id()?>">
                        <span class="glyphicon glyphicon-usd"></span> 
                    </a>
                </td>
	</tr>
        <?php endforeach;?>
        </tbody>

	
</table>

