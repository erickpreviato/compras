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
 *  <p>
 *  Métodos comuns para todo o sistema (UTIL)
 *  </p>
 * 
 *  <p>
 *  <strong>Histórico de versões</strong>
 *  <ul>
 *      <li>Criação da classe 12/2016</li>
 *  </ul>
 *  </p>
 *  
 *  @author Carlos Eduardo Favaro <favaro@icmc.usp.br> <cadufavaro@gmail.com>
 *  @copyright Seção Técnica de Informática - STI/ICMC
 */

//include_once MODEL_DIR . '/Email.php';

function logado() {
    if (!isset($_SESSION['usuario'])) {
        header("Location: " . HOME . "/restrito/");
        //die();
    }
}

function verificaLogin() {
    if (isset($_SESSION['loginUSP'])) {
        header("Location: " . HOME . '?ini=1');
        die();
    }
}

function verificaUsuario($idUsuario = null, $idPessoa = null, $idInscricao = null) {
    $retorno = false;

    if (verificaPermissao('Administrador') || verificaPermissao('Secretaria')) {
        $retorno = true;
    } else {
        if ($idUsuario) {
            if ($_SESSION['usuario'] == $idUsuario) {
                $retorno = true;
            }
        }

        if ($idPessoa) {

            $usuario = new Usuario();
            $usuario->get('pessoa_idPessoa', $idPessoa);

            if ($_SESSION['usuario'] == $usuario->idusuario) {
                $retorno = true;
            }
        }

        if ($idInscricao) {

            $inscricao = new Inscricao();
            $inscricao->get($idInscricao);

            $usuario = new Usuario();
            $usuario->get('pessoa_idPessoa', $inscricao->getpessoa_idpessoa());

            if ($_SESSION['usuario'] == $usuario->getidusuario()) {
                $retorno = true;
            }
        }
    }
    return $retorno;
}

/*
 * <p>
 * Método para criação de string randomica de a - z e de 0 - 9
 * </p>
 * 
 * @param int $length número para o tamanho da string
 * @return string randomica a - z de 0 - 9 no tamanho passado por parâmetro
 */

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/*
 * <p>
 * Método retorno de mensagens do sistema
 * </p>
 * 
 * @param string $tipo tipo da mensagem que quer retornar
 * @return string mensagem formatada com estilo
 */

function show_message() {
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        $t = $_SESSION['t'];

        unset($_SESSION['msg']);
        unset($_SESSION['t']);

        $tipo = '-' . $t; // ($t == 'success') ? ' alert-success' : ' alert-danger';
        $msg = '<section class="content-header"><div class="alert alert' . $tipo . '">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            ' . $msg . ' </div></section>';
    } else {
        $msg = '';
    }
    return $msg;
}

/*
 * <p>
 * Método para formatação de data padrão dd/mm/yyyy para o banco MySQL yyyy-mm-dd hh:ii:ss
 * </p>
 * 
 * @param string $data data com formato dd/mm/yyyy
 * @return string data yyyy-mm-dd hh:ii:ss
 */

function formataData($data) {
    if ($data != '') {
        if (strstr($data, '-')) {
            $data_array = explode("-", $data);
        } else {
            $data_array = explode("/", $data);
        }
        list ($dia, $mes, $ano) = $data_array;
        $retorno = $ano . "-" . $mes . "-" . $dia . " 00:00:00";
        return $retorno;
    }
}

/*
 * <p>
 * Método send() para envio de emails
 * </p>
 * 
 * @param string $nomeDest nome do destinatário
 * @param string $emailDest email válido do destinatário
 * @param string $nomeCC nome destinatário cópia (não obrigatório)
 * @param string $emailCC email destinatário cópia (não obrigatório)
 * @param string $texto texto do corpo do email
 * @param string $titulo assunto do email
 */

