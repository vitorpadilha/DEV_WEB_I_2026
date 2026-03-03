<?php

$entrada = floatval(fgets(STDIN));

$notas = array(100, 50, 20, 10, 5, 2);
$moedas = array(1, 0.50, 0.25, 0.10, 0.05, 0.01);
echo "NOTAS:\n";
for($i=0; $i < count($notas); $i++){
    $quantidade = floor($entrada / $notas[$i]);
    echo $quantidade." nota(s) de R$ " . number_format($notas[$i], 2, '.', '') . "\n";
    $entrada -= $quantidade * $notas[$i];
}
echo "MOEDAS:\n";
for($i=0; $i < count($moedas); $i++){
    $quantidade = floor($entrada / $moedas[$i]);
    echo $quantidade." moeda(s) de R$ " . number_format($moedas[$i], 2, '.', '') . "\n";
    $entrada -= $quantidade * $moedas[$i];
}
?>