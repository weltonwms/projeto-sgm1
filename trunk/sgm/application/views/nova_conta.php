<?php
echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";
echo "<script src='".base_url('assets/js/validacao_conta.js')."'></script>";
?>
<legend>Cadastro de Nova Conta</legend>


<form method="post" id="form_conta" class="form-horizontal">
    <div class="row">
    <div class=" col-md-6">
        <fieldset>
            <legend>Conta</legend>
           
        
                        <div class="form-group ">

				<label class="control-label col-md-4" for="servico">Serviço</label> 
                                <div class="col-md-8">
                                    <input id="servico" name="servico" placeholder="Serviço"
					class="form-control" type="text">
                                </div>

			</div>
                        <div class="form-group">
				<label class="control-label col-md-4">Código do Cliente</label>
                                <div class="col-md-8">
                                    <input id="cod_cliente" type="text"
					class="form-control" name='' placeholder="Cod Cliente">
                                </div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Cliente</label>
                                <div class="col-md-8">
                                    <select name="id_cliente" class="form-control">
                                        <option value="">--Selecione--</option>
                                        <?php
                                            foreach($clientes as $cliente):
                                                echo "<option value='{$cliente->get_id()}'>";
                                                echo $cliente->get_nome();
                                                echo "</option>";
                                            endforeach;
                                        ?>
                                    </select>
					
                                </div>
			</div>
			
			
			<div class="form-group">
				<label class="control-label col-md-4">Nr Doc</label> 
                                <div class="col-md-8">
                                <input 	id="nr_doc" type="text" class="form-control" name='nr_doc'
					placeholder="Identificação Opcional">
                                </div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Data Cadastro</label> 
                                <div class="col-md-8">
                                <input 	id="data_cadastro" type="text" class="form-control data" name='data_cadastro'
					placeholder="Deixe em Branco para data atual">
                                </div>
			</div>
            </fieldset>
                        
                      
                       
        </div>
         <div class="col-md-5">
             <fieldset>
                 <legend >Mensalidades</legend>
                        <div class="form-group ">

				<label class="control-label col-md-4" for="nr_mensalidades">Total de Mensalidades</label> 
                                <div class="col-md-8">
                                    <input id="nr_mensalidades" name="nr_mensalidades" placeholder="Total de Mensalidades"
					class="form-control" type="text">
                                </div>

			</div>
                        <div class="form-group">
				<label class="control-label col-md-4">Vencimento Inicial</label>
                                <div class="col-md-8">
                                    <input id="vencimento" type="text"
					class="form-control data" name='vencimento' placeholder="Vencimento Inicial">
                                </div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Valor</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">R$</span>
                                        <input id="valor" type="text"
					class="form-control money" name='valor' placeholder="Valor">
                                    </div>
                                </div>
			</div>
			
			
			
                        
                      
             </fieldset>           
        </div>
       
    </div>
                    <div class="control-group col-md-7 col-md-offset-5">
				<button formaction="<?php echo base_url('conta/cadastrar')?>"
					type="submit" class="btn btn-success" id="salvar">
					<span class="glyphicon glyphicon-save"></span> Salvar
				</button>
				<button id="voltar"
					type="button" class="btn btn-default">
					<span class="glyphicon glyphicon-arrow-left"></span> Voltar
				</button>

			</div>
		

		
	</form>
