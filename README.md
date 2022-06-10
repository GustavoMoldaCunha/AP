# Trabalho final de Programação de Aplicações WEB
Programa em PHP de leitura de arquivo CSV e manipulação de dados com Banco de Dados

Q1:
Função em PHP capaz de ler o arquivo CSV dado e organizar as partidas em uma estrutura de array associativo 

Q2:
função em PHP que verifique se todos os times jogaram o mesmo número de partidas na fase de classificação do campeonato. 
Essa função recebe como argumento a estrutura calculada na Questão Q1 e os índices das colunas referentes aos nomes dos times como argumentos. 
A função retorna verdadeiro caso o número de partidas seja igual para todos os times e falso, caso contrário. 

Q3:
função que retorna um array associativo que usa o nome do grupo como chave e o valor é um array associativo dos times ordenados conforme a pontuação 
obtida. Recebe como argumentos a estrutura da Questão Q1 e os índices das colunas referentes aos nomes dos times. 
Utiliza a função computaMelhoresColocados para verificar se os times possuem o mesmo número de partidas (Questão Q2)

Q4: Consulta em um Banco de Dados que retorna o nome do time e o número de pontos correspondente do melhor time na fase de classificação do campeonato 
(considerando todos os grupos).
