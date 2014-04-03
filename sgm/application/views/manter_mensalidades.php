<?php echo "<script src='" . base_url('assets/plugins/jquery.confirm.js') . "'></script>"; ?>
<?php echo "<script src='" . base_url('assets/js/modalexclusao.js') . "'></script>"; ?>
<?php echo "<script src='" . base_url('assets/plugins/data_table.js') . "'></script>"; ?>
<?php echo "<script src='" . base_url('assets/js/tabela.js') . "'></script>"; ?>
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

<div class="navbar-right">

    <a href="<?php echo base_url('conta') ?>" type="button"
       class="btn btn-default "> <span
            class="glyphicon glyphicon-arrow-left"></span> Voltar
    </a>
    <button type="button" class="btn btn-success " 
            id="btn_adicionar_mensalidade"> 
        <span class="glyphicon glyphicon-plus"></span> 
        Adicionar Mensalidade
    </button>
</div>



<!--inicio da tabela com lista de mensalidades-->
<br>

<table id="tabela" class="table table-bordered table-striped custab table-condensed">
    <thead>
        <tr class="text-primary">
            <th>Parcela</th>
            <th>Vencimento</th>
            <th>Status</th>
            <th>Valor</th>


            <th class="col-md-1 text-center"><span class="glyphicon glyphicon-pencil"></span> Editar</th>
            <th class="col-md-1 text-center"><span class="text-danger"><span class="glyphicon glyphicon-trash">
                    </span>Excluir</span>
            </th>
            <th class="col-md-1 text-center"><span class="text-success"><span class="glyphicon glyphicon-usd">
                    </span> Quitar</span></th>

        </tr>
    </thead>

    <tbody>

        <?php foreach ($conta->get_mensalidades() as $key => $mensalidade): ?>
            <tr>
                <td class="parcela"><?php echo ($key + 1) . " de " . $conta->get_total_mensalidades(); ?></td>
                <td class="vencimento"><?php echo $mensalidade->get_vencimento(); ?></td>
                <td><?php echo $mensalidade->get_status(); ?></td>
                <td class="valor"><?php echo "R$ " . number_format($mensalidade->get_valor(), 2, ",", "."); ?></td>

                <td class="text-center">
                    <a data-id="<?php echo $mensalidade->get_id()?>" class="mensalidade"
                       href="#">
                        <span class="glyphicon glyphicon-pencil"></span> 
                    </a>
                </td>
                <td class="text-center">
                    <a class="confirm_mensalidade text-danger" 
                       href="<?php echo base_url('mensalidade/excluir') . '/' . 
                               $mensalidade->get_id().'/'.$conta->get_id() ?>">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
                <td class="text-center">
                    <a class="text-success" 
                       href="<?php echo base_url('mensalidade/quitar') . '/' . $mensalidade->get_id() ?>">
                        <span class="glyphicon glyphicon-usd"></span> 
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>


</table>

<!--inicio do modal de adicionar ou alterar Mensalidade-->

<div class="modal fade" id="modal_manter_mensalidade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_mensalidade" method="post" class="form-horizontal" 
                  action="<?php echo base_url("mensalidade/manter") ?>">
                <input type="hidden" name="id_conta" value="<?php echo $conta->get_id()?>"/>
                <input type="hidden" name="id_mensalidade" id="id_mensalidade" value=""/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Adicionar Mensalidade</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-md-4">Vencimento</label>
                        <div class="col-md-8">
                            <input id="vencimento" type="text"
                                   value=""
                                   class="form-control data" name='vencimento' placeholder="Vencimento">
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
                    
                </div> <!-- /.modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script>
    $(".mensalidade").click(function(){
        id_mensalidade=($(this).attr('data-id'));
        parcela=$(this).closest('tr').children('.parcela');
         vencimento=$(this).closest('tr').children('.vencimento');
         valor=$(this).closest('tr').children('.valor');
         $('.modal-title').html('Alterar Mensalidade ('+parcela.html()+')');
         $("#valor").val(valor.html().substring(3));
         $("#vencimento").val(vencimento.html());
         $("#id_mensalidade").val(id_mensalidade);
         $("#modal_manter_mensalidade").modal('show');
    });
    
    $("#btn_adicionar_mensalidade").click(function(){
        $('.modal-title').html('Adicionar Mensalidade');
        $("#valor").val('');
        $("#vencimento").val('');
        $("#id_mensalidade").val('');
        $("#modal_manter_mensalidade").modal('show');
    });
</script>