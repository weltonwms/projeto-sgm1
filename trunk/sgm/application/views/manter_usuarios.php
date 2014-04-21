<?php echo "<script src='".base_url('assets/plugins/jquery.confirm.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/modalexclusao.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/plugins/data_table.js')."'></script>"; ?>
<?php echo "<script src='".base_url('assets/js/tabela.js')."'></script>"; ?>
<legend>Lista de Usuários Cadastrados</legend>

<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>

<a href="<?php echo base_url('usuario/abrir_cadastro_usuario')?>" 
	class="btn btn-success navbar-right"> <span
	class="glyphicon glyphicon-plus"></span> Novo Usuário
</a>
<br>

<!--inicio da tabela com lista de usuários-->


<table id="tabela" class="table table-bordered table-striped custab table-condensed">
	<thead>
		<tr class="text-primary">
			<th>Login</th>
			<th>Perfil</th>
			<th>Cliente</th>
			<th><span class="glyphicon glyphicon-pencil"></span> Editar</th>
			<th><span class="text-danger"><span class="glyphicon glyphicon-trash">
                             </span>Excluir</span>
                        </th>

		</tr>
	</thead>

        <tbody>
	
        <?php foreach ($usuarios as $usuario):?>
         <tr>
                <td><?php echo $usuario->get_login() ;?></td>
		 <td><?php echo $usuario->get_perfil() ;?></td>
		 <td><?php echo $usuario->get_descricao_cliente() ;?></td>
       
		<td>
                    <a href="<?php echo base_url('usuario/editar').'/'.$usuario->get_id()?>">
                        <span class="glyphicon glyphicon-pencil"></span> 
                    </a>
                </td>
		<td class="text-center">
                    <a class="confirm_usuario text-danger" 
                       href="<?php echo base_url('usuario/excluir').'/'.$usuario->get_id()?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
		</td>
	</tr>
        <?php endforeach;?>
        </tbody>

	
</table>

