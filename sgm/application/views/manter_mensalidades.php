<?php echo "<script src='".base_url('assets/plugins/jquery.confirm.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/modalexclusao.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/plugins/data_table.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/tabela.js')."'></script>"; ?>
<legend>Lista de Mensalidades a Receber</legend>

<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>

<a href="<?php echo base_url('mensalidade/adicionar')?>" type="button"
	class="btn btn-success navbar-right"> <span
	class="glyphicon glyphicon-plus"></span> Adicionar Mensalidade
</a>
<br>


<!--inicio da tabela com lista de mensalidades-->


<table id="tabela" class="table table-bordered table-striped custab table-condensed">
	<thead>
		<tr class="text-primary">
			<th>Parcela</th>
			<th>Vencimento</th>
			<th>Status</th>
                        <th>Valor</th>
                        
			
			<th class="col-md-1 text-center"><span class="text-danger"><span class="glyphicon glyphicon-trash">
                             </span>Excluir</span>
                        </th>
			<th class="col-md-1 text-center"><span class="glyphicon glyphicon-pencil"></span> Editar</th>
                        <th class="col-md-1 text-center"><span class="text-success"><span class="glyphicon glyphicon-usd">
                                           </span> Quitar</span></th>

		</tr>
	</thead>

        <tbody>
	
        <?php foreach ($mensalidades as $mensalidade):?>
         <tr>
                <td><?php echo $mensalidade->get_id() ;?></td>
		 <td><?php echo $mensalidade->get_vencimento() ;?></td>
		 <td><?php echo $mensalidade->get_status() ;?></td>
                 <td><?php echo "R$ ".number_format($mensalidade->get_valor(),2,",",".") ;?></td>
                
		<td class="text-center">
                    <a href="<?php echo base_url('mensalidade/editar').'/'.$mensalidade->get_id()?>">
                        <span class="glyphicon glyphicon-pencil"></span> 
                    </a>
                </td>
		<td class="text-center">
                    <a class="confirm_conta text-danger" 
                       href="<?php echo base_url('mensalidade/excluir').'/'.$mensalidade->get_id()?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
		</td>
                <td class="text-center">
                    <a class="text-success" 
                       href="<?php echo base_url('mensalidade/quitar').'/'.$mensalidade->get_id()?>">
                        <span class="glyphicon glyphicon-usd"></span> 
                    </a>
                </td>
	</tr>
        <?php endforeach;?>
        </tbody>

	
</table>

