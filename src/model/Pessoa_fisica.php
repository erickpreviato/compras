<?php
/**
 * Table Definition for pessoa_fisica
 */
require_once 'DB/DataObject.php';

class Pessoa_fisica extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'pessoa_fisica';       // table name
    public $idpessoa_fisica;                // int(4) primary_key not_null
    public $nome;                           // varchar(200)
    public $nome_social;                    // varchar(200)
    public $cpf;                            // varchar(11)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
