<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(!function_exists('verificarAproveitamento')){
    function verificarAproveitamento(int $id_aluno, int $id_turma, int $id_materia)
    {

        $total_aulas = \DiariosModel::find_by_sql("select count(id) as total from diario_classe where id_turma = '{$id_turma}' and id_materia like '{$id_materia}' ");
        $chamadas = \VRegistrosDiarioModel::find_by_sql("select id, presente_chamada1 as p1, presente_chamada2 as p2 from v_registros_diario where id_turma = '{$id_turma}' and id_materia = '{$id_materia}' and id_aluno = '{$id_aluno}' ");

        $total_presencas = 0;

        if(!empty($chamadas)):
            foreach ($chamadas as $chamada):
                $chamada->p1 == 's' ? $total_presencas += 0.5 : '';
                $chamada->p2 == 's' ? $total_presencas += 0.5 : '';
            endforeach;
        endif;


        if(!empty($total_aulas) && !empty($total_presencas)):
            $aproveitamento = (($total_presencas/$total_aulas[0]->total)*100);
        else:
            $aproveitamento = 0;
        endif;



        if($aproveitamento < 80):
            notificacaoAproveitamento($id_aluno, $id_materia, $aproveitamento);
        endif;

    }
}

if(!function_exists('notificacaoAproveitamento')){
    function notificacaoAproveitamento(int $id_aluno, int $id_materia, $aproveitamento)
    {

        $host = 'email-ssl.com.br';
        $smtp_auth = true;
        $username = 'noreply@atalhus.com.br';
        $password = 'Mudar@123';

        $aluno = AlunosModel::find_by_id($id_aluno);

        $mail = new PHPMailer();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = $smtp_auth;                                   //Enable SMTP authentication
        $mail->Username   = $username;                     //SMTP username
        $mail->Password   = $password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($username, '=?UTF-8?B?' . base64_encode('Jones School') . '?=');
        $mail->addAddress($aluno->email, '=?UTF-8?B?' . base64_encode($aluno->nome) . '?=');     //Add a recipient

        //Content
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = '=?UTF-8?B?' . base64_encode('Aproveitamento do Aluno') . '?=';

        $materia = MateriasModel::find_by_id($id_materia);

        $mensagem = '
            <table width="100%">
                <tr>
                    <td class="texto-centro"><img src="'.HOME.'/assets/imagens/logo/logo.png" width="150" /></td>
                </tr>
                
                <tr>
                    <td class="texto-centro font-bold">NOTIFICAÇÃO DE BAIXO APROVEITAMENTO DO ALUNO</td>
                </tr>
                
                <tr>
                    <td class="texto-centro">Notificamos que o aluno '.$aluno->nome.' está com aproveitamento atual é de '.$aproveitamento.'% na matéria de '.$materia->nome.'.</td>
                </tr>
                
                <tr>
                    <td class="texto-centro">Aproveitamos para relembrar que o aproveitamento mínimo exigido é de 75%.</td>
                </tr>
            </table>
        ';

        $mail->Body    = $mensagem;

        $mail->send();

    }
}