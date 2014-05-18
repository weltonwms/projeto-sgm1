<?php echo "<script src='".base_url('assets/plugins/data_table.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/tabela.js')."'></script>"; ?>
<?php echo "<script src='" . base_url('assets/js/pendencia.js') . "'></script>"; ?>
<legend>Lista de Contas Com Pendências</legend>



<br>


<!--inicio da tabela com lista de contas-->


<table id="tabela" class="table table-bordered table-striped custab table-condensed">
	<thead>
		<tr class="text-primary">
			<th>Código</th>
			<th>Nr Doc</th>
			<th>Tipo de Serviço</th>
                        <th class="col-md-1 text-center">Total Mensalidades</th>
                        <th class="col-md-1 text-center">Mensalidades a Pagar</th>
			<th class="col-md-1 text-center">Mensalidades Vencidas</th>
                        <th class="col-md-1 text-center">Detalhar</th>
		</tr>
	</thead>

        <tbody>
	
        <?php foreach ($contas_pendentes as $conta):?>
         <tr>
                <td><?php echo $conta->get_id() ;?></td>
		 <td><?php echo $conta->get_nr_doc() ;?></td>
		 <td><?php echo $conta->get_servico() ;?></td>
                 <td><?php echo $conta->get_total_mensalidades() ;?></td>
                 <td><?php echo $conta->get_total_mensalidades_receber() ;?></td>
                 <td class="vencida"><?php echo $conta->get_total_mensalidades_vencidas() ;?></td>
                 <td>
                    <a href="<?php echo base_url('sessao_cliente/pendencia/detalhar_conta_pendente')."/{$conta->get_id()}"?>"
                        <span class="glyphicon glyphicon-th"></span></a>
                 </td>
	</tr>
        <?php endforeach;?>
        </tbody>

	
</table>

