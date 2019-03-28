<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include "menu.php";
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resultado</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script language="JavaScript" >
        function barraData(n){
        if(n.value.length==2)
            n.value += '/';
        if(n.value.length==5)
            n.value += '/';
        }
    </script>
    
	<!------ Include the above in your HEAD tag ---------->

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="home">
    <div class="container">
        <div class="row display-table-row">
            
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
               
                <div class="user-dashboard">
                    <h1>Editar Validade</h1>
                    <div class="row">
                    <?php
                        $con_string = "host=10.85.3.111 port=5432 dbname=prd user=ssi password=ssi@10";
                        $conexao = pg_connect($con_string);

                        if(!@($conexao)){
                           print "Não foi possível estabelecer uma conexão com o banco de dados.";
                        } else {
                           
                           $pesquisar = $_REQUEST['data_validade'];
                           $result_pac = "SELECT 
                            sapa.id_solicitacaoprocedimentoapac,
                            napa.nume_apac, 
                            sapa.data_validade,
                            paci.codi_cartaosus,
                            paci.codi_cpf,
                            paci.nome_paciente,
                            paci.data_nascimento,
                            paci.nome_mae

                            from 
                                far.solicitacaoprocedimentoapac as sapa,
                                gen.paciente                    as paci,
                                far.numeracaoapac               as napa
                            where
                                sapa.id_paciente = paci.id_paciente and
                                sapa.id_solicitacaoprocedimentoapac = napa.id_solicitacaoprocedimentoapac and
                                napa.nume_apac in ('$pesquisar') ";
                            
                           $result_pac = pg_query($conexao, $result_pac);
                           

                           while($rows_pac = pg_fetch_row($result_pac)){
                            echo    "<form action='salvarDATA.php?id_solicitacao=".$rows_pac[0]."' method='POST'>";
                            echo    "<input type='hidden' name='num_apac' value='".$rows_pac[1]."'>";
                            echo    "<div class='form-group'>";  
                            echo    "<table class='table table-striped'>";
                            echo    "<thead class='thead-dark'>
                                        <tr>
                                            <th scope='col'>Informações do Paciente</th>
                                        </tr>
                                    </thead> ";
                            echo    "<tbody>";
                            echo    "<tr>
                                    <td>ID solicitação procedimento: </td>
                                    <td>".$rows_pac[0]."</td>
                                    </tr>";
                            echo    "<tr>
                                    <td>Numeração APAC: </td>
                                    <td>".$rows_pac[1]."</td>
                                    </tr>";
                            echo    "<tr>
                                    <td>Data de validade: </td>
                                    <td>".date('d/m/Y', strtotime($rows_pac[2]))." &nbsp;&nbsp;&nbsp;&nbsp;<b>Nova data:</b> &nbsp;&nbsp;<input type='text' name='nova_data' id='nova_data' value='".date('d/m/Y', strtotime($rows_pac[2]))."' onkeyup='barraData(this);' maxlength='10'>&nbsp; <button type='submit' class='btn btn-primary btn-sm'>Salvar</button></td>
                                    </tr>";
                            echo    "<tr>
                                    <td>Código do SUS: </td>
                                    <td>".$rows_pac[3]."</td>
                                    </tr>";
                            echo    "<tr>
                                    <td>CPF do Paciente: </td>
                                    <td>".$rows_pac[4]."</td>
                                    </tr>";
                            echo    "<tr>
                                    <td>Nome do paciente: </td>
                                    <td>".$rows_pac[5]."</td>
                                    </tr>";
                            echo    "<tr>
                                    <td>Data de Nascimento: </td>
                                    <td>".date('d/m/Y', strtotime($rows_pac[6]))."</td>
                                    </tr>";
                            echo    "<tr>
                                    <td>Nome da Mãe: </td>
                                    <td>".$rows_pac[7]."</td>
                                    </tr>";
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                            echo "</form>";
                           }

                           pg_close ($conexao);
                        } 

                     ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
</html>



