<?php

/**
 * Table Definition for modelo
 */
require_once 'DB/DataObject.php';

class Modelo extends DB_DataObject {
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'modelo';              // table name
    public $idmodelo;                       // int(4) primary_key not_null
    public $modelo;                         // varchar(200)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE

    function showList($n = 0) {

        $tpl = new HTML_Template_Sigma(VIEW_DIR . '/modelo');
        $pagina = 'list.tpl.html';
        $tpl->loadTemplateFile($pagina);

        $tpl->setVariable('URL', URL);
        $tpl->setVariable('PHP_SELF', $_SERVER['PHP_SELF']);

        return $tpl->get();
    }

    public function get_list($cont = 0, $qtdLinhas = 10, $inicio = 0, $pesquisa = '', $colunaOrdena = 0, $direcaoOrdenacao = 'asc') {

        //Atribuições iniciais
        $total = null;
        $registros = 0;
        $ret = array('draw' => intval($cont), 'data' => null, 'recordsTotal' => 1, 'recordsFiltered' => 1);
        $i = 0;

        //preparando where da busca
        if ($pesquisa != '') {
            $this->whereAdd("modelo like '%$pesquisa%'");
        }

        //contando no total
        $total = $total + $this->count();

        //ordenação
        $nomesColunas = array('idmodelo', 'modelo');
        if ($colunaOrdena >= 0 && $colunaOrdena < count($nomesColunas)) {
            $this->orderBy($nomesColunas[$colunaOrdena] . ' ' . $direcaoOrdenacao);
        }

        $this->limit($inicio, $qtdLinhas);

        $this->find();

        while ($this->fetch()) {

            unset($c);

            $c[] = $this->getidmodelo();
            $c[] = $this->getmodelo();
            $c[] = '';

            $ret['data'][] = $c;
        }

        if ($total) {
            $ret['recordsTotal'] = $total;
            $ret['recordsFiltered'] = $total;
            $registros = 0;
            return json_encode($ret);
        } else {
            $c[] = '';
            $c[] = 'Nenhum registro encontrado';
            $c[] = '';

            $ret['data'][] = $c;

            $ret['recordsTotal'] = 1;
            $ret['recordsFiltered'] = 1;
            $registros = 0;
            return json_encode($ret);
        }
    }

}
