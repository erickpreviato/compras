<?php
/**
 * Table Definition for solicitacao
 */
require_once 'DB/DataObject.php';

class Solicitacao extends DB_DataObject 
{
    ###START_AUTOCODE
    /* the code below is auto generated do not remove the above tag */

    public $__table = 'solicitacao';         // table name
    public $idsolicitacao;                  // int(4) primary_key not_null
    public $usuario_idusuario_solicitante;   // int(4) not_null
    public $categoria_idcategoria;          // int(4) not_null
    public $data_criacao;                   // datetime
    public $data_finalizacao;               // datetime
    public $motivo;                         // varchar(45)
    public $observao;                       // text

    /* the code above is auto generated do not remove the tag below */
    ###END_AUTOCODE
}
