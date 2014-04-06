<?php echo "<script src='".base_url('assets/plugins/jquery.confirm.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/modalexclusao.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/plugins/data_table.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/tabela.js')."'></script>"; ?>
<legend>Lista de Contas Recebidas<small class='text-muted text-info'>  (Contas que possuem Mensalidades Quitadas)</small></legend>

<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>


<br>


<!--inicio da tabela com lista de contas recebidas-->


<table id="tabela" class="table table-bordered table-striped custab table-condensed">
	<thead>
		<tr class="text-primary">
			<th>Código</th>
			<th>Nr Doc</th>
			<th>Devedor</th>
                        <th class="col-md-1 text-center">Total Mensalidades</th>
                        <th class="col-md-1 text-center">Mensalidades Recebidas</th>
			 <th class="col-md-1 text-center">Mensalidades a Receber</th>
			
                        <th class="col-md-1 text-center"><span class="text-primary"><span class="glyphicon glyphicon-zoom-in">
                                           </span> Detalhar</span></th>

		</tr>
	</thead>

        <tbody>
	
        <?php foreach ($contas_recebidas as $conta):?>
         <tr>
                <td><?php echo $conta->get_id() ;?></td>
		 <td><?php echo $conta->get_nr_doc() ;?></td>
		 <td><?php echo $conta->get_nome_cliente() ;?></td>
                 <td><?php echo $conta->get_total_mensalidades() ;?></td>
                 <td><?php echo $conta->get_total_mensalidades_recebidas() ;?></td>
		<td> <?php echo $conta->get_total_mensalidades_receber() ;?></td>
		
                <td class="text-center">
                    <a class="text-primary" 
                       href="<?php echo base_url('mensalidade/detalhar_mensalidades_recebidas').'/'.$conta->get_id()?>">
                        <span class="glyphicon glyphicon-zoom-in"></span> 
                    </a>
                </td>
	</tr>
        <?php endforeach;?>
        </tbody>

	
</table>

