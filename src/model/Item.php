<?php
/**
 * Table Definition for item
 */
require_once 'DB/DataObject.php';

class Item extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'item';                // table name
    public $iditem;                         // int(4) primary_key not_null
    public $produto_idproduto;              // int(4) not_null
    public $marca_idmarca;                  // int(4)
    public $modelo_idmodelo;                // int(4)
    public $descricao;                      // varchar(200)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
