<?php

$host="localhost";
$usuario="root";
$senha="";
$database="ap2";

$pontuaçãototal=array();

$conexao= mysqli_connect($host,$usuario,$senha,$database);
$times= "SELECT * FROM times";
$resultado=mysqli_query($conexao,$times) or die("ERRO AO REALIZAR CONSULTA");

while($registro=mysqli_fetch_array($resultado)){
    $sql = "SELECT empates, vitorias FROM times";
    $pontos=0;
    $pontos+=$registro['empates'];
    $pontos+=$registro['vitorias']*3;
    
    $pontuacaototal[$registro['nome']]=$pontos;      
}

$maior=max($pontuacaototal);
$time=array_search($maior,$pontuacaototal);
$new= array_keys(array_filter($pontuacaototal, function($a) use($maior){ return $a == $maior;}));
echo '<pre>';print_r("O(s) time(s) com maior pontuação: ");echo '</pre>';
echo '<pre>';print_r($new);echo '</pre>';
