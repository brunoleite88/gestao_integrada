<?php

if (!$Aplic->checarModulo('sistema', 'acesso')) $Aplic->redirecionar('m=publico&a=acesso_negado');

$botoesTitulo = new CBlocoTitulo('Configuração', '../../../modulos/Patrocinadores/imagens/patrocinador.gif', $m, $m.'.'.$a);
$botoesTitulo->adicionaBotao('m=sistema&a=vermods', 'voltar','','Voltar','Voltar à tela de administração de módulos.');
$botoesTitulo->mostrar();
echo 'Este módulo não tem necessidade de configuração adicional';

?>

