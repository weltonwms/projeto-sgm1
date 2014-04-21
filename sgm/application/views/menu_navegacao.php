<section id="menu"  >
		<nav class="navbar navbar-default" >
			
			<ul class="nav navbar-nav">
				<li class=""><a href="<?php echo base_url('home')?>">Home</a></li>
				<li class=""><a href="<?php echo base_url('cliente') ?>">Gerenciar Cliente</a></li>
				<li class="dropdown"><a data-toggle="dropdown" href="#">Gerenciar Conta <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('conta') ?>">Contas a Receber</a></li>
                                        <li><a href="<?php echo base_url('conta/abrir_contas_recebidas') ?>">Contas Recebidas</a></li>  
                                    </ul>
                                
                                </li>
                                <li class="dropdown"><a data-toggle="dropdown" href="#">Gerenciar Usuários <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('usuario') ?>">Cadastro</a></li>
                                        <li><a href="<?php echo base_url('usuario/abrir_recuperacao_senha') ?>">Recuperação de Senha</a></li>  
                                    </ul>
                                
                                </li>
				<li class=""><a href="#">Emitir Relatório</a></li>
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li class=""><a href="#">Preferencias</a></li>

				</ul>
				<a href="<?php echo base_url('login/deslogar') ?>" class="navbar-btn btn btn-danger">
					<span class="glyphicon glyphicon-off"></span> Sair
				</a>
			</div>
		</nav>


</section> 

<section id="conteudo">  
