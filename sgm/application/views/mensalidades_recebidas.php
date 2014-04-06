<?php echo "<script src='" . base_url('assets/plugins/jquery.confirm.js') . "'></script>"; ?>
<?php echo "<script src='" . base_url('assets/js/modalexclusao.js') . "'></script>"; ?>

<?php echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";?>
<?php echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";?>
<?php echo "<script src='".base_url('assets/js/validacao_mensalidade.js')."'></script>";?>
<!--inicio do bloco de cabeçalho das mensalidades com informações da conta-->
<h4>Lista de Mensalidades a Receber</h4>
<div class="row ">
    <div class="panel panel-default">

        <div class="panel-body">
            <div class="col-md-4">
                <strong > Cód. Conta:</strong>&nbsp&nbsp <span class="text-danger"><?php echo $conta->get_id() ?></span><br>
                <strong > Nr. Doc:</strong>&nbsp&nbsp <span class="text-danger"><?php echo $conta->get_nr_doc() ?></span>
            </div>
            <div class="col-md-4">
                <strong> Devedor:</strong> &nbsp&nbsp<span class="text-danger"><?php echo $conta->get_nome_cliente() ?></span><br>
                <strong> Cód. Devedor:</strong>&nbsp&nbsp <span class="text-danger"><?php echo $conta->get_id_cliente() ?></span>
            </div>
            <div class="col-md-4">
                <strong> Servico:</strong> &nbsp&nbsp<span class="text-danger"><?php echo $conta->get_servico() ?></span><br>
                <strong> Endereço:</strong>&nbsp&nbsp <span class="text-danger"><?php echo $conta->get_endereco_cliente() ?></span>
            </div>

        </div>
    </div>


</div>

<!--Fim do bloco de cabeçalho e início do bloco oculto de mensagens de alerta-->

<?php if ($this->session->flashdata('msg_confirm') != null): ?>
    <div class="alert alert-<?php echo $this->session->flashdata('status') ?> alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('msg_confirm') ?>
    </div>
<?php endif; ?>


<!-- Fim do Bloco de Alerta -->


<!--inicio da tabela com lista de mensalidades recebidas-->
<br>

<table class="table table-bordered table-striped custab table-condensed">
    <thead>
        <tr class="text-primary">
            <th>Parcela</th>
            <th>Vencimento</th>
            <th>Pagamento</th>
            <th>Valor</th>


            <th>Valor Pago</th>
            <th class="col-md-1 text-center"><span class="text-danger"><span class="glyphicon glyphicon-trash">
                    </span>Excluir</span>
            </th>
            

        </tr>
    </thead>

    <tbody>

        <?php foreach ($conta->get_mensalidades_recebidas() as $key => $mensalidade): ?>
            <tr>
                <td class=""><?php echo $mensalidade->get_nr_parcela() . " de " . $conta->get_total_mensalidades(); ?></td>
                <td class=""><?php echo $mensalidade->get_vencimento(); ?></td>
                <td><?php echo $mensalidade->get_data_quitacao(); ?></td>
                <td class="valor"><?php echo "R$ " . number_format($mensalidade->get_valor(), 2, ",", "."); ?></td>

                <td><?php echo $mensalidade->get_valor_pago(); ?></td>
                <td class="text-center">
                    <a class="confirm_mensalidade text-danger" 
                       href="<?php echo base_url('mensalidade/excluir_recebida') . '/' . 
                               $mensalidade->get_id().'/'.$conta->get_id() ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
               
            </tr>
        <?php endforeach; ?>
    </tbody>


</table>


