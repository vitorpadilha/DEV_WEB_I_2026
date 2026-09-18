<?php
/*function lerArquivo($arquivo){
    $arquivo   = fopen($arquivo, 'r');//abre o arquivo
    $info = [];
      while (!feof($arquivo)) {
        $linha = trim(fgets($arquivo));//le o arquivo
        array_push($info, explode("###", $linha));//cira um array com as informações do arquivo
      }
      fclose($arquivo);
      return $info;
}*/
function lerArquivo($arquivo){
$retorno = [];
$ar = fopen($arquivo, "r");
while (($linha = fgets($ar)) !== false) {
    $linha = trim($linha);
    if ($linha === '') continue;
    $campos = explode("###", $linha);
    array_push($retorno, $campos);
}
return $retorno;
fclose($ar);
}


function salvarArquivo($arquivo, $livros){
    $linha = fopen($arquivo, 'w');
foreach ($livros as $reg) {
    fwrite($linha, implode('###', $reg) . "\n");
}
fclose($arquivo);
}

function proximoId($livros){
    $max = 0;
foreach ($livros as $livro=>$v) {
    if ((int)$v > $max) $max = (int)$v;
}
$novoId = $max + 1;
return $novoId;
}
?>