<?php
echo "<script src='".base_url('assets/plugins/jquery.validate.js')."'></script>";
echo "<script src='".base_url('assets/plugins/jquery.mask.js')."'></script>";
echo "<script src='".base_url('assets/js/validacao_relatorio.js')."'></script>";

?>
<legend>Relatório de Mensalidades</legend>


<div class="row">
    <form id='form_relatorio' action="<?php echo base_url('relatorio/gerar_relatorio') ?>" method="post">

        <div class="col-md-2">
            <label class=""><span
                    class="glyphicon glyphicon-filter"></span> Período Inicial:</label>
            <div class="">
                <input type="text" name="periodo_inicial" class="form-control data"/>

            </div>
        </div>



        <div class="col-md-2">
            <label class=""><span
                    class="glyphicon glyphicon-filter"></span> Período Final:</label>
            <div class="">
                <input type="text" name="periodo_final" class="form-control data"/>

            </div>
        </div>

        <div class="col-md-3">
            <label class=""><span
                    class="glyphicon glyphicon-filter"></span> Tipo de Mensalidade:</label>
            <div class="">
                <select name="tipo" class="form-control">
                    <option selected="selected" value=''>Selecione</option>
                    <option value='0'>A Receber</option>
                    <option value='1'>Recebida</option>

                </select>

            </div>
        </div>

        <div class="col-md-3">
            <label class=""><span
                    class="glyphicon glyphicon-filter"></span> Ordenador Por:</label>
            <div class="">
                <select name="ordenado_por" class="form-control">
                    <option selected="selected" value=''>Selecione</option>
                    <option value='vencimento'>Vencimento</option>
                    <option value='nr_doc'>Nr Doc</option>
                    <option value='cliente'>Cliente</option>
                    <option value='rua'>Rua</option>
                    <option value='quadra'>Quadra</option>
                </select>

            </div>
        </div>

        <div class="col-md-2">
            <label>Executar</label>
            <div>
                <button type="submit" class="btn btn-default ">Executar</button>
            </div>
        </div>
    </form> 
</div><!--Fechamento da Row-->






<br>


<table id="tabela"
       class="table table-bordered table-striped custab table-condensed">
    <thead class="text-primary small">
        <tr>
            <th>Vencimento</th>
            <th>Devedor</th>
            <th>Nr Doc</th>
            <th>Cod Conta</th>
            <th>Endereço</th>
            <th>Valor</th>

        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($mensalidades)):
            foreach ($mensalidades as $mensalidade):
                ?>
                <tr>
                    <td><?php echo $mensalidade->get_vencimento() ?></td>
                    <td><?php echo $mensalidade->get_devedor() ?></td> 
                    <td><?php echo $mensalidade->get_nr_doc() ?></td>
                    <td><?php echo $mensalidade->get_nr_doc() ?></td>
                    <td><?php echo $mensalidade->get_endereco() ?></td>
                    <td><?php echo $mensalidade->get_valor() ?></td>
                </tr>  
                <?php
            endforeach;
        endif;
        ?>
    </tbody>
</table>




