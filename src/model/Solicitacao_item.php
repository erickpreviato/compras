<?php
/**
 * Table Definition for solicitacao_item
 */
require_once 'DB/DataObject.php';

class Solicitacao_item extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'solicitacao_item';    // table name
    public $idsolicitacao_item;             // int(4) primary_key not_null
    public $ordem;                          // int(4)
    public $solicitacao_idsolicitacao;      // int(4) not_null
    public $item_iditem;                    // int(4) not_null
    public $quantidade;                     // int(4)
    public $unidade;                        // varchar(100)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
