<?php
echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
echo "<script src='".base_url('assets/js/validacao_login.js')."'></script>";
?>

<legend>Alteração de Senha</legend>
<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php $icone= $this->session->flashdata('status')=='danger'? 'remove':'ok'?>
                <?php echo "<span class=\"glyphicon glyphicon-$icone  \"></span>&nbsp"?>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>


<div class="row">
    <div class="col-md-offset-2 col-md-7">
        <form method="POST" id="form_login";
              action="<?php echo base_url("sessao_cliente/home/alterar_senha")?>" 
              class="form-horizontal">
            <div class="form-group">
                <label for="" class="col-md-4 control-label">Senha Atual</label>
                <div class="col-md-8">
                    <input type="password" name="senha_antiga" class="form-control" id="senha_antiga" placeholder="Senha Atual">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-md-4 control-label">Senha Nova</label>
                <div class="col-md-8">
                    <input type="password" name="senha_nova" class="form-control" id="senha_nova" placeholder="Senha Nova">
                </div>
            </div>
            <div class="form-group">
                <label for=" " class="col-md-4 control-label">Confirmação Senha</label>
                <div class="col-md-8">
                    <input type="password" name="senha_confirmacao" class="form-control" id="confirmacao_senha" placeholder="Confirmação Senha">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-4 col-md-8">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-saved"></span>  &nbsp;Alterar</button>
                </div>
            </div>
        </form>



    </div>


</div>
