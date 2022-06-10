<?php
    
// Questão 1
function divideGrupos($filename,$posicao){
    $tabelaGrupos=array();
        if (($arquivo = fopen($filename, "r")) !== FALSE) {
            while (($linha = fgetcsv($arquivo, 1000)) !== FALSE) {
               if (isset($linha[$posicao])){
                    $num=$linha[$posicao];
                    $tabelaGrupos[$num][]=$linha;                        
               }
                
            }
            fclose($arquivo);
           
        }
    return $tabelaGrupos;
       
}

//Questão 2
function verificaTimes($tabelaGrupos, $posicaoTime1, $posicaoTime2){ 
   $checagem=false;
   $numJogos=array();

   foreach($tabelaGrupos as $grupo => $valor){ //grupos
       $cont=0;
       foreach($tabelaGrupos[$grupo] as $partida => $valor1){ //jogo
           
           $time=$tabelaGrupos[$grupo][$partida][$posicaoTime1];
           $time1=$tabelaGrupos[$grupo][$partida][$posicaoTime2];
           array_push($numJogos,$time);
           array_push($numJogos,$time1);
       }      

   }
   $contagem=array_count_values($numJogos);
   
   if (count(array_unique($contagem))===1){
       $checagem=true;
       
   }

   return $checagem;
   
}

//Questão 3
function computaMelhoresColocados($tabelaGrupos, $posicaoTime1, $posicaoTime2){
    $tabelaGruposOrdenados=array();
    if (verificaTimes($tabelaGrupos, $posicaoTime1, $posicaoTime2)){
        foreach($tabelaGrupos as $grupo => $valor){
            
            foreach($tabelaGrupos[$grupo] as $partida => $valor1){   

                $tabelaGruposOrdenados[$grupo][$tabelaGrupos[$grupo][$partida][$posicaoTime1]]=0;
                $tabelaGruposOrdenados[$grupo][$tabelaGrupos[$grupo][$partida][$posicaoTime2]]=0;
            } 
            

        }
        foreach($tabelaGrupos as $grupo => $valor){
            
            foreach($tabelaGrupos[$grupo] as $partida => $valor1){   
                $time1=0;
                $time2=0;  
                        
                if($tabelaGrupos[$grupo][$partida][$posicaoTime1+1]>$tabelaGrupos[$grupo][$partida][$posicaoTime2+1]){
                    $time1+=3; 
                }
                if($tabelaGrupos[$grupo][$partida][$posicaoTime1+1]==$tabelaGrupos[$grupo][$partida][$posicaoTime2+1]){
                    $time1++;
                    $time2++;    
                }
                if($tabelaGrupos[$grupo][$partida][$posicaoTime1+1]<$tabelaGrupos[$grupo][$partida][$posicaoTime2+1]){
                    $time2+=3; 
                }
                $tabelaGruposOrdenados[$grupo][$tabelaGrupos[$grupo][$partida][$posicaoTime1]]+=$time1;
                $tabelaGruposOrdenados[$grupo][$tabelaGrupos[$grupo][$partida][$posicaoTime2]]+=$time2;

            } 
            
            arsort($tabelaGruposOrdenados[$grupo]);
        }

    }
    return $tabelaGruposOrdenados;
}



$tabelaGrupos = divideGrupos("equipes.csv", 4);
$resultadoBooleano = verificaTimes ($tabelaGrupos, 0, 2);
$tabelaGruposOrdenados = computaMelhoresColocados($tabelaGrupos, 0, 2);