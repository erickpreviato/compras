<?php
/**
 * Table Definition for usuario
 */
require_once 'DB/DataObject.php';

class Usuario extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'usuario';             // table name
    public $idusuario;                      // int(4) primary_key not_null
    public $login;                          // varchar(100)
    public $senha;                          // varchar(45)
    public $pessoa_juridica_idpessoa_juridica;   // int(4) not_null
    public $pessoa_fisica_idpessoa_fisica;   // int(4) not_null

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
