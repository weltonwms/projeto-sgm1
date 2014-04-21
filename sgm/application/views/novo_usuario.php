<?php
echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";
echo "<script src='".base_url('assets/js/validacao_usuario.js')."'></script>";
echo link_tag(array('href'=>'assets/plugins/chosen/chosen.css','rel'=>'stylesheet','type'=>'text/css'));
echo "<script src='".base_url('assets/plugins/chosen/chosen.jquery.js')."'></script>";
?>
<legend>Cadastro de Usuário</legend>


<form method="post" id="form_usuario" class="form-horizontal">
   
   
    <div class=" col-md-6">
        <fieldset>
            <legend>Novo Usuário</legend>
           
        
                        <div class="form-group ">

				<label class="control-label col-md-4" for="servico">Login</label> 
                                <div class="col-md-8">
                                    <input name="login"
                                           value=""
                                           placeholder="Usuario" class="form-control" type="text">
                                </div>

			</div>
                       
					
			<div class="form-group">
				<label class="control-label col-md-4">Senha</label> 
                                <div class="col-md-8">
                                <input 	id="senha_cadastro" type="password" 
                                         value=""
                                         class="form-control" name='senha_cadastro'
					placeholder="Senha">
                                </div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Perfil</label> 
                                <div class="col-md-8">
                                 <select name="perfil" class="form-control" id='perfil'>
					<option value="">--Selecione--</option>
					<option value='0'> Cliente</option>
					<option value='1'> Administrador</option>
                                 </select>
                                </div>
			</div>

			<div class="form-group" id='div_cliente'>
				<label class="control-label col-md-4">Cliente</label>
                                <div class="col-md-8">
                                    <select name="id_cliente" class="form-control meu_chosen" disabled>
					<option value=''>--Selecione--</option>
                                        
                                        <?php
                                            foreach($clientes as $cliente):
                                                echo "<option value='{$cliente->get_id()}'";
                                               
                                                echo ">";
                                                echo  "(cod {$cliente->get_id()}) ".$cliente->get_nome();
                                                echo "</option>";
                                            endforeach;
                                        ?>
                                    </select>
					
                                </div>
			</div>
            </fieldset>
                        
                      
                       
        </div>
         
                    <div class="control-group col-md-7 col-md-offset-5">
				<button formaction="<?php echo base_url('usuario/cadastrar')?>"
					type="submit" class="btn btn-success" id="salvar">
					<span class="glyphicon glyphicon-save"></span> Salvar
				</button>
				<a href="<?php echo base_url('usuario')?>"
					type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-arrow-left"></span> Voltar
				</a>

		   </div>
		

		
	</form>

