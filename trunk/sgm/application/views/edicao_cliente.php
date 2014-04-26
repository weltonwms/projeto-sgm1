<?php
echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";
echo "<script src='".base_url('assets/js/validacao_cliente.js')."'></script>";
?>
<legend>Alteração de Cliente</legend>


	<form method="post" id="form_cliente">
            <input type="hidden" name="id_cliente" value="<?php echo $cliente->get_id();?>"/>
                        <div class="col-md-4 control-group ">

				<label class="control-label" for="Nome">Nome Completo</label> 
                                <input id="nome" name="nome" placeholder="Nome"
                                       value="<?php echo $cliente->get_nome();?>"
					class="form-control" type="text">

			</div>
                        <div class="col-md-4 control-group">
				<label class="control-label">RG</label>
                                <input id="rg" type="text"
                                       value="<?php echo $cliente->get_rg();?>"
					class="form-control" name='rg' placeholder="RG">
			</div>
			<div class="col-md-4 control-group">
				<label class="control-label">CPF</label>
                                <input id="cpf" type="text"
                                       value="<?php echo $cliente->get_cpf();?>"
					class="form-control cpf" name='cpf' placeholder="CPF">
			</div>
			
			
			<div class="col-md-4 control-group">
				<label class="control-label">Cidade</label> 
                                    <input id="cidade" type="text" 
                                         value="<?php echo $cliente->get_cidade();?>"
                                        class="form-control" name='cidade' 
                                        placeholder="Cidade">
			</div>
			<div class="col-md-4 control-group">
				<label class="control-label" for="">Bairro</label> 
                                    <input id="bairro" name="bairro" 
                                        value="<?php echo $cliente->get_bairro();?>"
                                         placeholder="Bairro"
					class="form-control" type="text"> 
			</div>
                        
                        <div class="col-md-4 control-group">
				<label class="control-label" for="">Rua</label> 
                                    <input id="rua" name="rua" 
                                        value="<?php echo $cliente->get_rua();?>"
                                        placeholder="Rua"
					class="form-control" type="text"> 
			</div>
                        <div class="col-md-2 control-group">
				<label class="control-label" for="">Quadra</label>
                                    <input id="quadra" name="quadra" 
                                        value="<?php echo $cliente->get_quadra();?>"
                                        placeholder="Quadra"
					class="form-control" type="text"> 
			</div>
                        <div class="col-md-2 control-group">
				<label class="control-label" for="">Casa</label> 
                                <input id="casa" name="casa" placeholder="Casa"
                                       value="<?php echo $cliente->get_casa();?>"
					class="form-control" type="text"> 
			</div>
                        
                        <div class="col-md-4 control-group">
				<label class="control-label" for="">Telefone de Contato</label> 
                                <input 	id="telefone1" name="telefone1" 
                                        value="<?php echo $cliente->get_telefone1();?>"
                                        placeholder="Telefone"
					class="form-control telefone" type="text"> 
			</div>
                        <div class="col-md-4 control-group">
				<label class="control-label" for="">Telefone Comercial</label> 
                                <input id="telefone2" name="telefone2" 
                                       value="<?php echo $cliente->get_telefone2();?>"
                                       placeholder="Telefone"
					class="form-control telefone" type="text"> 
			</div>
                        
                         <div class="col-md-4 control-group">
				<label class="control-label" for="">Email</label> 
                                <input 	id="email" name="email" 
                                        value="<?php echo $cliente->get_email();?>"
                                        placeholder="Email"
					class="form-control" type="text"> 
			</div>
                        


                   
                    <div class="control-group col-md-7 col-md-offset-5">
				<button formaction="<?php echo base_url('cliente/gravar_alteracao')?>"
					type="submit" class="btn btn-success" id="salvar">
					<span class="glyphicon glyphicon-save"></span> Salvar
				</button>
				<button id="voltar"
					type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-arrow-left"></span> Voltar
				</button>

			</div>
		

		
	</form>
