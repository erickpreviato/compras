<?php
/**
 * Table Definition for pessoa_juridica
 */
require_once 'DB/DataObject.php';

class Pessoa_juridica extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'pessoa_juridica';     // table name
    public $idpessoa_juridica;              // int(4) primary_key not_null
    public $nome_fantasia;                  // varchar(255)
    public $razao_social;                   // varchar(255)
    public $cnpj;                           // varchar(14)
    public $inscricao_estadual;             // varchar(9)

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
