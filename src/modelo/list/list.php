<?php
/*
  Copyright © 2017 E2 Sistemas - E2 / Compras <compras@e2.usp.br>

  Este arquivo é parte do programa "Compras"

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
 * @author Carlos Eduardo Favaro <cadufavaro@gmail.usp.br>
 * @copyright E2 Sistemas - E2/Compras
 */
include_once '../../conf/config.default.php';
logado();

include_once MODEL_DIR . '/Modelo.php';

//include_once CONTROLLER_DIR . '/modelo.php';

$modelo = new Modelo();

$contador = 1;
$qtdLinhas = 10;
$inicio = 0;
$pesquisa = '';
$colunaOrdena = 0;
$direcaoOrdenacao = 'asc';

//validações
if (isset($_GET['length']) && $_GET['length'] > 0) {
    $qtdLinhas = intval($_GET['length']);
}

if (isset($_GET['draw']) && $_GET['draw'] > 0) {
    $contador = intval($_GET['draw']);
}

if (isset($_GET['start']) && $_GET['start'] > 0) {
    $inicio = intval($_GET['start']);
}

if (isset($_GET['search']) && isset($_GET['search']['value']) && $_GET['search']['value'] != '') {
    $pesquisa = $_GET['search']['value'];
}

if (isset($_GET['order']) && isset($_GET['order'][0]['column']) && $_GET['order'][0]['column'] >= 0) {
    $colunaOrdena = intval($_GET['order'][0]['column']);
}

if (isset($_GET['order']) && isset($_GET['order'][0]['dir']) && ($_GET['order'][0]['dir'] == 'asc' || $_GET['order'][0]['dir'] == 'desc')) {
    $direcaoOrdenacao = $_GET['order'][0]['dir'];
}

echo $modelo->get_list($contador, $qtdLinhas, $inicio, $pesquisa, $colunaOrdena, $direcaoOrdenacao);




