<!--Esta página é chamada via ajax pelo Controler de Usuário-->

<?php
    echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
    echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";
    echo "<script src='".base_url('assets/js/atendimento_solicitacao.js')."'></script>";
?>

<table class='table table-condensed table-responsive table-user-information'>
    <tr>
        <td><span class='text-primary'><strong>Nome Cliente</strong></span></td>
        <td><?php echo $solicitacao->get_nome_cliente() ?></td>
        <td> </td>
        <td><span class='text-primary'><strong>Cod Cliente</strong></span></td>
        <td ><?php echo $solicitacao->get_id_cliente() ?></td>

    </tr>
    <tr>
        <td><span class='text-primary'><strong>Endereco</strong></span></td>
        <td ><?php echo $solicitacao->get_endereco() ?></td>
        <td> </td>
        <td><span class='text-primary'><strong>CPF</strong></span></td>
        <td ><?php echo $solicitacao->get_cpf() ?></td>

    </tr>
    <tr>
        <td><span class='text-primary'><strong>Email</strong></span></td>
        <td ><?php echo $solicitacao->get_email() ?></td>
        <td class='col-md-1'></td>
        <td></td>
        <td ></td>

    </tr>
</table>
<hr>

    <input type="hidden" name="id_solicitacao" value="<?php echo $solicitacao->get_id()?>"/>
    <input type="hidden" name="id_cliente" value="<?php echo $solicitacao->get_id_cliente()?>"/>
    <input type="hidden" name="id_usuario" value="<?php echo $solicitacao->get_id_usuario()?>"/>
    <div class="form-group">
        <label class="control-label col-md-4">Login de Usuário</label>
        <div class="col-md-6">
           
            <input  type="text"
                    value="<?php echo $solicitacao->get_login(); ?>"
                    class="form-control" name='login' placeholder="Usuário">
           
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-4">Senha de Usuário</label>
        <div class="col-md-6">
            <input  type="password"
                    value=""
                    class="form-control data" name='senha' placeholder="Senha">
        </div>
    </div>

<h4 class='alert alert-danger text-center'>Lembre-se de encaminhar Nome de Usuário e Senha
    <br>para o email do Cliente
</h4>

