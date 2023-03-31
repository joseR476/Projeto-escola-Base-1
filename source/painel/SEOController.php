<?php
namespace Painel;
use Geral\Rotas;
use Geral\Utilidades;
use Interfaces\iPainel;

class SEOController extends Rotas implements iPainel
{
    public function index()
    {

        $pesquisa = filter_input(INPUT_POST, 'pesquisa', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        if(!empty($pesquisa)):
            $pesquisa = '%'.$pesquisa.'%';
        else:
            $pesquisa = '%';
        endif;

        $registros = \SEOModel::all(['conditions' => ['titulo like ? or descricao like ? or palavras_chave like ?', $pesquisa, $pesquisa, $pesquisa], 'order' => 'titulo asc']);
        $this->dados->registros = $registros;

    }

    public function novo()
    {
        if(isset($_POST['salvar'])):
            \SEOModel::$url = filter_input(INPUT_POST, 'url_seo', FILTER_SANITIZE_STRING);
            \SEOModel::$titulo = filter_input(INPUT_POST, 'titulo_seo', FILTER_SANITIZE_STRING);
            \SEOModel::$descricao = filter_input(INPUT_POST, 'descricao_seo', FILTER_SANITIZE_STRING);
            \SEOModel::$palavras_chave = filter_input(INPUT_POST, 'palavras_chave_seo', FILTER_SANITIZE_STRING);
            $retorno = \SEOModel::salvar(null);

            $this->Redireciona(HOME.'/painel/novo-seo/'.$retorno);
        endif;
    }

    public function alterar()
    {
        $id = Utilidades::getUrl()[1];
        $registro = \SEOModel::find_by_id($id);
        $this->dados->registro = $registro;

        if(isset($_POST['salvar'])):
            \SEOModel::$url = filter_input(INPUT_POST, 'url_seo', FILTER_SANITIZE_STRING);
            \SEOModel::$titulo = filter_input(INPUT_POST, 'titulo_seo', FILTER_SANITIZE_STRING);
            \SEOModel::$descricao = filter_input(INPUT_POST, 'descricao_seo', FILTER_SANITIZE_STRING);
            \SEOModel::$palavras_chave = filter_input(INPUT_POST, 'palavras_chave_seo', FILTER_SANITIZE_STRING);
            $retorno = \SEOModel::salvar($registro->id);

            $this->Redireciona(HOME.'/painel/alterar-seo/'.$id.'/'.$retorno);
        endif;
    }

    public function status()
    {
        // TODO: Implement status() method.
    }

    public function excluir()
    {
        $id = Utilidades::getUrl()[1];
        $retorno = \SEOModel::excluir($id);
        $this->Redireciona(HOME.'/painel/seo/'.$retorno);
    }
}
