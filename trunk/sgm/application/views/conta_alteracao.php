<?php
echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";
echo "<script src='".base_url('assets/js/validacao_conta.js')."'></script>";
echo link_tag(array('href'=>'assets/plugins/chosen/chosen.css','rel'=>'stylesheet','type'=>'text/css'));
echo "<script src='".base_url('assets/plugins/chosen/chosen.jquery.js')."'></script>";
?>
<legend>Alteração de Conta</legend>


<form method="post" id="form_conta" class="form-horizontal">
    <input type="hidden" name="id_conta" value="<?php echo $conta->get_id();?>"/>
   
    <div class=" col-md-6">
        <fieldset>
            <legend>Conta</legend>
           
        
                        <div class="form-group ">

				<label class="control-label col-md-4" for="servico">Serviço</label> 
                                <div class="col-md-8">
                                    <input id="servico" name="servico"
                                           value="<?php echo $conta->get_servico()?>"
                                           placeholder="Serviço" class="form-control" type="text">
                                </div>

			</div>
                       
			<div class="form-group">
				<label class="control-label col-md-4">Cliente</label>
                                <div class="col-md-8">
                                    <select name="id_cliente" class="form-control meu_chosen">
                                        
                                        <?php
                                            foreach($clientes as $cliente):
                                                echo "<option value='{$cliente->get_id()}'";
                                                if($cliente->get_id()==$conta->get_id_cliente()) echo "selected='selected'";
                                                echo ">";
                                                echo  "(cod {$cliente->get_id()}) ".$cliente->get_nome();
                                                echo "</option>";
                                            endforeach;
                                        ?>
                                    </select>
					
                                </div>
			</div>
			
			
			<div class="form-group">
				<label class="control-label col-md-4">Nr Doc</label> 
                                <div class="col-md-8">
                                <input 	id="nr_doc" type="text" 
                                         value="<?php echo $conta->get_nr_doc()?>"
                                         class="form-control" name='nr_doc'
					placeholder="Identificação Opcional">
                                </div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Data Cadastro</label> 
                                <div class="col-md-8">
                                <input 	id="data_cadastro" type="text" 
                                         value="<?php echo $conta->get_data_cadastro()?>"
                                         class="form-control data" name='data_cadastro'
					placeholder="Deixe em Branco para data atual">
                                </div>
			</div>
            </fieldset>
                        
                      
                       
        </div>
         
                    <div class="control-group col-md-7 col-md-offset-5">
				<button formaction="<?php echo base_url('conta/gravar_alteracao')?>"
					type="submit" class="btn btn-success" id="salvar">
					<span class="glyphicon glyphicon-save"></span> Salvar
				</button>
				<button id="voltar"
					type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-arrow-left"></span> Voltar
				</button>

		   </div>
		

		
	</form>

