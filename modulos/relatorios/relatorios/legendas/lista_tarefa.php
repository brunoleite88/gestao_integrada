<?php
global $config, $traducao;

$traducao=array_merge($traducao, array(
'lista_tarefa_titulo'=>'Lista de '.$config['tarefas'],
'lista_tarefa_descricao'=>'Ver Lista de '.$config['tarefas'].' por '.$config['projeto'],
'lista_tarefa_dica'=>'Este relatório mostra a lista de '.$config['tarefas'].', com descrição, d'.$config['genero_projeto'].'s '.$config['projetos'].', em um determinado período, com os '.$config['usuario'].' designados para '.$config['genero_tarefa'].'s mesm'.$config['genero_tarefa'].'s, assim como as datas de início e término.'
));
?>