function send($nomeDest, $emailDest, $nomeFrom, $emailFrom, $texto, $titulo, $replyTo = null, $emailCC = null, $nomeCC = null) {
    
    $mail = new PHPMailer();
    $mail->IsSMTP(); // Define que a mensagem será SMTP
    //$mail->SMTPDebug = 0;  // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
    $mail->SMTPSecure = 'tls';
    //$mail->Host = "smtp.icmc.usp.br"; // Endereço do servidor SMTP
    $mail->Host = 'smtp.gmail.com'; // Endereço do servidor SMTP
    //$mail->Port = "587";
    $mail->Port = '587';
    //$mail->Username = 'sys_sira@icmc.usp.br'; // Usuário do servidor SMTP
    $mail->Username = 'vagas@icmc.usp.br'; // Usuário do servidor SMTP
    $mail->Password = 'j@v@l13mail'; // Senha do servidor SMTP
    //$mail->isHTML();
    $mail->addReplyTo($replyTo);
    // Define o remetente
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->From = $emailFrom; // Seu e-mail
    $mail->FromName = utf8_decode($nomeFrom); // Seu nome
    // Define os destinatário(s)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $mail->AddAddress($emailDest, utf8_decode($nomeDest));
    $mail->AddCC($emailCC, utf8_decode($nomeCC)); // Copia
    $mail->AddBCC('favaro@icmc.usp.br', 'Administrador'); // Copia oculta
    //
    // Define a mensagem (Texto e Assunto)
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    /* Montando a mensagem a ser enviada no corpo do e-mail. */
    $mensagemHTML = $texto;

    //$mensagemHTML .= '<p>Mensagem enviada automaticamente, por favor não responda diretamente.</p>';

    $assunto = utf8_decode(Configuracao::getTag() . ' ' . $titulo);

    $mail->IsHTML(true);
    $mail->Subject = $assunto; // Assunto da mensagem
    $mail->Body = utf8_decode($mensagemHTML);

    // Envia o e-mail
    if(!$mail->Send()){
        $ret = $mail->ErrorInfo();
    } else {
        $ret = true;
    }


    // Limpa os destinatários e os anexos
    $mail->ClearAllRecipients();
    $mail->ClearAttachments();
    
    return $ret;
}

function arquivo($diretorio, $name, $tipo, $nome) {

    $nome_ext = $nome . '.' . $tipo;

    $erro = 'true';
    // Pasta onde o arquivo vai ser salvo
    $_UP['pasta'] = $diretorio;

    // Tamanho máximo do arquivo (em Bytes)
    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
    // Array com as extensões permitidas
    $_UP['extensoes'] = array($tipo);

    // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
    $_UP['renomeia'] = true;

    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    if ($_FILES[$name]['error'] != 0) {
        $erro = 'Não foi possível fazer o upload do arquivo.';
        //die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['file']['error']]);
        //exit; // Para a execução do script
    }

    // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
    // Faz a verificação da extensão do arquivo
    $extensao = strtolower(end(explode('.', $_FILES[$name]['name'])));
    if (array_search($extensao, $_UP['extensoes']) === false) {
        $erro = "Por favor, envie arquivos com a seguinte extensão: " . $tipo;
    }

// Faz a verificação do tamanho do arquivo
    else if ($_UP['tamanho'] < $_FILES[$name]['size']) {
        $erro = "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    }

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
    else {
//// Primeiro verifica se deve trocar o nome do arquivo
//        if ($_UP['renomeia'] == true) {
//// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .pdf
//
//            $nome_final = time() . '.pdf';
//
//            //--- Aciona a variavel global (nome_arq) e atribui o nome final para salvar
//            global $nome_arq;
//            $nome_arq = $nome_final;
//        } else {
//// Mantém o nome original do arquivo
//            $nome_final = $_FILES['AtivDidaticas']['name'];
//        }
// Depois verifica se é possível mover o arquivo para a pasta escolhida
        if (move_uploaded_file($_FILES[$name]['tmp_name'], $_UP['pasta'] . $nome_ext)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
            //echo "Upload efetuado com sucesso!";
            //echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
            $erro = 'true';
        } else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
            $erro = "Não foi possível enviar o arquivo, tente novamente";
        }
    }

    return $erro;
}

function auditar($acao, $local, $nivel, $mensagem) {
    $auditoria = new Auditoria();

    $auditoria->usuario_idusuario = (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : utf8_decode('Usuário não logado'));
    $auditoria->data = date("Y-m-d H:i:s T");
    $auditoria->ip = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : utf8_decode('IP não identificado'));
    $auditoria->acao = (isset($acao) ? utf8_decode($acao) : utf8_decode('Ação Inesperada'));
    $auditoria->local = (isset($local) ? utf8_decode($local) : 'Geral');
    $auditoria->nivel = (isset($nivel) ? utf8_decode($nivel) : 'ERRO SISTEMA');
    $auditoria->mensagem = (isset($mensagem) ? utf8_decode($mensagem) : utf8_decode('Administrador do sistema analise as funções'));

    if (!$auditoria->insert()) {
        //send('Administrador SIRA', 'favaro@icmc.usp.br', "", "", "Erro ao salvar auditoria sistema SIRA", "Erro salvar log");
    }
}

function verificaPermissao($permissao = null) {
    if ($permissao == null) {
        return true;
    }
    $ret = false;

    if (isset($_SESSION['usuario'])) {
        $pu = new Perfil_usuario();
        $pu->setusuario_idusuario($_SESSION['usuario']);
        $pu->find();
        while ($pu->fetch()) {
            $pe = new Perfil();
            $pe->get($pu->getperfil_idperfil());
            if (utf8_encode($pe->getdescricao()) == $permissao) {
                $ret = true;
                break;
            }
        }
    }
    return $ret;
}

