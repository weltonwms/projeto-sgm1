<div id="tudo" class="container"> 
<header class="row">
	<div id="logo" class="col-md-3">
		<img src="<?php echo base_url('assets/imgs/logo.png')?>" width="274px" height="91px" alt="assunto aqui"/> 
	</div>

	<div id="apresentacao" class="col-md-7">
		<h1 align="center">Sistema de Mensalidades </h1>
	</div>

	<div id="saudacao" class="text-muted" class="col-md-2">
		Bem Vindo: <strong><?php echo $this->session->userdata('login')?></strong><br>
                Perfil: <strong><?php echo $this->session->userdata('adm')==1?'Adm':'Cliente'?></strong>
	</div>
	
	<br><br><br>
	
</header>
