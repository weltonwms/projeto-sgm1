<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Relatório de Mensalidades</title>
        <style>
            table tr td{
                border: 1px solid;
                padding: 4px;
                line-height: 1.42857143;
                vertical-align: top;
               
                
            }
            
            thead th{
                border: 1px solid;
                background-color: #f9f9f9;
            }
        </style>
    </head>
    <body>
        <div align="center">
            <?php $dados = array('A Receber', 'Recebidas') ?>
            <b>
                Relatório de Mensalidades <?php echo $dados[$informacao['tipo']] ?><br>
                <?php echo "Período de {$informacao['periodo_inicial']} a {$informacao['periodo_final']}" ?>
            </b>
        </div>
        <table  cellpadding="0" cellspacing="0" width='100%'>
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
                            <td><?php echo $mensalidade->get_id_conta() ?></td>
                            <td><?php echo $mensalidade->get_endereco() ?></td>
                            <td><?php echo $mensalidade->get_valor() ?></td>
                        </tr>  
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
<script type="text/php">


if ( isset($pdf) ) {
$texto='<hr>';

$font = Font_Metrics::get_font("helvetica", "bold"); $pdf->page_text(40, 48, "{$texto} PG: {PAGE_NUM} de {PAGE_COUNT}", $font, 9, array(0,0,0));


} </script>
    </body>
</html>







