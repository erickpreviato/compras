<?php
/*
Copyright © 2017 Seção Técnica de Informática - STI / ICMC <sti@icmc.usp.br>

Este arquivo é parte do programa "Vagas"

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

/*
 *  Cabeçalho do sistema
 *  Histórico de versões
 *      12/2016
 *  @author Carlos Eduardo Favaro <favaro@icmc.usp.br> <cadufavaro@gmail.br>
 *  @copyright Seção Técnica de Informática - STI/ICMC 
 */
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" href="<?php echo IMAGE_URL ?>/favicon.ico">

        <title>Vagas ICMC</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/AdminLTE.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/datepicker.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/skins/skin-blue.min.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/select2.css">
        <link rel="stylesheet" href="<?php echo CSS_URL; ?>/vagas.css">

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo JS_URL; ?>/jquery.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">


        <div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="addModalLabel">T&iacute;tulo</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="salvar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" id="addModalMsg" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="addModalLabel">T&iacute;tulo</h4>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="<?php echo HOME; ?>" class="logo">
                    <!-- mini logo do menu lateral -->
                    <span class="logo-mini"><img src="<?php echo IMAGE_URL; ?>/logo-mini.png" width="45" /></span>
                    <!-- logo tamanho padrão -->
                    <span class="logo-lg"><img src="<?php echo IMAGE_URL; ?>/logo.png" /></span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <div class="nav navbar-nav" style="padding-top: 14px; color: #FFF;">
                            <!-- espaço para checagem de variaveis -->
                        </div>
                        <ul class="nav navbar-nav">
                            <!-- Tasks Menu 
                            <li class="dropdown tasks-menu">
                            <!-- Menu Toggle Button 
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Você tem 0 relat&oacute;rio</li>
                                <li>
                            <!-- Inner menu: contains the tasks 
                            <ul class="menu">
                                <li><!-- Task item 
                                    <a href="#">
                            <!-- Task title and progress text 
                            <h3>
                                Um pedido de relatório pendente
                                <small class="pull-right">20%</small>
                            </h3>
                            <!-- The progress bar 
                            <div class="progress xs">
                            <!-- Change the css width attribute to simulate progress 
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Completo</span>
                            </div>
                        </div>
                    </a>
                </li>
                            <!-- end task item 
                        </ul>
                    </li>
                    <li class="footer">
                        <a href="#">Ver todas as tarefas</a>
                    </li>
                </ul>
            </li> -->
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <span class="image">
                                        <img src="<?php echo (isset($_SESSION['usuario']) ? Usuario::getImage($_SESSION['usuario']) : ''); ?>" class="user-image" alt="<?php echo (isset($_SESSION['usuario']) ? Usuario::getImage($_SESSION['usuario']) : ''); ?>">
                                    </span>
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs" style="padding-left:35px;"><?php echo (isset($_SESSION['usuario']) ? Usuario::getNome($_SESSION['usuario']) : ''); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <span class="image">
                                            <img src="<?php echo (isset($_SESSION['usuario']) ? Usuario::getImage($_SESSION['usuario']) : ''); ?>" alt="<?php echo (isset($_SESSION['usuario']) ? Usuario::getNome($_SESSION['usuario']) : ''); ?>">
                                        </span>
                                        <p>
                                            <?php echo (isset($_SESSION['usuario']) ? Usuario::getNome($_SESSION['usuario']) : ''); ?><br />
                                            <!--<small>&Uacute;ltimo acesso. <?php //echo Usuario::getUltimoAcesso($_SESSION['usuario']);  ?></small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <!--<a href="http://www.icmc.usp.br/pessoas?id=<?php //echo $_SESSION['loginICMC']['login']*2+3; ?>" target="_blank" class="btn btn-default btn-flat">Perfil</a>-->
                                            <a href="<?php echo HOME; ?>/usuario/edit" class="btn btn-default btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo HOME; ?>/restrito/senhaunica.php?logout=true" class="btn btn-primary btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li data-toggle="tooltip" data-placement="left" title="Sistemas ICMC">
                                <a href="http://sistemas.icmc.usp.br/" target="_blank" id="show-modal-sistemas-icmc"><i class="fa fa-th-large"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>