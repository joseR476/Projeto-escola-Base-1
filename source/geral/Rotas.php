<?php
namespace Geral;

use Painel\PainelController;
use Site\HomeController;


class Rotas {

    private static $rotas;
    public $dados;

    public function __construct(){
        $this->dados = new \stdClass();
    }

    public function getRotas()
    {
        return self::$rotas;
    }

    public static function setRotas(array $rota)
    {
        self::$rotas[] = $rota;
    }

    public function add(string $url, string $nivel = null, string $arquivo = null, string $controller)
    {
        $this->setRotas(['link' => $url, 'nivel' => $nivel, 'arquivo' => $arquivo, 'controller' => $controller]);
    }

    public function Dados()
    {
        return $this->dados;
    }

    public function Redireciona($redirecionamento)
    {
        header('location:'.$redirecionamento);
    }

    public function VerificaRota($nivel, $url){

        $rotas = self::getRotas();

        $Url = explode('/', $url);

        /*caso a rota seja vazia - chamar esta view*/
        if($Url[0] == '' || $Url[0] == '/'):

            /*home do site*/
            if($nivel == 'site'):
                $classe = new HomeController();
                $classe->index();
                $dados = $classe->Dados();
                include_once(VIEWS.'/home.php');
            endif;

            /*painel*/
            if($nivel == 'painel'):
                $classe = new PainelController();
                $classe->login();
                $dados = $classe->Dados();
                include_once(VIEWS_PAINEL.'/login/login.php');
            endif;

            /*relatorios*/
            if($nivel == 'relatorios'):
                $classe = new PainelController();
                $classe->login();
                $dados = $classe->Dados();
                include_once(VIEWS_RELATORIOS.'/login/login.php');
            endif;

        else:

            $encontrou = false;

            foreach ($rotas as $rota):

                if($rota['link'] == $Url[0]):

                    $encontrou = true;
                    $local_arquivo = explode('.', $rota['arquivo']);

                    switch ($nivel):
                        case 'painel':

                            if($rota['nivel'] == 'painel'):
                                $parametro  = explode('@', $rota['controller']);
                                $controller = 'Painel\\'.$parametro[0];
                                $metodo     = $parametro[1];

                                $classe     = new $controller();
                                $classe->$metodo();
                                $dados = $classe->Dados();

                                include_once(VIEWS_PAINEL.'/'.$local_arquivo[0].'/'.$local_arquivo[1].'.php');
                            endif;
                            break;

                        case 'relatorios':

                            if($rota['nivel'] == 'relatorios'):
                                $parametro  = explode('@', $rota['controller']);
                                $controller = 'Relatorios\\'.$parametro[0];
                                $metodo     = $parametro[1];

                                $classe     = new $controller();
                                $classe->$metodo();
                                $dados = $classe->Dados();

                                include_once(VIEWS_RELATORIOS.'/'.$local_arquivo[0].'/'.$local_arquivo[1].'.php');
                            endif;
                            break;

                        case 'site':

                            if($rota['nivel'] == 'site'):
                                $parametro  = explode('@', $rota['controller']);
                                $controller = 'Site\\'.$parametro[0];
                                $metodo     = $parametro[1];

                                $classe     = new $controller();
                                $classe->$metodo();
                                $dados = $classe->Dados();

                                include_once(VIEWS.'/'.$local_arquivo[0].'.php');
                            endif;
                            break;

                        case 'scripts':

                            /*definindo namespace*/
                            switch ($rota['nivel']):
                                case 'painel':
                                    $namespace = 'Painel';
                                    break;
                                case 'relatorios':
                                    $namespace = 'Relatorios';
                                    break;
                                case 'site':
                                    $namespace = 'Site';
                                    break;
                                default:
                                    $namespace = 'Site';
                            endswitch;

                            $parametro = explode('@', $rota['controller']);
                            $controller = $namespace.'\\'.$parametro[0];
                            $metodo = $parametro[1];

                            $classe = new $controller();
                            $classe->$metodo();
                            $dados = $classe->Dados();

                            include_once(SCRIPTS.'/index.php');

                            break;
                    endswitch;

                endif;

            endforeach;

            if(!$encontrou):
                echo 'Não encontrou <br>';
                $this->Redireciona(HOME.'/404');
            endif;

        endif;

    }



}
