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
<!--
 -  Rodapé das páginas
 -  Histórico de versões
 -  12/2016
 -  @author Carlos Eduardo Favaro <favaro@icmc.usp.br> <cadufavaro@gmail.com>
 -  @copyright Seção Técnica de Informática - STI/ICMC
-->

</div><!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        Pirulito Systems
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="http://www.icmc.usp.br" target="_blank">ICMC</a>.</strong> Todos os direitos reservados.
</footer>


<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- Jquery UI  -->
<script src="<?php echo JS_URL; ?>/jquery-ui.js"></script>

<!-- Bootstrap 3.3.5 -->
<script src="<?php echo JS_URL; ?>/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo JS_URL; ?>/app.min.js"></script>



<script src="<?php echo JS_URL; ?>/jquery.dataTables.min.js"></script>
<script src="<?php echo JS_URL; ?>/dataTables.bootstrap.min.js"></script>
<script src="<?php echo JS_URL;?>/bootstrap-datepicker.js"></script>
<script src="<?php echo JS_URL;?>/bootstrap-datepicker.pt-BR.min.js"></script>
<script src="<?php echo JS_URL;?>/jquery.maskedinput.js"></script>
<script src="<?php echo JS_URL;?>/jquery.form.js"></script>
<script src="<?php echo JS_URL;?>/select2.js"></script>
<script src="<?php echo JS_URL;?>/jquery.printelement.min.js"></script>
<script src="<?php echo JS_URL;?>/table2download.js"></script>

    <!--<script src="<?echo JS_URL ?>/date-br.js"></script>-->

<script>
    $(document).ready(function () {
        $("#show-modal-sistemas-icmc").on("click", function () {
            //$(".modal-sistemas-icmc").modal("show");
        });
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
