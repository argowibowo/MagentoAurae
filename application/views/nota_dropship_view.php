<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Drop-down menu</title>
    <link href="<?php echo base_url();?>assets/css/style2.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
                table.gridtable {
                    font-family: verdana,arial,sans-serif;
                    font-size:11px;
                    color:#333333;
                    border-width: 1px;
                    border-color: #666666;
                    border-collapse: collapse;
                    width: 100%;
            }
            table.gridtable th {
                    border-width: 1px;
                    padding: 8px;
                    border-style: solid;
                    border-color: #ffffff;
                    background-color: #ba0000;
                    
            }
            
            table.gridtable a {
                    color: #FFF;
            }
            
            table.gridtable td {
                    padding: 8px;
                    background-color: #ffffff;
                    border-width: 1px;
                    border-bottom-style: solid;
                    border-style: solid;
                    border-color: #e5dcdc;
            }
            </style>
  </head>
  <body>
    <?php include 'header_menu.php';?>
      <br></br>
      <div>
                <div style='height:20px;'></div>  
                <div></div>
                <div>
                    <TABLE>
                        <tr>
                            <td>
                                CUSTOMER ID
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?echo $custs[0]->ID ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                CUSTOMER NAME
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?echo $custs[0]->NAMA ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                EMAIL
                            </td>
                            <td>
                                :
                            </td>
                            <td>
                                <?echo $custs[0]->EMAIL ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                FROM
                            </td>
                            <td>
                                TO
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?echo $notas[0]->SHIPPING_FROM ?>
                            </td>
                            <td>
                                <?echo $notas[0]->SHIPPING_TO ?>
                            </td>
                        </tr>
                    </table>
                    <table class="gridtable">
                                <thead>
                                    <tr>
                                        <th><a>#</a></th>
                                        <th><a>Product</a></th>
                                        <th><a>Color</a></th>
                                        <th><a>Harga</a></th>
                                        <th><a>QTY</a></th>
                                        <th><a>Subtotal</a></th>
                                    </tr>
                                </thead>
                                <?$tot = 0?>
                                <tbody>
                                    <?$count = 0?>
                                    
                                    <? foreach ($details as $detail) { ?>
                                        <?$count++?>
                                        <?$tot = $tot + $detail->SUBTOTAL?>
                                        <tr>
                                            <td><? echo $count ?></td>
                                            <td><? echo $detail->NAME ?></td>
                                            <td><? echo $detail->HARGA_AWAL ?></td>
                                            <td><? echo $detail->HARGA_JUAL ?></td>
                                            <td><? echo $detail->STOCK ?></td>
                                            <td><? echo $detail->SUBTOTAL ?></td>
                                        </tr>
                                    <? } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" style="background-color: #3E454D">
                                            <a>TOTAL</a>
                                        </td>
                                        <td style="background-color: #3E454D">
                                            <a><?echo $tot?></a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                </div>
      </div>
  </body>
</html>