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

<?php if($this->session->flashdata('msg_confirm')!=null):?>
	<div class="alert alert-<?php echo $this->session->flashdata('status')?> alert-dismissable">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php $icone= $this->session->flashdata('status')=='danger'? 'remove':'ok'?>
                <?php echo "<span class=\"glyphicon glyphicon-$icone  \"></span>&nbsp"?>
  		 <?php echo $this->session->flashdata('msg_confirm')?>
	</div>
<?php endif;?>


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

<table id="tabela_mensalidades" class="table table-bordered table-striped custab table-condensed">
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

        <?php foreach ($conta->get_mensalidades_receber() as $key => $mensalidade): ?>
            <tr>
                <td class="parcela"><?php echo $mensalidade->get_nr_parcela() . " de " . $conta->get_total_mensalidades(); ?></td>
                <td class="vencimento"><?php echo $mensalidade->get_vencimento(); ?></td>
                <td <?php if($mensalidade->is_vencida()) echo "class='danger'"?>>
                    <?php echo $mensalidade->get_status(); ?></td>
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
                    <a data-id="<?php echo $mensalidade->get_id()?>" class="text-success link_quitar_mensalidade" 
                       href="#">
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




<!--inicio do modal de Quitar Mensalidade-->

<div class="modal fade" id="modal_quitar_mensalidade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form_quitar" method="post" class="form-horizontal" 
                  action="<?php echo base_url("mensalidade/quitar") ?>">
                <input type="hidden" name="id_conta" value="<?php echo $conta->get_id()?>"/>
                <input type="hidden" name="id_mensalidade" id="id_mensalidade_quitar" value=""/>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"Quitação de Mensalidade</h4>
                </div>
                <div class="modal-body">
                    <h5 class="text-center"><strong>Deseja Realmente Quitar Esta Mensalidade?</strong></h5>
                    
                    <table class='table table-condensed table-responsive table-user-information'>
                        <tr>
                            <td><span class='text-primary'><strong>Cod Conta</strong></span></td>
                             <td><?php echo $conta->get_id()?></td>
                             <td> </td>
                             <td><span class='text-primary'><strong>Nr Doc</strong></span></td>
                             <td ><?php echo $conta->get_nr_doc()?></td>
                             
                        </tr>
                        <tr>
                            <td><span class='text-primary'><strong>Devedor</strong></span></td>
                             <td ><?php echo $conta->get_nome_cliente()?></td>
                             <td> </td>
                             <td><span class='text-primary'><strong>Cod Devedor</strong></span></td>
                             <td ><?php echo $conta->get_id_cliente()?></td>
                             
                        </tr>
                         <tr>
                            <td><span class='text-primary'><strong>Parcela</strong></span></td>
                             <td id='parcela_quitar'> </td>
                             <td class='col-md-1'></td>
                             <td><span class='text-primary'><strong>Vencimento</strong></span></td>
                             <td id='vencimento_previsto'> </td>
                            
                        </tr>
                    </table>
                    
                   
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-md-3">Valor Pago</label>
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-addon">R$</span>
                                <input id="valor_pago" type="text"
                                       class="form-control money" name='valor_pago' placeholder="Valor">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3">Data Pagamento</label>
                        <div class="col-md-6">
                            <input  type="text"
                                   value="<?php echo date('d/m/Y');?>"
                                   class="form-control data" name='data_quitacao' placeholder="Vencimento">
                        </div>
                    </div>
                    
                </div> <!-- /.modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancela</button>
                    <button type="submit" class="btn btn-success">Confirma</button>
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
        ultimo_vencimento=$('.vencimento:last').html();
        ultimo_valor=$('.valor:last').html().substring(3);
       if(ultimo_vencimento!==undefined){
           novo_vencimento=adicionarMesData(ultimo_vencimento);
           $("#valor").val(ultimo_valor);
           $("#vencimento").val(novo_vencimento);
       }
       else{
        $("#valor").val('');
        $("#vencimento").val('');
       }
      
        $('.modal-title').html('Adicionar Mensalidade');
        $("#id_mensalidade").val('');
        $("#modal_manter_mensalidade").modal('show');
    });
    
    $(".link_quitar_mensalidade").click(function(){
        id_mensalidade=($(this).attr('data-id'));
        parcela=$(this).closest('tr').children('.parcela');
         vencimento=$(this).closest('tr').children('.vencimento');
         valor=$(this).closest('tr').children('.valor');
         $('.modal-title').html('Quitação de Mensalidade');
          $("#id_mensalidade_quitar").val(id_mensalidade);
         $('#parcela_quitar').html(parcela.html());
         $('#vencimento_previsto').html(vencimento.html());
         $('#valor_pago').val(valor.html().substring(3));
         $("#modal_quitar_mensalidade").modal('show');
    });
    
    function adicionarMesData(data){
        array=data.split('/');
        d= new Date(array[2],parseInt(array[1])-1,parseInt(array[0]));
        function pad(s) { return (s < 10) ? '0' + s : s; }
        d.setMonth(d.getMonth()+1);
        minhaData=pad(d.getDate())+'/'+ pad(d.getMonth()+1) +'/'+ d.getFullYear();
        return minhaData;
    }
</script>