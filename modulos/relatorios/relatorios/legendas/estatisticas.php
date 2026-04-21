<?php
global $config, $traducao;

$traducao=array_merge($traducao, array(
'estatisticas_titulo'=>'Estatísticas d'.$config['genero_projeto'].'s '.$config['projetos'],
'estatisticas_descricao'=>'Estatística d'.$config['genero_projeto'].'s '.$config['projetos'].', com resumo geral',
'estatisticas_dica'=>'Este relatório mostra de forma condensada o número de '.$config['tarefas'].' completad'.$config['genero_tarefa'].'s, em execução, pendentes, em tempo e atrasad'.$config['genero_tarefa'].'s.'
));
?>

