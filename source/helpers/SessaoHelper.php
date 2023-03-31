<?php
namespace Helpers;

class SessaoHelper
{

    public static function regenerarSessao($nome_sessao)
    {
        /*
        $session_name = $nome_sessao;
        $secure = false;
        $httponly = true;

        if (ini_set('session.use_only_cookies', 1) === FALSE):
            echo "Não foi possível iniciar uma sessão segura, favor verificar as configurações (ini_set)";
        endif;

        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);

        session_name($session_name);
        */

        session_regenerate_id(true);
    }

}