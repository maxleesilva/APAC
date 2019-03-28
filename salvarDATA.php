<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

    <script src="js/sweetalert.min.js"></script>
    <script src="js/jquery.min.js"></script>
</head>
<body>
<?php 
include "menu.php";
include "funcao.php";

$nova_data = dataFormParaBanco($_POST["nova_data"]);
$solicitacao = $_REQUEST['id_solicitacao'];
$num_apac = $_REQUEST['num_apac'];


$con_string = "host=10.85.3.111 port=5432 dbname=prd user=ssi password=ssi@10";
$conexao = pg_connect($con_string);

if(!@($conexao)){
    print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
    $salvar = "UPDATE far.solicitacaoprocedimentoapac set data_validade ='$nova_data' where id_solicitacaoprocedimentoapac= '$solicitacao'";
    $result_save = pg_query($conexao, $salvar);

    if ($result_save==true){
        ?>
        <script>
	        swal({title: 'Muito Bem..!', type: 'success', text: 'Salvou a nova data com sucesso!', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
	            window.location.href='pesquisarAPAC.php?pesquisar='+<?php echo $num_apac; ?>;
	        });
	
	        event.preventDefault();
        </script> 
        <?php
    }else{
        ?>
        <script>
	        swal({title: 'Ops..!', type: 'error', text: 'Não foi possível salvar, tente novamente.', confirmButtonText: 'OK', closeOnConfirm: false}, function () {
	            window.location.href='pesquisarAPAC.php?pesquisar='+<?php echo $num_apac; ?>;
	        });
	
	        event.preventDefault();
        </script> 
        <?php
    }
    pg_close ($conexao);
}
?>
</body>
</html>