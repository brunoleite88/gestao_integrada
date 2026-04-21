<?php 
/* Copyright [2008] -  S�rgio Fernandes Reinert de Lima
Este arquivo � parte do programa gpweb
O gpweb � um software livre; voc� pode redistribu�-lo e/ou modific�-lo dentro dos termos da Licen�a P�blica Geral GNU como publicada pela Funda��o do Software Livre (FSF); na vers�o 2 da Licen�a.
Este programa � distribu�do na esperan�a que possa ser  �til, mas SEM NENHUMA GARANTIA; sem uma garantia impl�cita de ADEQUA��O a qualquer  MERCADO ou APLICA��O EM PARTICULAR. Veja a Licen�a P�blica Geral GNU/GPL em portugu�s para maiores detalhes.
Voc� deve ter recebido uma c�pia da Licen�a P�blica Geral GNU, sob o t�tulo "licen�a GPL 2.odt", junto com este programa, se n�o, acesse o Portal do Software P�blico Brasileiro no endere�o www.softwarepublico.gov.br ou escreva para a Funda��o do Software Livre(FSF) Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301, USA 
*/

/********************************************************************************************
		
gpweb\incluir\sessao.php		

Fun��es utilizadas para a cria��o da sess�o no sistema
																																												
********************************************************************************************/ 
if (!defined('BASE_DIR')) die('Voc� n�o deveria acessar este arquivo diretamente.');

require_once BASE_DIR.'/incluir/funcoes_principais.php';
require_once BASE_DIR.'/incluir/db_adodb.php';
require_once BASE_DIR.'/classes/BDConsulta.class.php';
require_once BASE_DIR.'/classes/ui.class.php';
require_once BASE_DIR.'/classes/evento_recorrencia.class.php';

function sessaoAbrir($save_path, $session_name) {
	return true;
	}

function sessaoFechar() {
	return true;
	}


function sessaoLer($id) {
	$q = new BDConsulta;
	$q->adTabela('sessoes');
	$q->adCampo('sessao_data');
	$q->adCampo('tempo_unix(null) - tempo_unix(sessao_criada) AS sessao_tempovida');
	$q->adCampo('tempo_unix(null) - tempo_unix(sessao_atualizada) AS sessao_ocioso');
	$q->adOnde('sessao_id = \''.$id.'\'');
	$qid=$q->Linha();
	$q->limpar();
	
	if (!$qid || !$qid['sessao_data']) {
		dprint(__file__, __line__, 11, 'Falhou ao tentar reaver sess�o '.$id);
		$data = '';
		} 
	else {
		/*
		$max = sessaoConverterTempo('max_lifetime');
		$ocioso = sessaoConverterTempo('idle_time');
		if ($max < $qid['sessao_tempovida'] || $ocioso < $qid['sessao_ocioso']) {
			dprint(__file__, __line__, 11, 'A sess�o '.$id.' expirou');
			sessaoDestruir($id);
			$data = '';
			} 
		$max = sessaoConverterTempo('max_lifetime');
		$ocioso = sessaoConverterTempo('idle_time');
		*/
		
		if (86400 < $qid['sessao_tempovida'] || 86400 < $qid['sessao_ocioso']) {
			//dprint(__file__, __line__, 11, 'A sess�o '.$id.' expirou');
			//sessaoDestruir($id);
			$data = '';
			} 	
		else $data = $qid['sessao_data'];
		}
	$q->limpar();
	return $data;
	}
	
	
