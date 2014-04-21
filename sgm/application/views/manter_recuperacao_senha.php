<?php echo "<script src='".base_url('assets/plugins/jquery.confirm.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/modalexclusao.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/plugins/data_table.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/tabela.js')."'></script>"; ?>
<legend>Solicitações de Recuperação de Senha</legend>

<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>


<!--inicio da tabela com lista de solicitações de senha-->


<table id="tabela" class="table table-bordered table-striped custab table-condensed">
	<thead>
		<tr class="text-primary">
			<th>Nome Cliente</th>
                        <th>Login</th>
			<th>Email</th>
			<th>Data da Solicitação</th>
			<th><span class="glyphicon glyphicon-thumbs-up"></span> Atender</th>
			<th><span class="text-danger"><span class="glyphicon glyphicon-thumbs-down">
                             </span>Rejeitar</span>
                        </th>

		</tr>
	</thead>

        <tbody>
	
        <?php foreach ($solicitacoes as $solicitacao):?>
         <tr>
                <td><?php echo $solicitacao->get_nome_cliente() ;?></td>
                <td><?php echo $solicitacao->get_login() ;?></td>
		 <td><?php echo $solicitacao->get_email() ;?></td>
		 <td><?php echo $solicitacao->get_data_solicitacao_formatada() ;?></td>
       
		<td>
                    <a data-id_solicitacao="<?php  echo $solicitacao->get_id()?>" class="link_atender" 
                       href="#">
                        <span class="glyphicon glyphicon-thumbs-up"></span> 
                    </a>
                </td>
		<td class="text-center">
                    <a class="confirm_solicitacao text-danger" 
                       href="<?php echo base_url('usuario/rejeitar_solicitacao').'/'.$solicitacao->get_id()?>">
                        <span class="glyphicon glyphicon-thumbs-down"></span>
                    </a>
		</td>
	</tr>
        <?php endforeach;?>
        </tbody>

	
</table>
<br>
<p class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <span class="glyphicon glyphicon-warning-sign text-danger"></span>
    Clientes com Login em Branco não possuem Acesso ao Sistema !
</p>

<!--inicio do modal de Atendimento de Solicitação-->

<div class="modal fade" id="modal_atendimento_solicitacao">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_atendimento_solicitacao" method="post" class="form-horizontal" 
      action="<?php echo base_url("usuario/atender_solicitacao_usuario") ?>">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Solicitação de Usuário</h4>
                </div>
                <div class="modal-body">
                    <div id="conteudo_modal"></div>
                </div> <!-- /.modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancela</button>
                    <button type="submit" class="btn btn-success">Confirma</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<script>
    $('.link_atender').click(function(){
        id_solicitacao=$(this).attr('data-id_solicitacao'); 
        $.ajax({
            url: "<?php echo base_url('usuario/abrir_solicitacao_usuario')?>"+"/"+id_solicitacao,
            type:"GET",
            dataType:"HTML",
            success: function(data){
                $("#conteudo_modal").html(data);
                $("#modal_atendimento_solicitacao").modal('show');
            }
        });
    });
</script>

