<?php
global $config, $traducao;

$traducao=array_merge($traducao, array(
'tarefas_por_usuario_titulo'=>'Atribuição por '.$config['usuario'],
'tarefas_por_usuario_descricao'=>'Este relatório mostra '.$config['genero_tarefa'].'s '.$config['tarefas'].' atribuídas a cada '.$config['usuario'],
'tarefas_por_usuario_dica'=>'Este relatório mostra '.$config['genero_tarefa'].'s '.$config['tarefas'].' atribuídas a cada '.$config['usuario']
));
?>

