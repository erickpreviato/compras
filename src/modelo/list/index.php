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

include_once CONTROLLER_DIR . '/modelo.php';

include_once INCLUDE_DIR . '/header.php';

$modelo = new Modelo();
echo $modelo->showList();

include_once INCLUDE_DIR . '/footer.php';
?>



