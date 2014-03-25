<?php
echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";
echo "<script src='".base_url('assets/js/validacao_cliente.js')."'></script>";
?>
<h2 class="well text-center text-primary">Recuperação de Senha</h2>
<?php if ($this->session->flashdata('msg')!=null):?>
<div class="alert alert-warning  alert-dismissable col-md-6 col-md-offset-3">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <p><?php echo $this->session->flashdata('msg');?></p> 
</div>
<?php endif?>
<br><br>
<div class="box_recuperacao_senha well">
	<form method="post" id="form_solicitacao_senha">
                        <div class="col-md-12 control-group ">

				<label class="control-label" for="Nome">Nome Completo</label> <input
					id="nome" name="nome" placeholder="Nome"
					class="form-control" type="text">

			</div>
                      
                         <div class="col-md-12 control-group">
				<label class="control-label" for="">Email</label> 
                                <input 	id="email" name="email" placeholder="Email"
					class="form-control" type="text"> 
			</div>
                        

                   
                    <div class="control-group col-md-9 col-md-offset-3">
                        <br><br>
				<button formaction="<?php echo base_url('login/recuperar_senha')?>"
					type="submit" class="btn btn-success" id="salvar">
					<span class="glyphicon glyphicon-save"></span> Enviar Solicitação
				</button>
				<a href="<?php echo base_url('login')?>"
					type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-arrow-left"></span> Voltar
				</a>

			</div>
		

		
	</form>
</div>