<?php 

//formata a data para o banco de dados
function dataFormParaBanco($data){
    $aux = explode('/',$data);
    return  $aux[2]."-".$aux[1]."-".$aux[0];
}
//formata a data para retornar para o formulário
function dataBancoParaForm($data){
    $aux = explode("-",$data);
    return $aux[2]."/".$aux[1]."/".$aux[0];
} //
?>
<script>
    function makeDate(id){
    obj = document.getElementById(id);
    vl = obj.value;
    l = vl.toString().length;
    switch(l){
    case 2:
    obj.value = vl + "/";
    break;
    case 5:
    obj.value = vl + "/";
    break;
    }
    }
</script>