function sessaoEscrever($id, $data) {
	global $Aplic;
	$q = new BDConsulta;
	$q->setExcluir('sessoes');
	$q->adOnde('sessao_id = \''.$id.'\'');
	$q->exec();
	$q->limpar();
	
	$q->adTabela('sessoes');
	$q->adInserir('sessao_id', $id);
	$q->adInserir('sessao_usuario', $Aplic->usuario_id);
	$q->adInserir('sessao_data', $data);
	$q->adInserir('sessao_criada', date('Y-m-d H:i:s'));
	$q->exec();
	$q->limpar();
	
	/*
	$q = new BDConsulta;
	$q->adTabela('sessoes');
	$q->adCampo('count(sessao_id)');
	$q->adOnde('sessao_id = \''.$id.'\'');
	$achou=$q->resultado();
	$q->limpar();
	
	$q->adTabela('sessoes');
	if ((int)$achou > 0) {
		$q->adAtualizar('sessao_data', $data);
		if (isset($Aplic)) $q->adAtualizar('sessao_usuario', (int)$Aplic->usuario_id);
		$q->adOnde('sessao_id = \''.$id.'\'');
		} 
	else {
		$q->adInserir('sessao_id', $id);
		$q->adInserir('sessao_data', $data);
		$q->adInserir('sessao_criada', date('Y-m-d H:i:s'));
		}
	$q->exec();
	$q->limpar();
	return true;
	*/
	}

function sessaoDestruir($id) {
	global $Aplic;
	$q = new BDConsulta;
	
	$q->adTabela('sessoes');
	$q->adCampo('sessao_usuario');
	$q->adOnde('sessao_id = \''.$id.'\'');
	$sessao_usuario=$q->resultado();
	$q->limpar();
		
	$q->adTabela('usuario_reg_acesso');
	$q->adAtualizar('saiu', date('Y-m-d H:i:s'));
	$q->adOnde('usuario_id = '.(int)$sessao_usuario);
	$q->adOnde('saiu IS NULL');
	$q->exec();
	$q->limpar();

	$q->setExcluir('sessoes');
	$q->adOnde('sessao_id = \''.$id.'\'');
	$q->exec();
	$q->limpar();
	
	return true;
	}


function sessaoGC($tempMaxVida) {
	global $Aplic;
	
	return true;
	}



function sessaoConverterTempo($chave) {
	$chave = 'session_'.$chave;
	if (config($chave) == null || config($chave) == null) return 86400;
	$numpart = (int)config($chave);
	$modificador = substr(config($chave), -1);
	if (!is_numeric($modificador)) {
		switch ($modificador) {
			case 'h':
				$numpart *= 3600;
				break;
			case 'd':
				$numpart *= 86400;
				break;
			case 'm':
				$numpart *= (86400 * 30);
				break;
			case 'y':
				$numpart *= (86400 * 365);
				break;
			}
		}
	return $numpart;
	}

function sessaoIniciar($variaveis_inicio = 'Aplic') {
	//session_name(config('nomeBd'));
	session_name('gpweb');
	if (ini_get('session.auto_start') > 0) session_write_close();
	if (config('administrando_sessao') == 'app') {
		//ini_set('session.save_handler', 'user');
		if (version_compare(phpversion(), '5.0.0', '>=')) register_shutdown_function('session_write_close');
		session_set_save_handler('sessaoAbrir', 'sessaoFechar', 'sessaoLer', 'sessaoEscrever', 'sessaoDestruir', 'sessaoGC');
		} 
	
	$diretoriogpweb = '/';
	
	$pathInfo = safe_get_env('PATH_INFO');
    if ($pathInfo) $path .= str_replace('\\', '/', dirname($pathInfo));
	else $path = str_replace('\\', '/', dirname(safe_get_env('SCRIPT_NAME')));
	$path = preg_replace('#/$#D', '', $path);
	if(substr($path,0,1) != '/') $path = '/'.$path;
	$path = explode('/', $path);
	$ct = count($path);
	if($ct>0 && file_exists(BASE_DIR.'/modulos/projetos/tarefa_cache.class_pro.php')){
		if(strtolower($path[--$ct]) == 'server') array_pop($path);
		}
	$diretoriogpweb = implode('/',$path);
	if(substr($diretoriogpweb, -1) != '/') $diretoriogpweb .= '/';

	//session_set_cookie_params($tempo_max, $diretoriogpweb);
	session_set_cookie_params(0, $diretoriogpweb);
	session_start();
	}
?>

