<?php
/*
se A ≥ B+C, apresente a mensagem: NAO FORMA TRIANGULO
se A2 = B2 + C2, apresente a mensagem: TRIANGULO RETANGULO
se A2 > B2 + C2, apresente a mensagem: TRIANGULO OBTUSANGULO
se A2 < B2 + C2, apresente a mensagem: TRIANGULO ACUTANGULO
se os três lados forem iguais, apresente a mensagem: TRIANGULO EQUILATERO
se apenas dois dos lados forem iguais, apresente a mensagem: TRIANGULO ISOSCELES
 */
  $entrada = explode(" ", fgets(STDIN));
  $a = floatval($entrada[0]);
  $b = floatval($entrada[1]);
  $c = floatval($entrada[2]);
  $lados = array($a, $b, $c);
  sort($lados);
  $a = $lados[2];
  $b = $lados[1];
  $c = $lados[0];
  if($a >= $b + $c){
    echo "NAO FORMA TRIANGULO\n";
  } else {
    if(pow($a, 2) == pow($b, 2) + pow($c, 2)){
        echo "TRIANGULO RETANGULO\n";
    } 
    if(pow($a, 2) > pow($b, 2) + pow($c, 2)){
        echo "TRIANGULO OBTUSANGULO\n";
    } 
    if(pow($a, 2) < pow($b, 2) + pow($c, 2)){
        echo "TRIANGULO ACUTANGULO\n";
    }
    if($a == $b && $b == $c){
        echo "TRIANGULO EQUILATERO\n";
    } 
    if(($a == $b && $b != $c) || ($a == $c && $a != $b) || ($b == $c && $b != $a)){
        echo "TRIANGULO ISOSCELES\n";
    }
  }

?>