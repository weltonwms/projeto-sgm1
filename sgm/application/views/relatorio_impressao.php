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
            table tr.total td{
                background-color: #f9f9f9;
                border-bottom: 1px dotted;
                border-left: 0px;
                border-right:  0px;
                font-weight:bold;
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
            <thead>
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
                if (isset($relatorio)):
                    foreach ($relatorio->get_mensalidades() as $mensalidade):
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
                    echo "<tr class='total'>";
                        echo "<td colspan='4'> </td>";
                        echo "<td> Valor Total</td>";
                        echo '<td> R$ '. number_format($relatorio->get_valor_total(), 2, ",", ".")."</td>";
                    echo "</tr>";
                endif;
                ?>
            </tbody>
        </table>
<script type="text/php">


if ( isset($pdf) ) {
$data= date('d-m-Y');
$texto="Sistema Gerenciador de Mensalidades";
$font = Font_Metrics::get_font("helvetica", "bold"); $pdf->page_text(220, 760, "{$texto} ", $font, 9, array(0,0,0));
$font2 = Font_Metrics::get_font("helvetica", "bold"); $pdf->page_text(535, 760, " PG: {PAGE_NUM} de {PAGE_COUNT}", $font2, 9, array(0,0,0));
$font3 = Font_Metrics::get_font("helvetica", "bold"); $pdf->page_text(30, 760, "{$data} ", $font3, 9, array(0,0,0));
} </script>
    </body>
</html>







