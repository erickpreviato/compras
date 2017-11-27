<?php
/**
 * Table Definition for modelo
 */
require_once 'DB/DataObject.php';

class Modelo extends DB_DataObject 
{
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
	
        while ($this->fetch()) { 
            $tpl->setvariable('CODIGO', 'xxx');
            
            $tpl->parse('table_row');
        }
    
        if ($this->count() == 0) {
            $tpl->setVariable("None", "Nenhum formulário cadastrado no momento.");
            $tpl->hideBlock("row_none2");
            $tpl->touchBlock("row_none");
        } else {
            $tpl->setVariable('Classe', 'listagem' . $n);
            $tpl->touchBlock("row_none2");
        }


        $tpl->setVariable('URL', URL);
        $tpl->setVariable('PHP_SELF', $_SERVER['PHP_SELF']);


        return $tpl->get();
    }
}
