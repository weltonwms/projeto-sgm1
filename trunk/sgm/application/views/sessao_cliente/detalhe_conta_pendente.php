
<div class="navbar-right">

    <a href="<?php echo base_url('sessao_cliente/pendencia/abrir_contas_pendentes') ?>" type="button"
       class="btn btn-default "> <span
            class="glyphicon glyphicon-arrow-left"></span> Voltar
    </a>
    
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


        </tr>
    </thead>

    <tbody>

        <?php foreach ($conta->get_mensalidades_receber() as $key => $mensalidade): ?>
            <tr <?php if($mensalidade->is_vencida()) echo "class='danger'"?>>
                <td class="parcela"><?php echo $mensalidade->get_nr_parcela() . " de " . $conta->get_total_mensalidades(); ?></td>
                <td class="vencimento"><?php echo $mensalidade->get_vencimento(); ?></td>
                <td><?php echo $mensalidade->get_status(); ?></td>
                <td class="valor"><?php echo "R$ " . number_format($mensalidade->get_valor(), 2, ",", "."); ?></td>

                
            </tr>
        <?php endforeach; ?>
    </tbody>


</table>

<table class='table table-condensed table-responsive'>
    <tr class="info">
        <td><strong class="text-info">Valor Total Pago</strong></td>
         <td><?php echo "R$ " . number_format($conta->get_total_recebido(), 2, ",", "."); ?></td>
    </tr>
    <tr class="info">
        <td><strong class="text-info">Valor Total a Pagar</strong></td>
         <td ><strong><?php echo "R$ " . number_format($conta->get_total_a_receber(), 2, ",", "."); ?></strong></td>
    </tr>
    
</table>