function permissaoNegada() {

    $tpl = new HTML_Template_Sigma(VIEW_DIR);
    $pagina = 'permissaoNegada.html';
    $tpl->loadTemplateFile($pagina);
    $tpl->setVariable('HOME', HOME);

    return $tpl->get();
}

function showContato() {

    $tpl = new HTML_Template_Sigma(VIEW_DIR);
    $pagina = 'contato.tpl.html';
    $tpl->loadTemplateFile($pagina);
    $tpl->setVariable('HOME', HOME);
    $tpl->setVariable('PHP_SELF', $_SERVER['PHP_SELF']);

    $tpl->setVariable('SITE_KEY_RECAPTCHA', SITE_KEY_RECAPTCHA);

    $tpl->setVariable('OPTION_PROGRAMA', Programa::getOptions());

    return $tpl->get();
}

function showEsqueciSenha() {

    $tpl = new HTML_Template_Sigma(VIEW_DIR);
    $pagina = 'esqueciSenha.tpl.html';
    $tpl->loadTemplateFile($pagina);
    $tpl->setVariable('HOME', HOME);
    $tpl->setVariable('PHP_SELF', $_SERVER['PHP_SELF']);

    $tpl->setVariable('SITE_KEY_RECAPTCHA', SITE_KEY_RECAPTCHA);

    return $tpl->get();
}

function usuarioNaoAutorizado() {

    $tpl = new HTML_Template_Sigma(VIEW_DIR);
    $pagina = 'usuarioNaoAutorizado.html';
    $tpl->loadTemplateFile($pagina);
    $tpl->setVariable('HOME', HOME);

    return $tpl->get();
}

function showAdministrador() {

    $tpl = new HTML_Template_Sigma(VIEW_DIR . '/administrador');
    $pagina = 'boxadministrador.html';
    $tpl->loadTemplateFile($pagina);

    $tpl->setVariable('URL', URL);
    $tpl->setVariable('PHP_SELF', $_SERVER['PHP_SELF']);

    return $tpl->get();
}

function showExport($nros_usp) {

    $tpl = new HTML_Template_Sigma(VIEW_DIR);
    $pagina = 'export.html';
    $tpl->loadTemplateFile($pagina);

    $tpl->setVariable('nros_usp', $nros_usp);
    $tpl->setVariable('selectAvaliacao', Avaliacao::getSelectAvaliacao());

    $tpl->setVariable('URL', URL);
    $tpl->setVariable('PHP_SELF', $_SERVER['PHP_SELF']);

    return $tpl->get();
}

function getStatus($status) {

    switch ($status) {

        case 'A':
            return '<span class="label label-success">Ativo</span>';
            break;
        case 'I':
            return '<span class="label label-info">Inativo</span>';
            break;
        case 'P':
            return '<span class="label label-warning">Pendente</span>';
            break;
        case 'C':
            return '<span class="label label-warning">Conflito</span>';
            break;
        case 'R':
            return '<span class="label label-danger"> Rejeitado</span>';
            break;
    }
}

function showMail($ID = null) {

    $tpl = new HTML_Template_Sigma(VIEW_DIR);
    $pagina = 'email.html';
    $tpl->loadTemplateFile($pagina);
    $tpl->setVariable('HOME', HOME);

    $tpl->setVariable('ID', $ID);

    $tpl->setVariable('URL', URL);
    $tpl->setVariable('HOME', HOME);
    $tpl->setVariable('PHP_SELF', $_SERVER['PHP_SELF']);

    return $tpl->get();
}

function producao() {
    if (strstr($_SERVER['SERVER_NAME'], 'vagas')) {
        return true;
    } else {
        return false;
    }
}

function removeAcentos($str) {

// assume $str esteja em UTF-8
    $map = array(
        'á' => 'a',
        'à' => 'a',
        'ã' => 'a',
        'â' => 'a',
        'é' => 'e',
        'ê' => 'e',
        'í' => 'i',
        'ó' => 'o',
        'ô' => 'o',
        'õ' => 'o',
        'ú' => 'u',
        'ü' => 'u',
        'ç' => 'c',
        'Á' => 'A',
        'À' => 'A',
        'Ã' => 'A',
        'Â' => 'A',
        'É' => 'E',
        'Ê' => 'E',
        'Í' => 'I',
        'Ó' => 'O',
        'Ô' => 'O',
        'Õ' => 'O',
        'Ú' => 'U',
        'Ü' => 'U',
        'Ç' => 'C'
    );

    return strtr($str, $map); // funciona corretamente
}
