<?php
/*
Copyright © 2017 Seção Técnica de Informática - STI / ICMC <sti@icmc.usp.br>

Este arquivo é parte do programa "Vagas"

Vagas é um software livre; você pode redistribuí-lo e/ou 
modificá-lo dentro dos termos da Licença Pública Geral GNU como 
publicada pela Fundação do Software Livre (FSF); na versão 3 da 
Licença, ou (a seu critério) qualquer versão posterior.

Este programa é distribuído na esperança de que possa ser  útil, 
mas SEM NENHUMA GARANTIA; sem uma garantia implícita de ADEQUAÇÃO
a qualquer MERCADO ou APLICAÇÃO EM PARTICULAR. Veja a
Licença Pública Geral GNU para maiores detalhes.

Você deve ter recebido uma cópia da Licença Pública Geral GNU junto
com este programa, Se não, veja <http://www.gnu.org/licenses/>.
*/
?>
<?php
/**
 * <p> 
 * Pagina de listar cidades
 * </p> 
 *  
 * <p> 
 * <strong>Histórico de Versões</strong>
 * <ul> 
 *   <li>#2017 - Criação do arquivo</li>
 * </ul> 
 * </p> 
 *  
 * @author Carlos Eduardo Favaro <favaro@icmc.usp.br>
 * @copyright Seção Técnica de Informática - STI/ICMC
 */
include_once '../../conf/config.default.php';
//logado();
//include_once MODEL_DIR . '/Pais.php';
//include_once MODEL_DIR . '/Estado.php';
//
//include_once CONTROLLER_DIR . '/pais.php';

include_once INCLUDE_DIR . '/header.php';

if (verificaPermissao('Administrador') || verificaPermissao('Secretaria')) {
    
    $pais = new Pais();
    $pais->find();
    echo $pais->showList();
    
} else {
    echo permissaoNegada();
}

include_once INCLUDE_DIR . '/footer.php';